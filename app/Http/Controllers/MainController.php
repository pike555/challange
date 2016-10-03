<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

use App\Http\Requests;

class MainController extends Controller
{
    public function getMain(){
      $user = DB::table('account')->where('username', Session::get('username'))->first();
      $role = explode(",", $user->role);
      //return $role;
      //return is_array((array)$user->role)? 'yes':'no' ;
      if($role[0] == 0){
        $announces = DB::table('announce')->get();
      }else{
        $announces = DB::table('announce')->whereIn('role',$role)->orWhere('role','0')->get();
      }
      // return $announces;
      return view('main',['announces'=>$announces])->with('navMain',true);
    }
    public function getRole(){
      $roles = DB::table('role')->get();
      return view('role',['roles'=>$roles])->with('navRole',true);
    }
    public function postRole(Request $request){
      //return implode(",",$request->input('inputRole'));
      if($request->input('inputAllrole') == "on"){
        DB::table('account')->where('username',Session::get('username'))->update(['role'=>'0']);
      }else{
        DB::table('account')->where('username',Session::get('username'))->update(['role'=>implode(",",$request->input('inputRole'))]);
      }
      return redirect()->route('main');
    }
}
