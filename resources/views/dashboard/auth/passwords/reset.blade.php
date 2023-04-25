@extends('layouts.dashboard-auth')

@section('content')
    <div class="row col-xs-12 no-margin no-padding">
        <div class="col-xs-12 no-padding panel panel-default">
            <div class="panel-heading">{{trans('ui.text.restore_password')}}</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/dashboard/auth/password/reset') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="col-xs-12 no-padding form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="material-form-group">
                            <input id="email" type="email" class="material-form-control" name="email" placeholder="ایمیل" value="{{ $email or old('email') }}" required autofocus>
                            <span class="bar"></span>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-xs-12 no-padding form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="material-form-group">
                            <input id="password" type="password" class="material-form-control" name="password" placeholder="کلمه عبور" required>
                            <span class="bar"></span>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-xs-12 no-padding form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="material-form-group">
                            <input id="password-confirm" type="password" class="material-form-control" name="password_confirmation" placeholder="{{ trans('ui.text.retype-new-password') }}" required>
                            <span class="bar"></span>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <footer class="row no-margin no-padding form-group flex-items-xs-middle">
                        <div class="col-xs-6 no-padding"></div>

                        <div class="col-xs-6 no-padding text-xs-left">
                            <button type="submit" class="btn btn-submit">{{trans('ui.text.change_password')}}</button>
                        </div>
                    </footer>
                </form>

                @if (session('status'))
                    <div class="modal fade flash-modal" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="success-modal" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-xs-center">
                                    <i class="icon success-icon"></i>
                                    <b>{{ trans('ui.text.success') }}</b>
                                    <span>{{ session('status') }}</span>
                                </div>

                                <div class="modal-footer text-xs-center">
                                    <button type="button" class="btn btn-submit" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#success-modal').modal('show');
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection
