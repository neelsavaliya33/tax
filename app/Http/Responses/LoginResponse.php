<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        abort_unless(!auth()->user()->status != 1, 403);
        $home = auth()->user()->role == 'ADMIN' ? '/dashboard' : '/tax-calculator';
        return redirect()->intended($home);
    }
}