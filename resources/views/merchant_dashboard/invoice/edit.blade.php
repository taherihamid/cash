@extends('layouts.dashboard.layout')
@section('title', trans('ui.text.edit'))

@section('content')
    <div class="line">
        <div class="alert alert-info">
            <span> @yield('title') {{ trans('ui.text.new') }}</span>
        </div>
        <div class="row">
            <form action="{{route('admin.lesson.update', $lesson->id)}}" method="post">

                <div class="col-lg-12">
                    @csrf

                    <div class="col-lg-12">
                        <div class="col-lg-4 pr-0">
                            <input type="text" class="form form-control" name="name" value="{{old('name',$lesson->name)}}" placeholder="{{ trans('ui.admin.lessons.name') }}">
                        </div>

                        <div class="col-lg-4">
                            <input type="text" class="form form-control" name="code" value="{{old('code',$lesson->code)}}" placeholder="{{ trans('ui.admin.lessons.code') }}">
                        </div>

                        <div class="col-lg-4 pl-0">
                            <input type="text" class="form form-control" name="class_number" value="{{old('class_number',$lesson->class_number)}}" placeholder="{{ trans('ui.admin.lessons.class-number') }}">
                        </div>

                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="col-lg-4 pr-0">
                            <input type="text" class="form form-control" name="theoritical_unit" value="{{old('theoritical_unit',$lesson->theoritical_unit)}}" placeholder="{{ trans('ui.admin.lessons.theoritical-unit') }}">
                        </div>

                        <div class="col-lg-4">
                            <input type="text" class="form form-control" name="practical_unit" value="{{old('practical_unit',$lesson->practical_unit)}}" placeholder="{{ trans('ui.admin.lessons.practical-unit') }}">
                        </div>

                        <div class="col-lg-4 pl-0">
                            <input type="text" class="form form-control" name="lesson_time" value="{{old('lesson_time',$lesson->lesson_time)}}" placeholder="{{ trans('ui.admin.lessons.lesson-time') }} {{trans('ui.text.example')}}: {{trans('ui.example.lesson-time')}}">
                        </div>

                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="col-lg-4 pr-0">
                            <label>{{trans('ui.admin.lessons.year-term')}}</label>
                            <input type="text" class="form form-control" name="year_term" value="{{old('year_term',$lesson->year_term)}}" placeholder="{{ trans('ui.admin.lessons.year-term') }}-{{trans('ui.text.example')}}: {{trans('ui.example.year-term')}}">
                        </div>
                        <div class="col-lg-4">
                            <label>{{trans('ui.admin.lessons.start-date')}}</label>
                            <input type="text" class="form form-control persian-date-picker" value="{{old('start_date',$lesson->start_date)}}" name="start_date" placeholder="{{ trans('ui.admin.lessons.start-date') }}">
                        </div>
                        <div class="col-lg-4 pl-0">
                            <label>{{trans('ui.admin.lessons.exam-date')}}</label>
                            <input type="text" class="form form-control persian-date-picker" value="{{old('exam_date',$lesson->exam_date)}}" name="exam_date" placeholder="{{ trans('ui.admin.lessons.exam-date') }}">
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="col-lg-4 pr-0 ">
                            <label>{{trans('ui.admin.lessons.gender')}}</label>
                            <select name="gender"
                                    class="form form-control select2">
                                <option>{{trans('ui.text.select-one')}}</option>
                                @foreach($genders as $key => $value)
                                    <option value="{{ $key }}" @if($lesson->gender == $key) selected @endif>{{$value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-7 pl-0">
                            <label>{{trans('ui.text.professor')}}</label>
                            <select name="professor_id"
                                    data-placeholder="{{trans('ui.text.professor')}}"
                                    class="form form-control select2">
                                <option>{{trans('ui.text.select-one')}}</option>
                                @foreach($professors as $value)
                                    <option value="{{ $value->id }} " @if($lesson->professor_id == $value->id) selected @endif>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="col-lg-6">
                            <label>{{trans('allstudents')}}</label>
                            <select multiple  name="students[]"
                                    class="form form-control select2">
                                <option>{{trans('ui.text.select-one')}}</option>
                                @foreach($students as $value)
                                    <option value="{{ $value->id }}">{{ $value->name.' - '.$value->identification_number }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="col-lg-3  pull-right">
                            <button class="col-lg-12  special-green-button">{{ trans('ui.text.submit') }}</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{--<div class='modal fade' id='remove-student' style='margin-top: 30vh'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                    <h4 class='alert alert-info  modal-title text-center h-30-px p-t-3' id='custom-width-modalLabel'>" . trans('ui.text.delete_a_record') . "</h4>
                </div>
                <div class='modal-body'>
                    <h4>{{trans('ui.text.delete_condition')}}</h4>
                </div>

                <div class='modal-footer'>
                    <button type='button' class='btn btn-default waves-effect' data-dismiss='modal'>{{trans('ui.text.close')}}</button>
                    <form style='display: inline' action='{{route('admin.lesson.remove-student')}}' method='post'>
                        <button type='submit' data-student="" data-lesson="" class='btn btn-danger waves-effect remove-data-from-delete-form remove-student-btn'>{{trans('ui.text.delete')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>--}}

@endsection
