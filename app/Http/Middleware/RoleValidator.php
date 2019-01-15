<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleValidator{
    /**
     * Permissions per user
     */
    private $permissions = [
        "admin" => [
            "/home",
        ],
        "user" => [
            "/home",
            "/dynamicUrl1",
            "/dynamicUrl2",
            "/dynamicUrl3",
        ],
    ];
    /**
     * public urls for everyone
     */
    private $public_paths = [
        "",
        "/",
        "/login",
        "/logout",
        "/register",
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $user = Auth::User();
        $path = parse_url($request->url(),PHP_URL_PATH);

        if ( in_array( $path , $this->public_paths ) ) { // skip checking
            return $next($request);
        }
        if ( // check valid user
            ! isset( $user ) || ! $user ||
            ! $user["role"] ||
            ! $this->permissions[$user["role"]] ||
            ! in_array( $path , $this->permissions[$user["role"]] )
        ) {
            return redirect('login');
        }
        return $next($request);
    }
}
