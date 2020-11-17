<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ExtraController extends Controller
{
    public function English(){

    	Session::get('lang');
    	session()->forget('lang');
    	Session()->put('lang','english');
    	return redirect()->back();
    }

     
    public function Bangla(){
    	
    	Session::get('lang');
    	session()->forget('lang');
    	Session()->put('lang','bangla');
    	return redirect()->back();
    }
}
