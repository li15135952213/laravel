<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res=Goods::all();
        return view('goods.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([ 
            'goods_name' => 'required|unique:goods|max:50',
            'goods_score' => 'required',
            'goods_price' => 'required',
        ],[
            'goods_name.required'=>'商品名称必填!',
            'goods_name.unique'=>'商品名称已存在!',
            'goods_name.max'=>'商品名称最大长度不超过50位!',
            'goods_score.required'=>'商品库存必填!',
            'goods_price.required'=>'商品价格必填!',
        ]);

        $post=$request->except('_token');
        // dd($post);

         //文件上传
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }

        //多文件上传
        if($request->hasFile('imgs')){
            $imgs=$this->Moreupload('imgs');
            $post['imgs']=implode('|',$imgs);
        }


        $res=Goods::insert($post);
        // dd($res);
        if($res){
            return redirect('/goods/index');
        }

        
    }
    //文件上传
    public function upload($img){
        if(request()->file($img)->isValid()){
            $file=request()->$img;
            $store_result=$file->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

    //上传多张图片
    public function Moreupload($img){
        //接受文件
        $file=request()->$img;
        foreach($file as $k=>$v){
            //判断上传过程中有无错误
            if($v->isValid()){
                $store_result[$k]=$v->store('uploads');
            }else{
                $store_result[$k]='未获取到上传文件或上传过程出错';
            }
        }
        return $store_result;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res=Goods::where('goods_id',$id)->first();
        return view('goods.edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([ 
            'goods_name' => 'required|unique:goods|max:50',
            'goods_score' => 'required',
            'goods_price' => 'required',
        ],[
            'goods_name.required'=>'商品名称必填!',
            'goods_name.unique'=>'商品名称已存在!',
            'goods_name.max'=>'商品名称最大长度不超过50位!',
            'goods_score.required'=>'商品库存必填!',
            'goods_price.required'=>'商品价格必填!',
        ]);

        
        $post=$request->except('_token');
        // dd($post);

         //文件上传
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }

        //多文件上传
        if($request->hasFile('imgs')){
            $imgs=$this->Moreupload('imgs');
            $post['imgs']=implode('|',$imgs);
        }

        $res=Goods::where('goods_id',$id)->update($post);
        if( $res!==false ){
            return redirect('/goods/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Goods::destroy($id);
        if( $res ){
            return redirect('/goods/index');
        }
    }
}
