<?php

namespace App\Http\Controllers\Admin;

use App\Classes\View;
use App\EducationSystem;
use App\EducationSystemsScheme;
use App\Scheme;
use App\System;
use App\TeachingInstitution;
use App\TeachingInstitutionScheme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $schemes = Scheme::orderBy('id', 'desc')->with('teachingInstitution')->paginate($this->paginate_count);

        $teaching_institutions = TeachingInstitution::orderBy('id', 'desc')->get();


        $schemes = Scheme::relations()->orderBy('id', 'desc')->paginate($this->paginate_count);

//        return $schemes;

        return view('dashboard.' . $this->admin_view . '.system.index', compact('schemes', 'teaching_institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $scheme = Scheme::create([
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "with_examination" => $request->input('with_examination'),
            "with_card" => $request->input('with_card'),
            "begin_date" => gregorian_to_jalali($request->input('begin_date')),
            "expire_date" => gregorian_to_jalali($request->input('expire_date')),
            "editable" => $editable,

        ]);


        if ($request->input('education_systems')) {
            foreach ($request->input('education_systems') as $education_system) {
                EducationSystemsScheme::create([
                    'education_system_id' => $education_system,
                    'scheme_id' => $scheme->id,
                ]);
            }
        }

        if ($request->teaching_institution_id) {
            foreach ($request->teaching_institution_id as $teaching_institution_id) {
                TeachingInstitutionScheme::create([
                    'teaching_institution_id' => $teaching_institution_id,
                    'scheme_id' => $scheme->id
                ]);
            }
        }

        return redirect()->back()->withErrors(trans('messages.item_created'));


        //             "education_systems"       => $request->input('education_systems'),
        //              teaching_institution_id

//
//
//        $i = $path = $name = 0;
//
//        if ($request->hasfile('upload_pdf')) {
//            foreach ($request->file('upload_pdf') as $file) {
//                $title_file = $request->input('title_file')[$i++];
//
//                $file_name = $file->getClientOriginalName();
//                $file->move(public_path() . '/files/', $file_name);
//                $data[$path++]['file_name'] = $file_name;
//                $data[$name++]['file_title'] = (is_null($title_file)) ? $file_name : $title_file;
//            }
//        }


        $begin_date = gregorian_to_jalali($validator['begin_date']);
        $expire_date = gregorian_to_jalali($validator['expire_date']);

        dd($expire_date, $begin_date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $system = Scheme::find($id)->relations()->first();
        $teachingInstitutions = TeachingInstitution::orderBy('id', 'desc')->pluck('id', 'name');
        return view('dashboard.' . $this->admin_view . '.system.edit', compact('system', 'teachingInstitutions'));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Scheme::find($id)->delete();
        return redirect()->back()->withErrors(trans('messages.item_deleted'));

    }
}
