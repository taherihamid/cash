@extends('layouts.dashboard.layout')
@section('title', trans('ui.title.edit'))
@section('content')             <?php
$status_array =[
    0 =>  "غیرفعال",
    1 =>  "فعال",
]
?>

    <div class=" line">
        <div class="alert alert-info">
            <span>{{ trans('ui.text.admins') }}</span>
        </div>
        <div class="options">
            <div class="row">
                {!! Form::open(['route' => array('admin.admin.update', $admin->id), 'method' => 'POST', 'files' => true, 'class' => 'needs-validation validate']) !!}
                {{ method_field('PUT') }}
                <div class="col-lg-3">
                    <label class="form-label" for="name">{{ trans('ui.text.name') }} {{ trans('ui.text.example') }}: «{{ trans('ui.example.name') }}»</label>

                    <div class="controls">
                        {!! Form::text("name", $admin->name, ['class' => 'form form-control', 'id' => 'name', 'required']) !!}
                    </div>

                </div>

                <div class="col-lg-3">
                    <label class="form-label" for="email">{{ trans('ui.text.email') }} {{ trans('ui.text.example') }}: «{{ trans('ui.example.email') }}»</label>

                    <div class="controls">
                        {!! Form::email("email", $admin->email, ['class' => 'form form-control ltr-input', 'id' => 'email', 'required']) !!}
                    </div>
                </div>

                <div class="col-lg-3">
                    <label class="form-label" for="email">{{ trans('ui.sidebar.roles.name') }} {{ trans('ui.text.example') }}: «{{ trans('ui.example.role-name') }}»</label>
                    <div class="controls">
                        {!! Form::select("role_id", $roles, null, ['required', 'id' => 'source-b', 'class' => 'form select2 w-100-p']) !!}
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
                       @foreach($status_array as $key=>$value)
                        <option @if($admin->active == $key) selected @endif value="{{$key}}">{{ $value }}</option>
                        @endforeach

                    </select>

                </div>
                <div class="col-lg-3 options pull-right">
                    <button class="col-lg-12 special-green-button ">{{ trans('ui.text.submit') }}</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection

