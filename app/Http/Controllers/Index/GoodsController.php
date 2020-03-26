<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;

class GoodsController extends Controller
{
    public function index($id){
    	// dd(encrypt(123456));
    	$goods=Goods::find($id);
    	// dd($goods);
    	
    	return view('index.goods',['goods'=>$goods]);
    }

    public function addcart(Request $request){
    	//判断用户有没有登录
    	$user=$request->session()->get('user');
    	// dd($user);
    	if(!$user){
    		return json_encode(['code'=>'00003','msg'=>'用户未登录']);
    	}
    	$goods_id=$request->goods_id;
    	$buy_number=$request->buy_number;
    	// echo $goods_id;
    	// echo $buy_number;

        //根据商品ID查询商品信息
        $goods=Goods::find($goods_id);
        //判断库存
        if($goods->goods_number<$buy_number){
            return json_encode(['code'=>'00004','msg'=>'库存不足']);
        }

        //判断用户之前是否添加过此商品  如果添加过则更改购买数量即可
        $cart=Cart::where(['user_id'=>$user->user_id,'goods_id'=>$goods_id])->first();
        // dd($cart);
        if($cart){
            // echo 111;
            $buy_number=$cart->buy_number+$buy_number;
            if($goods->goods_number<$buy_number){
                $buy_number=$goods->goods_number;
            }
            $res=Cart::where('cate_id',$cart->cate_id)->update(['buy_number'=>$buy_number]);

        }else{
            // echo 222;
            //添加入购物车
            $data=[
                'user_id'=>$user->user_id,
                'goods_id'=>$goods_id,
                'buy_number'=>$buy_number,
                'goods_name'=>$goods->goods_name,
                'goods_price'=>$goods->goods_price,
                'img'=>$goods->img,
                'addtime'=>time()
            ];
            $res=Cart::create($data);
        }
        // dd($res);
        if($res!==false){
            return json_encode(['code'=>'00000','msg'=>'添加成功']);
        }
    }
}
