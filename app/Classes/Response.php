<?php

namespace App\Classes;


class Response
{
    const HTTP_OK = 200;
    const HTTP_NO_CONTENT = 204;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_UNPROCESSABLE_ENTITY = 422;
    const HTTP_SSO_LOGIN_ERROR = 440;
    const HTTP_ERROR = 500;

    const MESSAGE_SUCCESS = 1;
    const MESSAGE_VALIDATION_ERROR = 2;
    const MESSAGE_UNKNOWN_ERROR = 3;
    const MESSAGE_NOT_FOUND = 4;

    public static function validation($error)
    {
        return response()->json([
            'meta' => [
                'error' => $error,
                'message' => trans('messages.validation_error')
            ],
            'data' => null,
        ], self::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function json($message = null, $data = null, $status = self::HTTP_OK, $error = null)
    {
        return response()->json([
            'meta' => [
                'error' => $error,
                'message' => trans($message)
            ],
            'data' => $data,
        ], $status);
    }

    public static function pure($data)
    {
        return response()->json(['meta' => $data]);
    }

    public static function guard()
    {
        Log::access_denied('guard');

        return response()->json([
            'meta' => [
                'error' => null,
                'message' => 'gard-error'
            ],
            'data' => null,
        ], self::HTTP_FORBIDDEN);

    }

    public static function hashError()
    {
        Log::access_denied('hash');

        return response()->json([
            'meta' => [
                'error' => trans('messages.invalid_hash'),
                'message' => trans('messages.access_denied')
            ],
            'data' => null,
        ], self::HTTP_UNAUTHORIZED);
    }


    public static function log_label($admin_login_attempt)
    {
        if ($admin_login_attempt->header == 'login-failed') {
            return ['class' => 'danger', 'text' => trans('ui.text.attempt-header-danger-text')];
        } elseif ($admin_login_attempt->header == 'login-success') {
            return ['class' => 'success', 'text' => trans('ui.text.attempt-header-success-text')];
        } elseif ($admin_login_attempt->header == 'login-try') {
            return ['class' => 'warning-', 'text' => trans('ui.text.attempt-header-warning-text')];
        } elseif ($admin_login_attempt->header == 'login-404') {
            return ['class' => 'danger', 'text' => trans('ui.text.attempt-header-email_not_found-text')];
        }
    }
}
