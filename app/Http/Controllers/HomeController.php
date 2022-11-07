<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\File;
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
            $files=File::where('status',1)->orderBy('id','DESC')->take(5)->get();
            return view('admin.index',compact('files'));
        }
        else{
            $files=File::where('status',1)->orderBy('id','DESC')->paginate(12);
            return view('user.index',compact('files'));
        }
    }

    public function admin_index()
    {
        $files=File::where('status',1)->orderBy('id','DESC')->take(5)->get();
        return view('admin.index',compact('files'));
    }

    public function user_index()
    {
        $files=File::where('status',1)->orderBy('id','DESC')->paginate(12);
        return view('user.index',compact('files'));
    }
}
