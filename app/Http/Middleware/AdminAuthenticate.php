<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class AdminAuthenticate
{
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!$user = Auth::guard($guard)->user()) {
            return redirect(route('admin.login'));
        } else {
            $role = Role::where('id', $user->role_id)->first();
            $user->role_name = ($role) ? $role->name : null;

            // update is_online flag
            $expiresAt = Carbon::now()->addMinutes(5);
//            Cache::put('admin-is-online-' . $user->id, true, $expiresAt);

            $prefix = app('request')->route()->getPrefix();
//            dd($prefix);

            if (!in_array($prefix, config('acl.exclude'))) {

                if ($role) {

                    $route = app('request')->route()->getAction();
                    $controller_action = class_basename($route['controller']);

                    $controller_action = explode('@', $controller_action);

                    $controller = $controller_action[0];
                    $action = $controller_action[1];
                    $auth = collect(config('acl.sections'));
                    $permissions = json_decode($role->permissions, true);


                    $section = $auth->where('controller', $controller)->first();


                    if ($section) {
                        $section = $this->UnsetByKey($section, [
                            'controller',
                            'id',
                            'name',
                            'icon',
                            'url',
                            'count',
                            'access',
                            'has_publish'
                        ]);


                        foreach ($section as $perm => $value) {
                            $res = in_array($action, $value);

                            if ($res) {

                                if (isset($permissions['sections'][$controller][$perm])) {
                                    if ($permissions['sections'][$controller][$perm] == 1) {
                                        $request->setUserResolver(function() use ($user) {
                                            return $user;
                                        });

                                        $this->ShareUserPermission($permissions, $permissions['sections'][$controller], $user, $role->name);
                                        return $next($request);
                                    }
                                }

                                Session::flash('error_flash', trans('messages.forbidden'));
                                return redirect()->route('admin.dashboard');
                            }
                        }

                        Session::flash('error_flash', trans('messages.forbidden'));
                        return redirect()->route('admin.dashboard');
                    }
                    else {

                        Session::flash('error_flash', trans('messages.forbidden'));
                        return redirect()->route('admin.dashboard');
                    }
                } else {

                    Session::flash('error_flash', trans('messages.forbidden'));
                    return redirect()->route('admin.dashboard');
                }
            } else {
                $this->ShareUserPermission(json_decode($role->permissions, true), [
                    'read'    => 0,
                    'write'   => 0,
                    'update'  => 0,
                    'delete'  => 0,
                    'publish' => 0
                ], $user);
            }
        }

        return $next($request);
    }

    private function UnsetByKey($array, $keys)
    {
        foreach ($keys as $key)
            unset($array[$key]);

        return $array;
    }

    private function ShareUserPermission($permissions, $perms, $user)
    {
        View::share('currentAdmin', $user);

        View::share('read', $perms['read']);
        View::share('write', $perms['write']);
        View::share('update', $perms['update']);
        View::share('delete', $perms['delete']);
        View::share('publish', $perms['publish']);

        View::share('permissions', $permissions['sections']);

        session(['acl' => [], 'publish' => $perms['publish'], 'update' => $perms['update']]);
    }
}
