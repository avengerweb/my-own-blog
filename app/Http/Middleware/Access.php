<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Access
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Check user permission
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if ($this->auth->guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('user/login');
            }
        }

        if (!$this->auth->user()->hasPermission($permission))
            return redirect()->guest('/');

        return $next($request);
    }
}
