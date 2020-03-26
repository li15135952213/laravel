<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;

class CartController extends Controller
{
    public function pay(){
    	$user_id=5;
        // 存的session变量名叫什么
        $user_id=session('user');
    	$cartInfo=Cart::where('user_id',$user_id->user_id)->get();
    	$buy_number=array_column($cartInfo->toArray(),'buy_number');
    	$cart_id=array_column($cartInfo->toArray(),'cate_id');
    	// $cartInfo=Cart::all();
    	$count=Cart::count();
    	// dd($count);
    	return view('index.cart',['cartInfo'=>$cartInfo,'buy_number'=>$buy_number,'count'=>$count,'cate_id'=>$cart_id]);
    }
    // public function pay(){
  
    // 	return view('index.cart');
    // }
    // public function cart(){
    //     $admin=session('user');
    //     $res=Cart::where(['user_id'=>$admin->user_id])->count();
    //     $cart_res=Cart::where(['user_id'=>$admin->user_id])
    //     ->get();
    //     dd($cart_res);
    //     return view('index.cartlist',['res'=>$res,'cart_res'=>$cart_res]);
    // }
}
