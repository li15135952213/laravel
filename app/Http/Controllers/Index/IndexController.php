<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Category;
class IndexController extends Controller
{
    public function index(){
    	$goods=Goods::select('goods_id','img')->where('is_slide',1)->orderBy('goods_id','desc')->take(5)->get();
    	// dd($goods);
    	$new_res=Goods::where('is_new',1)->take(4)->get();
     	$best_res=Goods::where('is_best',1)->take(4)->get();
       	$up_res=Goods::where('is_up',1)->take(4)->get();
		$pid_res=Category::where('pid',0)->get();
    	return view('index.index',['goods'=>$goods,'best_res'=>$best_res,'new_res'=>$new_res,'up_res'=>$up_res,'pid_res'=>$pid_res]);
    }
}
