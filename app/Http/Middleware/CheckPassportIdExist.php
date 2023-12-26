<?php

namespace App\Http\Middleware;

use App\Exceptions\PassportIdException;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPassportIdExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            !User::where('passport_id', \request()->route('passportId'))->exists()
        ) {
            return (new PassportIdException())->message();
        }

        return $next($request);
    }
}
