<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        //$this->middleware('guest:mechanic')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.dashboard');
            }else if(auth()->user()->normal_user_type=='customer'){

                return redirect()->route('fronthome');
            }
            else{
                return redirect()->route('client.dashboard');
            }
        }else{

            return redirect()->route('login')
                ->with('error','Authentication Failed. Email or Password Is Invalid.');
        }

    }
    public function showMechanicLoginForm()
    {
       // return view('auth.login', ['url' => route('admin.login-view'), 'title'=>'Admin']);
       return view('frontend.mechanic_login');
    }
    public function mechanicLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (\Auth::guard('mechanic')->attempt($request->only(['email','password']), $request->get('remember'))){
            // return redirect()->intended('/admin/dashboard');
            return redirect()->route('fronthome');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
