<?php

namespace App\Http\Controllers\Bookstall;

use App\Http\Controllers\Controller;
use App\Models\Bookstall;
use Illuminate\Http\Request;
use Session;
class BookstallController extends Controller
{
    public function index()
    {
        return view('bookstall.home.home');
    }

    public function login()
    {
        return view('bookstall.login');
    }

    public function login_process(Request $request)
    {
        $bookstall = Bookstall::where('email', $request->email)->first();
        if ($bookstall) {
            if (password_verify($request->password, $bookstall->password)) {
                
                if($bookstall->activity == 1){
                    Session::put('bookstall_id', $bookstall->id);
                    Session::put('bookstall_name', $bookstall->name);
                
                    return redirect('/bookstall/dashboard');
                 }
                 else{
                    return redirect('/bookstall/login')->with('message', 'You are not activated yet!!');
                 }
              
            } else {
                return redirect('/bookstall/login')->with('message', 'Wrong Password!!');
            }
        } else {
            return redirect('/bookstall/login')->with('message', 'Invalid email!!');
        }
    }

    public function logout()
    {
        Session::forget('bookstall_id');
        Session::forget('bookstall_name');
        return redirect('/bookstall/login')->with('message', 'You are successfully logout!!');

    }
}
