@extends('layouts.dashboard.layout')

@section('title', trans('ui.text.define_system'))
@section('content')


    <div class="line">
        <div class="alert alert-info">
            <span> @yield('title') {{ trans('ui.text.new') }}</span>
        </div>
        <div class="row">
            <form action="{{route('admin.system.store')}}" method="post" enctype="multipart/form-data">

                <div class="col-lg-12">
                    @csrf

                    <div class="col-lg-6">
                        <input type="text" class="form form-control" name="title" placeholder="{{ trans('ui.text.system_title') }}">
                    </div>

                    <div class="col-lg-6">
                        <input type="text" class="form form-control" name="description" placeholder="{{ trans('ui.text.description') }}">
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
                        <select multiple name="teaching_institution_id[]"
                                data-placeholder="{{trans('ui.text.teaching_institution')}}"
                                class="form form-control select2">
                            @foreach($teaching_institutions as $teaching_institution)
                                <option value="{{ $teaching_institution->id }}">{{ $teaching_institution->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-6 options">
                        <div class="input-group control-group increment line">
                            <input type="text" id="file" name="title_file[]" placeholder="{{ trans('ui.text.select_title_file') }}" class="col-lg-6 col-xs-4 text-upload">

                            <input type="file" class="file-hide" name="upload_pdf[]" id="file-upload"/>
                            <label class="col-lg-6 col-xs-8 upload-section mychange" id="file-upload-filename" for="file-upload">{{ trans('ui.text.upload_file') }}</label>


                            <div class="input-group-btn add-file-upload">
                                <span class="p-6 text-center add-file-class" id="add_file">
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
    <div class="col-lg-12 line options">
        <div class="table-responsive ">
            <table class="table">
                <thead>
                <tr>
                    <th class="thead text-center"></th>
                    <th class="thead text-center">{{ trans('ui.text.system') }}</th>
                    <th class="thead text-center">{{ trans('ui.text.exam') }}</th>
                    <th class="thead text-center ">{{ trans('ui.text.card') }}</th>
                    <th class="thead text-center">{{ trans('ui.text.education_system') }}</th>
                    <th class="thead text-center">{{ trans('ui.text.teaching_institution') }}</th>
                    <th class="thead text-center">{{ trans('ui.text.begin_date') }}</th>
                    <th class="thead text-center">{{ trans('ui.text.expire_date') }}</th>
                    <th class="thead text-center"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($schemes as $scheme)
                    <tr class="@if($loop->odd) table-odd-or-even @endif table-active-hover ">

                        <th class="border-radius-0-6-6-0 border-top-none text-center">{{ toPersianNum(($schemes->total()-$loop->index)-(($schemes->currentpage()-1) * $schemes->perpage())) }}</th>
                        <td class="text-center">
                            <span class="f-w-800 tooltip-{{$scheme->id}}" data-tooltip-content="#tooltip_content-{{$scheme->id}}"> {{ $scheme->title }} </span>
                            <div class="tooltip_templates">
                                <span id="tooltip_content-{{$scheme->id}}">
                                    <strong>{{ $scheme->description }}</strong>
                                </span>
                            </div>
                        </td>
                        <td class="text-center"> {{ $scheme->with_examination_text }}</td>
                        <td class="text-center"> {{ $scheme->with_card  }}</td>
                        <td class="text-center">

                            @if($scheme->educationSystem)
                                @foreach($scheme->educationSystem as $educationSystem)
                                    @if($loop->iteration > 1) - @endif
                                        {{ $educationSystem->name }}
                                @endforeach
                            @endif
                        </td>
                        <td class="text-center">
                            @if(count($scheme->teachingInstitution) > 0)
                                {{ $scheme->teachingInstitution[0]->name}}
                            @endif

                            @if(count($scheme->teachingInstitution) > 1)
                                <span class="f-w-800 tooltip-{{$scheme->id}}-data" data-tooltip-content="#tooltip_content-{{$scheme->id}}-data">...</span>
                                <div class="tooltip_templates">
                                <span id="tooltip_content-{{$scheme->id}}-data">
                                    <strong>
                                        @foreach($scheme->teachingInstitution as $teachingInstitution)
                                            @if($loop->iteration > 1)
                                                {{$teachingInstitution->name}}
                                            @endif
                                        @if(!$loop->first)
                                            @if(!$loop->last), @endif
                                             @endif
                                        @endforeach
                                    </strong>
                                </span>
                                </div>
                            @endif
{{----}}

                        </td>
                        <td class="text-center"> {{  toPersianNum(jdate($scheme->begin_date)->format('Y-m-d')) }} </td>
                        <td class="text-center"> {{ toPersianNum(jdate($scheme->expire_date )->format('Y-m-d')) }}</td>
                        <td class="text-center">
                            <div class="col-lg-12 show-action ">
                                <a href="{{route('admin.system.edit', $scheme->id)}}" area-hidden="true">
                                    <i class="icon-action fa fa-pencil m-l-25"></i></a>
                                <button class="border-none bg-transparent" data-toggle="modal" data-target="#ClickModal-{{$scheme->id}}">
                                    <i class="color-red icon-action m-l-10 fa fa-trash-o"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- MODAL --}}
                        {!! delete_item($scheme, 'admin.system.destroy') !!}
                    {{-- END MODAL--}}

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        {{ $schemes->links() }}
    </div>

@endsection
