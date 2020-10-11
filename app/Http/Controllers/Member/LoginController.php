<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('member.login');
    }

    public function loginSocial(string $provider)
    {
        if (env('APP_ENV') === 'local') {
            auth()->loginUsingId(1);
            return redirect(request()->get('path'));
        }

        session(['login_refer' => request()->get('path')]);
        return Socialite::driver($provider)
            ->redirectUrl(route('login.callback', $provider))
            ->redirect();
    }

    public function callback($provider)
    {

    }
}
