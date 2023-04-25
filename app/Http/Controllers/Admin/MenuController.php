<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\MenuItems;
use App\Scheme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    public function index()
    {
        $menues = Menu::get();
//
//       $limit = DB::table('tiles')->selectRaw('SUM(percent)%100 as amount')->pluck('amount')->first();

//       $current_percent_limit = 100 - $limit;


        $services = config('settings.services');


        return view('dashboard.' . $this->admin_view . '.menus.index', compact('services','menues'));
    }
    public function subMenu(Request $request)
    {
        $menu_id = $request->id;

        $menus = MenuItems::where('menu_id',$menu_id)->where('parent_id', '=', 0)->orderBy('parent_id','DESC')->orderBy('order','DESC')->get();
        $allMenus = MenuItems::where('menu_id',$menu_id)->pluck('title','id')->all();
        $allMenusFullItems = MenuItems::where('menu_id',$menu_id)->orderBy('parent_id','DESC')->orderBy('order','DESC')->get();


        return view('dashboard.' . $this->admin_view . '.menus.subMenu', compact('menus','allMenus','menu_id','allMenusFullItems'));

    }
    public function editSubMenu(Request $request)
    {
        $menu_id = $request->menu_id;
        $sub_menu_id = $request->sub_menu_id;

//        dd($request);
        $menus = MenuItems::where('parent_id', '=', 0)->where('menu_id',$menu_id)->get();
        $allMenus = MenuItems::where('menu_id',$menu_id)->pluck('title','id')->all();
        $allMenusFullItems = MenuItems::where('menu_id',$menu_id)->get();

        return view('dashboard.' . $this->admin_view . '.menus.editSubMenu', compact('menus','allMenus','menu_id','sub_menu_id'));

    }

    /**

     */
    public function updateSubMenu(Request $request)
    {
//        dd($request);
        $item = MenuItems::find($request->sub_menu_id);
        $this->validate($request, [
            "sub_menu_id" => "required",
            "title" => "required",
            "parent_id" => "required",
            "order" => "required",

        ]);


        $item->update([
            'title' => $request->input('title'),
            'parent_id' => $request->input('parent_id'),
            'order' => $request->input('order'),
            'url' => $request->input('url'),
            'route_name' => $request->input('route_name'),
            'parameters' => $request->input('parameters'),

        ]);
        return redirect()->back()->withSuccess(trans('messages.item_updated'));

    }
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            "menu_id" => "required",
            "title" => "required",
            "parent_id" => "required",
            /**
            "url" => "required",
            "route_name" => "required",
            "parameters" => "required",
             ***/
            "order" => "required",
        ]);

        $subMenu = new MenuItems();
        $subMenu->menu_id = $request->input('menu_id');
        $subMenu->parent_id = $request->input('parent_id');
        $subMenu->title = $request->input('title');
        $subMenu->order = $request->input('order');
        $subMenu->url = $request->input('url');
        if ($request->input('route_name'))$subMenu->route_name = $request->input('route_name');
        $subMenu->parameters = $request->input('parameters');
        $subMenu->created_at = Carbon::now();
        $subMenu->updated_at = Carbon::now();

        if($subMenu->save()){
            return Redirect::back()->withErrors(trans('messages.item_updated'));
        } else{
            return Redirect::back()->withErrors(trans('messages.unknown_error'));
        }
    }

    public function editMenu(Request $request)
    {
        $menu = Menu::find($request->id);

        return view('dashboard.' . $this->admin_view . '.menus.edit', compact('menu'));
    }

    public function updateMenu(Request $request)
    {
        $menu = Menu::find($request->id);
        $this->validate($request, [
            "menu_id" => "required",
            "name" => "required",
            "english_name" => "required",

        ]);
        $menu = Menu::find($request->menu_id);

        $menu->update([
            'name' => $request->input('name'),
            'english_name' => $request->input('english_name'),

        ]);
        $menues = Menu::get();
        return view('dashboard.' . $this->admin_view . '.menus.index', compact('menues'));
    }
    public function dropMainMenu($id)
    {
        Menu::find($id)->delete();
        return redirect()->back()->withErrors(trans('messages.item_deleted'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function dropSubMenuItem($id)
    {
        $item = MenuItems::where('id', $id)->first();

        if ($item->parent_id == 0) {
            return redirect()->back()->withErrors(trans('messages.parent_must_delete_first'));
        } else {
            $item_sub_menus = MenuItems::where('parent_id', $id)->get();
            if ($item_sub_menus) {
                foreach ($item_sub_menus as $value) {
                    $value->parent_id = $item->parent_id;
                    $value->save();
                }

            }
            if ($item->delete()) {
                return redirect()->back()->withErrors(trans('messages.item_deleted'));
            }

        }

    }
    public function mainMenuStore(Request $request)
    {
        $slug = $request->slug;
        $message = '';
//        dd($slug);


        $this->validate($request, [
            "name" => "required|string",
            "english_name" => "required|string",
            'slug' => 'required',
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->english_name = $request->english_name;
        $menu->slug = $request->slug;

        if ($menu->save()) {

            return redirect()->back()->withErrors(trans('messages.item_created'));
        } else {
            return redirect()->back()->withErrors(trans('messages.unknown_error'));
        }

    }

}
