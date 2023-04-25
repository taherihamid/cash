<?php

namespace App\Http\Middleware;


use App\Classes\Response;
use App\People;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Validator;
use App\UserToken;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->locale($request);

        $routeName = Route::currentRouteName();

        $hashTable = config('hash');

        $validator = Validator::make($request->header(), [
            'userid' => 'required',
            'token' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::validation($validator->errors());

        } else {

            if (isset($hashTable['api']['standard'][$routeName]['check']) && in_array('university_user_id', $hashTable['api']['standard'][$routeName]['check'])) {
                $exist = UserToken::where([
                    'user_id' => $request->header('userid'),
                    'token' => $request->header('token'),
                    'university_user_id' => $request->university_user_id
                ])->first();

            }elseif (isset($hashTable['api']['standard'][$routeName]['check']) &&
                in_array('identification_number', $hashTable['api']['standard'][$routeName]['check'])&&
                in_array('identification_type', $hashTable['api']['standard'][$routeName]['check'])
            ){
                $exist = UserToken::where([
                     'user_id' => $request->header('userid'),
                     'token' => $request->header('token'),
                ])->first();

                $user = People::find($request->header('userid'));


                if(!empty($exist)){
                    if(!empty($user->identification_number) and !empty($user->password)) {

                    }else{
                        return Response::json(trans('messages.login_required'), null, 460);
                    }
                }
            }
            else {
                $exist = UserToken::where(['user_id' => $request->header('userid'), 'token' => $request->header('token')])->first();
            }

        }

        if (!$exist) {
            return Response::json(trans('messages.invalid_token'), null, 401);
        }

        return $next($request);
    }

    public function locale(Request $request)
    {
        $lang = $request->query('lang');

        $locales = config('translatable.locales');

        if ($lang and in_array($lang, $locales))
            app()->setLocale($lang);
    }
}
