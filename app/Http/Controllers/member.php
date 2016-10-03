<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

use App\Http\Requests\LoginRequest;
use Yajra\Datatables\Facades\Datatables;

class member extends Controller
{
    public function test(){
        //return view('master');
        return Session::get('userid');
        // return Datatables::of(DB::table('account'))->make(true);
    }

    public function getLogin(){
        return view('login');
    }

    public function postLogin(LoginRequest $request){
      $user = DB::table('account')->where([['username', $request->input('inputUsername')],['password',md5($request->input('inputPassword'))]])->first();
      if($user){
        if($user->admin){
          Session::put('admin', true);
        }
        Session::put('username', $request->input('inputUsername'));
        Session::put('userid', $user->id);
        return redirect()
              ->route('main');
      }else{
        return redirect()
              ->back()->with('status','username or password incorrect');
      }
    }

    public function Logout(){
      Session::flush();
      return redirect()->route('login');
    }
}
