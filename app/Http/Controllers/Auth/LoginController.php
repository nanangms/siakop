<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            if($user->verifikasi == 'Y'){
                if($user->is_active == 'Y'){
                    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                        $user->update([
                            'last_login_at' => Carbon::now()->toDateTimeString(),
                            'last_login_ip' => $request->getClientIp()
                        ]);
                        // Authentication passed...
                        if(Auth::user()->role->nama_role == 'Admin' or Auth::user()->role->nama_role == 'Super Admin'){
                            return redirect()->intended('/home');
                        }else{
                            return redirect()->intended('/home');
                        
                        }
                    }else{
                        return redirect()->back()->withErrors('Maaf password salah');
                    }
                }else{
                    return redirect()->back()->withErrors('Maaf akun anda dinonaktifkan');
                }
            }else{
                return redirect()->back()->withErrors('Maaf akun anda belum diverifikasi');
            }
        }else{
            return redirect()->back()->withErrors('Maaf email belum terdaftar');
        }

    }
}
