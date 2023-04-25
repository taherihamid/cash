@extends('layouts.dashboard.layout')
@section('title', trans('ui.title.admins'))

@section('content')

    <div class=" line">
        <div class="alert alert-info">
            <span>{{ trans('ui.text.admins') }} {{ trans('ui.text.new') }}</span>
        </div>
        <div class="options">
            <div class="row">
                {!! Form::open(['route'  => 'admin.admin.store', 'method' => 'POST', 'files' => true, 'class' => 'needs-validation validate']) !!}

                    <div class="col-lg-3">
                        <label class="form-label" for="name">{{ trans('ui.text.name') }} {{ trans('ui.text.example') }}: «{{ trans('ui.example.name') }}»</label>

                        <div class="controls">
                            {!! Form::text("name", null, ['class' => 'form form-control', 'id' => 'name', 'required']) !!}
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <label class="form-label" for="email">{{ trans('ui.text.email') }} {{ trans('ui.text.example') }}: «{{ trans('ui.example.email') }}»</label>
                        <div class="controls">
                            {!! Form::email("email", null, ['class' => 'form form-control ltr-input', 'id' => 'email', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label class="form-label" for="email">{{ trans('ui.sidebar.roles.name') }} {{ trans('ui.text.example') }}: «{{ trans('ui.example.role-name') }}»</label>
                        <div class="controls">
                            {!! Form::select("role_id", $roles, null, ['required', 'id' => 'source-b', 'class' => 'form select2 2-100-p']) !!}
                        </div>
                    </div>

                <div class="col-lg-3">
                    <label class="form-label" for="admin-password">{{ trans('ui.text.password') }}</label>

                    <div class="controls">
                        {!! Form::password("password", ['class' => 'form form-control', 'id' => 'admin-password', 'required']) !!}
                    </div>
                </div>
                <div class="col-lg-3 mt-2">
                    <label class="form-label" for="status">{{ trans('وضعیت کاربر') }}</label>
                        <select class="form-control" id="sel1" name="status" required>
                            <option selected disabled>{{ trans('وضعیت کاربر را انتخاب نمایید') }}</option>
                            <option value="0">{{ trans('غیرفعال') }}</option>
                            <option value="1">{{ trans('فعال') }}</option>

                        </select>

                </div>

                <div class="col-lg-3 options pull-right">
                    <button class="col-lg-12 special-green-button ">{{trans('ui.text.submit')}}</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple options">


                        <div class="active line">
                            @if(isset($admins) and $admins->count())
                                <table class="table table-bordered no-more-tables">
                                    <thead>
                                    <tr>
                                        <th class="thead text-right">{{ trans('ui.text.name') }}</th>
                                        <th class="thead text-center">{{ trans('ui.text.email') }}</th>
                                        <th class="thead text-center">{{ trans('ui.text.role') }}</th>
                                        <th class="thead text-center">{{ trans('ui.text.created-at') }}</th>
                                        <th class="thead text-center"></th>
                                    </tr>

                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr class="show-on-hover-container @if($loop->odd) active @endif">
                                            <td class="text-right">{{ $admin->name }}</td>

                                            <td class="text-center">
                                                <code>{{ $admin->email }}</code>
                                            </td>


                                            <td class="text-center">{{ $admin->role->name }}</td>

                                            <td class="text-center">
                                                <span class="ltr d-block text-center">{{ toPersianNum(jdate($admin->created_at, 'date')->format('Y-m-d')) }}</span>
                                            </td>

                                            <td class="text-center list-tools">
                                                @if($update)
                                                    <a href="{{ route('admin.admin.edit', $admin->id) }}" class="show-on-hover-visible" data-toggle="tooltip" data-placement="top" title="{{ trans('ui.text.edit') }}">
                                                        <i class="fa fa-pencil color-dark-gray"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <nav aria-label="Page navigation" class="text-left pagination-container">
                                    {{ $admins->links() }}
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
