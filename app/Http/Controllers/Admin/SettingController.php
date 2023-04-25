<?php

namespace App\Http\Controllers\Admin;

use App\Classes\View;
use App\Menu;
use App\MenuItems;
use App\Scheme;
use App\System;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $menues = Menu::get();
//
//       $limit = DB::table('tiles')->selectRaw('SUM(percent)%100 as amount')->pluck('amount')->first();

//       $current_percent_limit = 100 - $limit;


        $services = config('settings.services');


        return view('dashboard.' . $this->admin_view . '.setting.index', compact('services','menues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = $request->slug;
        $message = '';
//  dd($slug);
        switch ($slug) {
            case 'menu':
                $this->validate($request, [
                    "name" => "required|string",
                    "english_name" => "required|string",
                    'slug' => 'required',
                ]);
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->english_name = $request->english_name;

                if ($menu->save()) {

                    return redirect()->back()->withErrors(trans('messages.item_created'));
                } else {
                    return redirect()->back()->withErrors(trans('messages.unknown_error'));
                }
                break;

            default:
                $message = 'You are not authorized to access this page';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::where('id', $id)->relations()->first();
        $professors = Professor::get();
        $students = Student::get();
        $genders = Lesson::gender();

        return view('dashboard.' . $this->admin_view . '.lesson.edit', compact('lesson', 'professors', 'students', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "with_examination" => "required",
            "with_card" => "required",
            "begin_date" => "required",
            "expire_date" => "required",
            "education_systems" => "nullable",
            "teaching_institution_id" => "required",
            "editable" => "nullable",
//            "title_file" =>
            //            'upload_pdf' => 'required',
            //            'upload_pdf.*' => 'mimes:pdf',
        ]);

        $editable = ($request->input('editable')) ? '1' : 0;

        $begin_date = gregorian_to_jalali($request->begin_date);
        $expire_date = gregorian_to_jalali($request->expire_date);


        $scheme = Scheme::find($id);

        $scheme->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'with_examination' => $request->input('with_examination'),
            'with_card' => $request->input('with_card'),
            'begin_date' => $begin_date,
            'expire_date' => $expire_date,
            'editable' => $editable,
        ]);


        foreach ($request->teaching_institution_id as $teaching_institution_id) {
            EducationSystemsScheme::where('scheme_id', $id)->update([
                'education_system_id' => $teaching_institution_id,
                'scheme_id' => $scheme->id,
            ]);
        }

        foreach ($request->teaching_institution_id as $teaching_institution_id) {
            TeachingInstitutionScheme::where('scheme_id', $id)->update([
                'teaching_institution_id' => $teaching_institution_id,
                'scheme_id' => $scheme->id
            ]);
        }

        return redirect()->back()->withErrors(trans('messages.item_updated'));

//        dd($request->all(), $expire_date, $begin_date);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
        $item = MenuItems::where('id',$id)->first();

        if($item->parent_id == 0){
            return redirect()->back()->withErrors(trans('messages.parent_must_delete_first'));
        }
        else{
            $item_sub_menus= MenuItems::where('parent_id',$id)->get();
            if($item_sub_menus){
                foreach ($item_sub_menus as $value){
                    $value->parent_id = $item->parent_id;
                    $value->save();
                }

            }
            if($item->delete()){
                return redirect()->back()->withErrors(trans('messages.item_deleted'));
            }

        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function sort(Request $request)
    {
        info(json_encode($request));
        return $this->sortModel($request, HomeLayout::class);
    }


    public function editMenu(Request $request)
    {
        $menu = Menu::find($request->id);

        return view('dashboard.' . $this->admin_view . '.setting.edit', compact('menu'));
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
        return view('dashboard.' . $this->admin_view . '.setting.index', compact('menues'));
    }

}
