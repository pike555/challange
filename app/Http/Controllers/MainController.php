<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

use App\Http\Requests\RoleRequest;

class MainController extends Controller
{
    public function getMain(){
      $user = DB::table('account_all')->select('role_id')->where('username', Session::get('username'))->get();
      // $role = explode(",", $user->role);
      if($user[0]->role_id == 0){
        $announces = DB::table('announce')->get();
      }else{
        // $announces = DB::table('announce_all')->whereIn('role',$role)->orWhere('role','0')->get();
        $announces = DB::select('select id,title,content,img from announce_all where role_id in (SELECT role_id FROM `account_all` where username = ?) or role_id = 0 group by id,title,content,img',[Session::get('username')]);
      }
      return view('main',['announces'=>$announces])->with('navMain',true);
    }
    public function getRole(){
      $roles = DB::table('role')->get();
      $selectRoles = DB::table('account_all')->select('role_id')->where('username',Session::get('username'))->get();
      // $selectRoles = explode(",", $user->role);
      return view('role',['roles'=>$roles,'selectRoles'=>$selectRoles])->with('navRole',true);
    }
    public function postRole(RoleRequest $request){
      DB::table('account_role')->where('acc_id',Session::get('userid'))->delete();
      if($request->input('inputAllrole') == "on"){
        //DB::table('account_role')->where('username',Session::get('username'))->update(['role'=>'0']);
        DB::table('account_role')->insert(['acc_id'=>Session::get('userid'),'role_id'=>'0']);
      }else{
        //DB::table('account_role')->where('username',Session::get('username'))->insert(['role'=>implode(",",$request->input('inputRole'))]);
        foreach($request->input('inputRole') as $key => $role){
          $data[$key]["acc_id"] = Session::get('userid');
          $data[$key]["role_id"] = $role;
        }
        DB::table('account_role')->insert($data);
      }
      return redirect()->route('main');
    }
    public function getAnnounce($id){
      $announce = DB::table('announce')->where('id',$id)->first();
      //return $announce;
      return view('announce',['announce'=>$announce]);
    }
}
