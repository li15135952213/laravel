<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class LoginController extends Controller
{
    public function login(){
    	return view('login');
    }

    public  function logindo(){
    	$post=request()->except('_token');
    	// dd($post);

    	$post['pwd']=md5(md5($post['pwd']));
    	// dd($post);

    	$adminuser=Admin::where($post)->first();
    	// dd($adminuser);

    	if($adminuser){
    		session(['adminuser'=>$adminuser]);
    		return redirect('/brand/index');
    	}

    	return redirect('/login')->with('msg','用户名或者密码错误');

    }
}
