<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class Authorize - check user permissions
 * @package App\Http\Middleware
 */
class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param   string $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (\Auth::guest()) {
            if ($request->ajax()) {
                return response(['error' => 'Unauthorized.'], 401);
            } else {
                return redirect()->guest('user/login');
            }
        }

        if (!$request->user()->can($permission)) {
            if ($request->ajax()) {
                return response(['error' => 'Not enough rights.'], 401);
            } else {
                return redirect()->back();
            }
        }

        return $next($request);
    }
}