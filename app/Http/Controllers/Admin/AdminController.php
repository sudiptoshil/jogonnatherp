<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Bookstall;
use Session;
use DB;
class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.home.home');
    }

    public function login()
    {
        return view('admin.login.login');
    }
    public function login_process(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            if (password_verify($request->password, $admin->password)) {
                
                if($admin->activity == 1){
                    Session::put('admin_id', $admin->id);
                    Session::put('admin_name', $admin->name);
                
                    return redirect('/admin/dashboard');
                 }
                 else{
                    return redirect('/admin/login')->with('message', 'You are not activated yet!!');
                 }
              
            } else {
                return redirect('/admin/login')->with('message', 'Wrong Password!!');
            }
        } else {
            return redirect('/admin/login')->with('message', 'Invalid email!!');
        }
    }

    public function create_admin()
    {
        return view('admin.createadmin.create_admin');
    }
    public function save_admin(Request $request)
    {   
        // return $request->all();
        // exit();

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->activity = 1;
        $admin->save();
        return redirect()->back()->with('message','Admin Created Successfully!!');
    }

    public function logout()
    {
        Session::forget('admin_id');
        Session::forget('admin_name');
        return redirect('/admin/login')->with('message', 'You are successfully logout!!');
    }
    public function manage_admin()
    {   $admin = Admin::all();
        return view('admin.manageadmin.manage_admin',compact('admin'));
    }

    public function active($id)
    {
        $admin = Admin::find($id);
        $admin->activity = 1;
        $admin->save();
        return redirect()->back()->with('message','Admin Activated Successfully!!');
    }

    public function deactive($id)
    {
        $admin = Admin::find($id);
        $admin->activity = 0;
        $admin->save();
        return redirect()->back()->with('message','Admin deactivated Successfully!!');
    }

    public function password_reset()
    {
        return view('admin.passwordreset.password_reset');
    }

    public function update_password(Request $request)
    {   
        // return $request->all();
        // exit();
        $admin = Admin::where('id', $request->id)->first();
        if ($admin) {
            if (password_verify($request->oldpassword, $admin->password)) {
                
                $newpassword = Admin::find($request->id);
                $newpassword->password = bcrypt($request->newpassword);
                $newpassword->save();
                return redirect()->back()->with('message','password changes successfully!!');
          
            } else {
                return redirect()->back()->with('message','old password not valid!!');
            }
        }
    }

    public function bookstall_user()
    {
        return view('admin.createbookstall.bookstall');
    }

    public function save_bookstall_user(Request $request)
    {
        $admin = new Bookstall();
        $admin->name = $request->name;
        $admin->admin_id = Session::get('admin_id');
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->activity = 1;
        $admin->save();
        return redirect()->back()->with('message','Bookstall User Created Successfully!!');
    }

    public function manage_bookstall_user()
    {  
         $bookstall = Bookstall::all();
        return view('admin.createbookstall.manage_bookstall',compact('bookstall'));
    }

    public function bookstall_active($id)
    {
        $bookstall = Bookstall::find($id);
        $bookstall->activity = 1;
        $bookstall->save();
        return redirect()->back()->with('message','bookstall Activated Successfully!!');
    }

    public function bookstall_deactive($id)
    {
        $bookstall = Bookstall::find($id);
        $bookstall->activity = 0;
        $bookstall->save();
        return redirect()->back()->with('message','bookstall deactivated Successfully!!');
    }
}
