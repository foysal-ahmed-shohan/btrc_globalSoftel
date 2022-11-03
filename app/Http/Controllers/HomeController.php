<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $title = 'Namaz';

        // Sharing is caring
        View::share('title', $title);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth()->user()->is_admin==1){
            return view('admin.index');
        }
        else{
            $user=User::where('id',Auth::id())->first();
            return view('user.index');
        }
    }

    public function admin_index()
    {
        return view('admin.index');
    }

    public function user_index()
    {
        return view('user.index');
    }
}
