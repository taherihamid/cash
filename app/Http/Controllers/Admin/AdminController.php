<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Country;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get()->pluck('name', 'id');

        $admins = Admin::orderBy('name', 'asc')->with('role')->paginate($this->paginate_count);
        return view('dashboard.admins.index', compact('admins', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();
        $roles = Role::get()->pluck('name', 'id');
//          return view("dashboard/$this->dashboardTemplate/admins/add", compact('roles'));
        return view('dashboard.' . $this->admin_view . '.admins.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'role_id' => 'required',
            'status' => 'required',
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role_id = $request->role_id;
        $admin->active = $request->status;

        if ($request->password)
            $admin->password = bcrypt($request->password);
        else
            $admin->password = bcrypt(str_random(20));

        if ($admin->save())
        {
            if (!$request->password)
            {
                $passwordBroker = app('auth.password')->broker('admins');
                $tokens = $passwordBroker->getRepository();
                $token = $tokens->create($admin);

                $admin->notify(new CreateAdminNotification($token));
            }

            session()->flash('success_flash', trans('messages.item_created'));
        }
        else
            session()->flash('error_flash', trans('messages.unknown_error'));

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {

        if ($admin)
        {
            $roles = Role::get()->pluck('name', 'id')->toArray();
            return view('dashboard.' . $this->admin_view . '.admins.edit', compact('admin', 'roles'));
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'image' => 'nullable|image',
            'password'  => 'nullable|digits:6',
            'active'  => 'nullable',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role_id = $request->role_id;
        $admin->active = ($request->status) ? 1 : 0;

        if($request->password) {
            $admin->password = bcrypt($request->password);
        }

        if ($admin->save())
            session()->flash('success_flash', trans('messages.item_updated'));
        else
            session()->flash('error_flash', trans('messages.unknown_error'));

        return redirect()->route('admin.admin.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
