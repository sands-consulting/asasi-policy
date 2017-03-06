<?php

namespace Sands\Asasi\Policy\Middleware;

use Closure;
use Sands\Asasi\Policy\Policy;

class AuthorizeControllerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!app('policy')->checkCurrentRoute()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()
                    ->to('/')
                    ->with('danger', trans('auth.unauthorized'));
            }
        }

        return $next($request);
    }
}
