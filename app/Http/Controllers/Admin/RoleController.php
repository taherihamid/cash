<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\MsModels\DeviceTokens;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Role;


class RoleController extends Controller
{
    protected $locale;

    public function __construct()
    {
        parent::__construct();
        $this->locale = config('app.locale');
    }

    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->paginate($this->paginate_count);
        return view('dashboard.roles.index', compact('roles'));

    }

    public function create()
    {
        return view('dashboard.' . $this->admin_view . '.roles.add');

    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'controller' => 'required',
            'read' => 'required',
            'write' => 'required',
            'update' => 'required',
            'delete' => 'required',
            'publish' => 'required'
        ])->validate();

        $permissions = $this->GeneratePermission($request->controller, $request->read, $request->write, $request->update, $request->delete, $request->publish);

        $role = new Role;
        $role->name = $request->name;
        $role->permissions = json_encode($permissions);

        if ($role->save())
            session()->flash('success_flash', trans('messages.item_created'));
        else
            session()->flash('error_flash', trans('messages.unknown_error'));

        return redirect()->back();
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        $role->permissions = json_decode($role->permissions, true);
        $permissions = config('acl');

        // sections
        foreach ($permissions['sections'] as $key => $value) {
            if (isset($role->permissions['sections'][$value['controller']])) {


                $permissions['sections'][$key]['read'] = $role->permissions['sections'][$value['controller']]['read'];
                $permissions['sections'][$key]['write'] = $role->permissions['sections'][$value['controller']]['write'];
                $permissions['sections'][$key]['update'] = $role->permissions['sections'][$value['controller']]['update'];
                $permissions['sections'][$key]['delete'] = $role->permissions['sections'][$value['controller']]['delete'];
                $permissions['sections'][$key]['publish'] = $role->permissions['sections'][$value['controller']]['publish'];
            } else {
                $permissions['sections'][$key]['read'] = 0;
                $permissions['sections'][$key]['write'] = 0;
                $permissions['sections'][$key]['update'] = 0;
                $permissions['sections'][$key]['delete'] = 0;
                $permissions['sections'][$key]['publish'] = 0;
            }
        }

        $role->permissions = $permissions;
        return view('dashboard.' . $this->admin_view . '.roles.edit', compact('role'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'controller' => 'required',
            'read' => 'required',
            'write' => 'required',
            'update' => 'required',
            'delete' => 'required',
            'publish' => 'required'
        ])->validate();


        $permissions = $this->GeneratePermission($request->controller, $request->read, $request->write, $request->update, $request->delete, $request->publish);

        $role = Role::findOrFail($id);

        $role->name = $request->name;
        $role->permissions = json_encode($permissions);

        if ($role->save())
            session()->flash('success_flash', trans('messages.item_updated'));
        else
            session()->flash('error_flash', trans('messages.unknown_error'));

        return redirect()->back();
    }

    private function GeneratePermission($controller, $read, $write, $update, $delete, $publish)
    {
        $permissions = [];
        foreach ($controller as $key => $value) {
            $permissions['sections'][$value]['read'] = $read[$key];
            $permissions['sections'][$value]['write'] = $write[$key];
            $permissions['sections'][$value]['delete'] = $delete[$key];

            if ($publish[$key]) {
                $permissions['sections'][$value]['update'] = $publish[$key]; // force on
                $permissions['sections'][$value]['publish'] = $publish[$key];
            } else {
                $permissions['sections'][$value]['update'] = $update[$key];
                $permissions['sections'][$value]['publish'] = $publish[$key];
            }
        }

        return $permissions;
    }
}
