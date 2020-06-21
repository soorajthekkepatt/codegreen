<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\UserDetail;
use App\User;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function verification()
    {
        $six_digit_random_number = mt_rand(100000, 999999);
        $user = Auth::user()->id;
        UserDetail::where('user_id','=',$user)->update(['verify_code' => $six_digit_random_number]);
        dd($six_digit_random_number);

        // send verification code as mail 

        // $message = Mail::to($to);
        // $message->cc(['sooraj@virtina.com', 'jainy@virtina.com']);
        // $message->send(new EnquirySalesEmail($data));
        
    }

    public function checkcode()
    {
        $vercode = UserDetail::where('user_id','=', Auth::user()->id)
             ->get(['verify_code']);

             return $vercode[0]->verify_code;
    }

    public function updateuser()
    {
        $user = Auth::user()->id;
        $lastupdated = date('Y-m-d H:i:s');
        User::where('id','=',$user)->update(['user_status' => 1]);
    }
}
