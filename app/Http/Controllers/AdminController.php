<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests\AddannounceRequest;
use App\Http\Requests\EditannounceRequest;

class AdminController extends Controller
{
    public function getMain(){
      return view('admin.main',['announces'=>DB::table('announce')->get()]);
    }
    public function getAdd(){
      $roles = DB::table('role')->get();
      return view('admin.add')->with('roles',$roles);
    }
    public function postAdd(AddannounceRequest $request){
      //$destinationPath
      $id = DB::select("SHOW TABLE STATUS LIKE 'account'");
      $filename = $id[0]->Auto_increment.'.jpg';
      $destinationPath = 'uploads'; // upload path
      // $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
      $request->file('inputImg')->move($destinationPath, $filename);
      if($request->input('inputAllrole') == "on"){
        $role = 0;
      }else{
        $role = implode(",",$request->input('inputRole'));
      }
      DB::table('announce')->insert(
          ['title' => $request->input('inputTitle'), 'content' => $request->input('inputContent'), 'img' => $filename, 'role'=>$role]
      );
      // return $req->file('inputImg');
      return redirect()->route('announce');
    }
    public function Delete($id){
      DB::table('announce')->where('id',$id)->delete();
      return redirect()->route('announce');
    }
    public function getEdit($id){
      $roles = DB::table('role')->get();
      $announce = DB::table('announce')->where('id',$id)->first();
      //return $announce->title;
      $selectRoles = explode(",", $announce->role);
      //return $selectRoles;
      return view('admin.edit',['announce'=>$announce,'selectRoles'=>$selectRoles])->with('roles',$roles);
    }
    public function postEdit(EditannounceRequest $request){
      if ($request->file('inputImg')) {
        $destinationPath = 'uploads'; // upload path
        $extension = $request->file('inputImg')->getClientOriginalExtension(); // getting image extension
        $request->file('inputImg')->move($destinationPath, $request->input('inputId').'.'.$extension);
      }
      if($request->input('inputAllrole') == "on"){
        $role = 0;
      }else{
        $role = implode(",",$request->input('inputRole'));
      }
      DB::table('announce')->where('id',$request->input('inputId'))->update(['title'=>$request->input('inputTitle'), 'content'=>$request->input('inputContent'), 'img'=>$request->input('inputId').'.jpg', 'role'=>$role]);
      return redirect()->route('announce');
    }
}
