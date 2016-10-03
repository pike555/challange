<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function getMain(){
      return view('admin.main');
    }
    public function getAdd(){
      return view('admin.add');
    }
}
