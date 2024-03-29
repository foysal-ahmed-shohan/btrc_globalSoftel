<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginActivity;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/user-index';
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
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.index');
            }else{
                // insert user login activity on database
                $user_value= auth()->user();
                $ip=$request->ip();
                $form_data = array(
                    'user_id'=> Auth::id(),
                    'date'=> date('d M Y'),
                    'time'=> date('h:i:s A'),
                    'ip_address'=> $ip,
                    'status'=> 1,
                );
                $value=LoginActivity::create($form_data);
                return redirect()->route('user.index');
            }
        }else{
            toastr()->error('Email-Address or Password Not Match. Please try again!');
            return redirect()->route('login');
            //->with('error','Email-Address And Password Are Wrong.');
        }
    }
}
