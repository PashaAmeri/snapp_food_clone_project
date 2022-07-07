<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class IsSellerCompelitedProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (is_null(Restaurant::where('user_id', auth()->user()->id)->first())) {

            return redirect()->route('restaurant_profile.create');
        }

        return $next($request);
    }
}
