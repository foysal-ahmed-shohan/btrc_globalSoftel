<?php
namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\Contact;
use App\Models\Package;
use App\Models\Payment;
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

        $total_user=User::where('is_admin',0)->count();
        $activities=Activity::orderBy('id', 'desc')->take(6)->get();
        $total_sale=Payment::count();
        $total_amount=Payment::sum('amount');
        $total_product=Package::where('status',1)->count();
        $total_lead=Contact::where('contact_type','Subscribe')->count();
        $orders=Payment::orderBy('id','desc')->take(5)->get();
        //return $total_lead;
        if(Auth()->user()->is_admin==1){
            return view('admin.index',compact('total_user','total_sale','activities','total_amount','total_product','total_lead','orders'));
        }
        else{
            $user=User::where('id',Auth::id())->first();
            $payment_info=Payment::where('user_id',Auth::id())->orderBy('id','DESC')->first();
            $total_amount=Payment::where('user_id',Auth::id())->sum('amount');
            $order_count=Payment::where('user_id',Auth::id())->orderBy('id','DESC')->count();
            return view('user.index',compact('user','payment_info','total_amount','order_count'));
        }
    }

    public function admin_index()
    {
        $total_user=User::where('is_admin',0)->count();
        $activities=Activity::orderBy('id', 'desc')->take(6)->get();
        $total_sale=Payment::count();
        $total_amount=Payment::sum('amount');
        $total_product=Package::where('status',1)->count();
        $total_lead=Contact::where('contact_type','Subscribe')->count();
        $orders=Payment::orderBy('id','desc')->take(5)->get();
        return view('admin.index',compact('total_user','total_sale','activities','total_amount','total_product','total_lead','orders'));
    }

    public function user_index()
    {
        $user=User::where('id',Auth::id())->first();
        $payment_info=Payment::where('user_id',Auth::id())->orderBy('id','DESC')->first();
        $order_count=Payment::where('user_id',Auth::id())->orderBy('id','DESC')->count();
        $total_amount=Payment::where('user_id',Auth::id())->sum('amount');
        return view('user.index',compact('user','payment_info','total_amount','order_count'));
    }
}
