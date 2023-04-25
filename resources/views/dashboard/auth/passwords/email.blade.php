@extends('layouts.dashboard.auth.layout')

<!-- Main Content -->
@section('content')
    <style>
        .g-recaptcha > div {
            width: auto !important;
            height: auto !important;
        }
    </style>

    <div class="row login-container column-seperation">
        <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-6">
            <h1 class="text-center">{{ trans('ui.text.forgot-pass') }}</h1>

            @if($errors->any())
                <br>
                @foreach($errors->all() as $error)
                    <div class="alert alert-error">
                        <button class="close" data-dismiss="alert"></button>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert"></button>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <br>

            {!! Form::open(['url' => '/dashboard/auth/password/email', 'role' => 'form', 'class' => 'login-form validate', 'id' => 'forgot-form', 'name' => 'forgot-form']) !!}
            <div class="row">
                <div class="form-group col-xs-12">
                    <label class="form-label" for="email">{{ trans('ui.text.email') }}</label>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'username@domain.com', 'required', 'autofocus', 'id' => 'email']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary btn-cons" type="submit">{{ trans('ui.btn.send-reset-link') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
