<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function getMain(){
      return view('main')->with('navMain',true);
    }
    public function getRole(){
      return view('role')->with('navRole',true);
    }
    public function postRole(){
      return redires()->route('main');
    }
}
