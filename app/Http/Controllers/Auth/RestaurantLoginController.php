<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RestaurantLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:restaurant')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.restaurant-login');
    }

    // dodati da bi se vratile error info na login stranicu
    // protected function sendFailedLoginResponse()
    // {
    //     throw ValidationException::withMessages([
    //         'email' => [trans('auth.failed')],
    //     ])
    //         ->redirectTo(route('restaurant.login'));
    // }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('restaurant')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('restaurant.dashboard'));
        }

        // return redirect()->route('restaurant.login')->with($request->email, $request->remember);
        return redirect(route('restaurant.login'))
            ->withInput(['email' => $request->email])
            ->withErrors(['email' => 'Wrong email or password']);
        // return $this->sendFailedLoginResponse();
    }

    public function logout(Request $request)
    {
        Auth::guard('restaurant')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // if ($response = $this->loggedOut($request)) {
        //     return $response;
        // }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('restaurant.login'));
    }
}
