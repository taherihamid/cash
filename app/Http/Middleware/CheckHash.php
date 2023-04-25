<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class CheckHash
{
    public function handle(Request $request, Closure $next)
    {
        $flag = true;
        $invalidHash = false;
        $input = [];
        $routeName = Route::currentRouteName();

        $hashTable = config('hash');

        $hash = [
            'hash', 'header'
        ];

        if (isset($hashTable['api']['standard'][$routeName])) {

            $method = $hashTable['api']['standard'][$routeName]['method'];

            $input[] = $request->header('userid');

            $input[] = $request->header('token');

            foreach ($hashTable['api']['standard'][$routeName]['parameters'] as $value) {

                $val = $request->$method($value);

                if ($val) {
                    $input[] = $request->$method($value);
                }
                else {
                    $invalidHash = true;
                    break;
                }
            }

        }
        else if (isset($hashTable['api']['custom'][$routeName])) {
            $hash = $hashTable['api']['custom'][$routeName]['hash'];
            $hash = explode('|', $hash);

            foreach ($hashTable['api']['custom'][$routeName]['parameters'] as $value) {
                $parameterMethod = explode('|', $value);
                $parameter = $parameterMethod[0];
                $method = $parameterMethod[1];

                $val = $request->$method($parameter);

                if ($val) {
                    $input[] = $val;
                }
                else {
                    $invalidHash = true;
                    break;
                }

            }
        }
        else {
            $flag = false;
        }

        if ($invalidHash) {
            $responseCode = 401;
            $response = [
                'meta' => [
                    'error'   => null,
                    'message' => trans('messages.invalid_hash')
                ],
                'data' => null
            ];

            return response()->json($response, $responseCode);
        }
        else if ($flag) {
            try {
                $validator = Validator::make($request->{$hash[1]}(), ['hash' => 'required']);

                if ($validator->fails()) {
                    $responseCode = 422;
                    $response = [
                        'meta' => [
                            'error'   => $validator->errors(),
                            'message' => trans('messages.not_valid_input')
                        ],
                        'data' => null
                    ];

                    return response()->json($response, $responseCode);
                }

                if (!$this->check($input, $request->{$hash[1]}($hash[0]))) {
                    $responseCode = 401;
                    $response = [
                        'meta' => [
                            'error'   => null,
                            'message' => trans('messages.invalid_hash')
//                            'message' => trans('messages.invalid_username')
                        ],
                        'data' => null
                    ];

                    return response()->json($response, $responseCode);
                }
            }
            catch (Exception $e) {
                $responseCode = 422;
                $response = [
                    'meta' => [
                        'error'   => null,
                        'message' => trans('messages.unknown_error')
                    ],
                    'data' => null
                ];

                return response()->json($response, $responseCode);
            }
        }

        return $next($request);

    }

    protected function check(Array $input, $hash)
    {
        $string = implode('', $input) . config('settings.salt');

        $trueHash = md5($string);

//        dd($trueHash);
        if ($hash == $trueHash) {
            return true;
        }

        return false;
    }
}
