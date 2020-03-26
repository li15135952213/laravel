<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	echo '我是首页';
    }

    public function good(){
    	echo '我是商品';
    }

    // public function add(){
    // 	return view('add');
    // }

    public function adddo(){
    	echo request()->name;
    	return redirect('/goods');
    }

    public function add(){
    	// dump(request()->isMethod('get'));
    	if(request()->isMethod('get')){
    		return view('add');
    	}
    	if(request()->isMethod('post')){
    		echo request()->name;

    	}
    }

    //必填参数
    public function show($id,$name){
    	echo $id.'---'.$name;
    }

    //可选参数路由
    public function news($id=null){
    	echo '新闻详情页';
    	echo $id;
    }

    //正则约束
    public function ze($id,$name){
    	echo $id;
    }
}
