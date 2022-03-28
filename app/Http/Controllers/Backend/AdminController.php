<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class AdminController extends Controller
{
    public function adminLoginForm()
    {
      return view('backend/admin/admin_login');
    }
    public function adminLogin(Request $req)
    {
      $req->validate([
         'email'=>'required',
         'password'=>'required',
      ]);

      if (Auth::guard('admin')->attempt(['email'=>$req->email,'password'=>$req->password])) {
          return redirect('admim/dashboard');
      }else {
        session()->flash('message',"Email & Password don't match");
        return redirect()->back();
      }

    }

    public function adminLogout()
    {
      Auth::guard('admin')->logout();
      return redirect('login/admim');
    }

}
