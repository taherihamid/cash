@extends('layouts.dashboard.layout')
@section('title', trans('ui.text.edit'))

@section('content')
    <div class="line">
        <div class="alert alert-info">
            <span> @yield('title') {{ trans('ui.text.new') }}</span>
        </div>
        <div class="row">
            <form action="{{route('admin.system.update', $system->id)}}" method="post" enctype="multipart/form-data">

                <div class="col-lg-12">
                    @csrf
                    @method('PATCH')
                    <div class="col-lg-6">
                        <input type="text" class="form form-control" name="title" value="{{old('title',$system->title)}}" placeholder="{{ trans('ui.text.system_title') }}">
                    </div>

                    <div class="col-lg-6">
                        <input type="text" class="form form-control" name="description" value="{{old('description', $system->description)}}" placeholder="{{ trans('ui.text.description') }}">
                    </div>

                    <div class="col-lg-3 line options">
                        <div class="col-lg-6">
                            <div class="col-lg-12">
                                <label class="radiobox">
                                    <span class="nice-blue p-r-10"> {{ trans('ui.text.with_exam') }}</span>
                                    <input type="radio" value="1" checked name="with_examination">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <span class="vr"></span>

                        <div class="col-lg-6">
                            <label class="radiobox">
                                <span class="nice-blue p-r-10"> {{ trans('ui.text.without_exam') }}</span>
                                <input type="radio" value="0" name="with_examination">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3 line options">
                        <div class="col-lg-6 p-l-10">
                            <label class="radiobox">
                                <span class="nice-blue p-r-10"> {{ trans('ui.text.with_card') }} </span>
                                <input type="radio" checked value="1" name="with_card">
                                <span class="checkmark"></span>
                            </label>

                        </div>
                        <span class="vr"></span>
                        <div class="col-lg-6">

                            <label class="radiobox ">
                                <span class="nice-blue p-r-10"> {{ trans('ui.text.without_card') }} </span>
                                <input type="radio" value="0" name="with_card">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col-lg-6 options">
                            <input type="text" class="form form-control persian-date-picker" name="begin_date" placeholder="{{ trans('ui.text.begin_date') }}">
                        </div>
                        <div class="col-lg-6 options">
                            <input type="text" class="form form-control persian-date-picker" name="expire_date" placeholder="{{ trans('ui.text.expire_date') }}">
                        </div>
                    </div>

                    <div class="col-lg-3 line options">
                        <div class="col-lg-12">
                            <div class="col-lg-6 p-l-10">
                                <label class="checkboxo">
                                    <input name="education_systems[]" value="1" type="checkbox">
                                    <span class="checkmark-checkbox m-r-5"></span>
                                    <span class="nice-blue p-r-30"> {{trans('ui.text.full_time')}}</span>
                                </label>

                            </div>
                            <span class="vr"></span>
                            <div class="col-lg-6">
                                <label class="checkboxo">
                                    <input name="education_systems[]" value="2" type="checkbox">
                                    <span class="checkmark-checkbox m-r-5"></span>
                                    <span class="nice-blue p-r-30"> {{trans('ui.text.part_time')}}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 options">
                        <select multiple name="teaching_institution_id[]" data-placeholder="{{trans('ui.text.teaching_institution')}}" class="form form-control select2">
                            @foreach($teachingInstitutions as $name => $id)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6 options">
                        <div class="input-group control-group increment line">
                            <input type="text" id="file" name="title_file[]" placeholder="{{ trans('ui.text.select_title_file') }}" class="col-lg-6 col-xs-4 text-upload">

                            <input type="file" class="file-hide" name="upload_pdf[]" id="file-upload"/>
                            <label class="col-lg-6 col-xs-8 upload-section mychange" id="file-upload-filename" for="file-upload">{{ trans('ui.text.upload_file') }}</label>

                            <div class="input-group-btn add-file-upload">
                                <span class="p-6 text-center display-block w-30 h-30-px border-radius-3 background-70CC14" id="add_file">
                                    <i class="glyphicon glyphicon-plus color-fff"></i>
                                </span>
                            </div>
                        </div>
                        <span class="" id="container-upload-div"></span>
                    </div>

                    <div class="col-lg-12 options">
                        <div class="col-lg-3  pull-right">
                            <button class="col-lg-12  special-green-button">{{ trans('ui.text.submit') }}</button>
                        </div>

                        <div class="col-lg-3  pull-right">
                            <label class="checkboxo">
                                <input name="editable" type="checkbox">
                                <span class="checkmark-checkbox"></span>
                                <span class="m-r-25 nice-blue">{{ trans('ui.text.editable') }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
