<?php

namespace Sands\Asasi\Policy\Middleware;

use Closure;
use Sands\Asasi\Policy\Policy;

class AuthorizeControllerAccess
{
    protected $policy;

    public function __construct(Policy $policy)
    {
        $this->policy = $policy;
    }

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
        if (!$this->policy->checkCurrentRoute()) {
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
