<?php
/**
 * CodersStudio 2019
 * https://coders.studio
 * info@coders.studio
 *
 */

namespace CodersStudio\Cart\Http\Middleware;

use CodersStudio\Cart\Models\PaymentMethod;
use Closure;
use Illuminate\Support\Facades\Route;

class PaymentMethodMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Route::currentRouteName() === 'checkout.success' || Route::currentRouteName() === 'checkout.fail') {
            $payment_method = $request->route('payment_method_id');
            $request->merge([
                'payment_method_id' => $payment_method
            ]);
        }

        return $next($request);
    }
}
