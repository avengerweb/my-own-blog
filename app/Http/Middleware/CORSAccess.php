<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CORSAccess
 *
 * Add CORS headers to all requests
 *
 * @package App\Http\Middleware
 */
class CORSAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     * @throws \Illuminate\Support\Facades\SuspiciousOperationException
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $response = $request->method() === 'OPTIONS' ? response('') : $next($request);

        if ($origin = $request->headers->get('referer', $request->headers->get('origin')))
        {
            $origin = parse_url($origin);

            if (isset($origin['scheme']) && isset($origin['host'])) {
                $origin = $origin['scheme'] . "://" . $origin['host'] . (isset($origin['port']) ? ":" . $origin['port'] : "");
            } else {
                $origin = '*';
            }
        }
        else
            $origin = "*";

        $response->headers->set('Access-Control-Allow-Origin', $origin);
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE, HEAD');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        $response->headers->set("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, x-atlassian-mau-ignore");

        return $response;
    }
}