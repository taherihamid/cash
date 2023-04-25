@extends('layouts.dashboard.layout')

@section('content')
    <div class="container main-login">

        <div class="col-xs-12 col-md-4">
            <h1 class="text-center">{{ trans('ui.text.login') }}</h1>

            @if($errors->any())
                <br>
                @foreach($errors->all() as $error)
                    <div class="alert alert-error">
                        <button class="close" data-dismiss="alert"></button>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            <br>

            {!! Form::open(['url' => route('admin.login.submit'), 'role' => 'form', 'class' => 'login-form validate', 'id' => 'login-form', 'name' => 'login-form']) !!}
            <div class="row">
                <div class="form-group col-xs-12">
                    <label class="form-label" for="email">{{ trans('ui.text.email') }}</label>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'username@domain.com', 'required', 'autofocus', 'id' => 'email']) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-xs-12">
                    <label class="form-label" for="password">{{ trans('ui.text.password') }}</label> <span class="help"></span>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password', 'required', 'id' => 'password']) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-xs-12">
                    <div class="checkbox checkbox check-success">
                        {{ Form::checkbox('remember', 1, true, ['id' => 'publish-flag']) }}

                        <label for="checkbox1">{!! trans('ui.text.remember-me') !!}</label>&nbsp;&nbsp;

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button class="btn col-xs-12" style="color: black" type="submit">{{ trans('ui.text.login') }}</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
