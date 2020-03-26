<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Xin;


class XinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //删除
        // Redis::del('index');
        // Redis::flushall('index');

        $page=request()->page??1;
        // echo $page;
        $name=request()->name??'';

        //缓存
        $res=Redis::get('index_'.$page.'_'.$name);//￥res必须和下面数据库$res保持一致
        // dd($res);
        if(!$res){
            echo "DB.....";

            
            $where=[];
            if($name){
                $where[]=['name','like',"%$name%"];
            }
            $pageSize=config("app.pageSize");
            $res=Xin::where($where)->paginate($pageSize);
            


        //     //报错  序列化
            $res=serialize($res);
        //     //存缓存
            Redis::setex('index_'.$page.'_'.$name,5*60,$res);

        }
        //反序列化  字符串转化为结果集
        $res=unserialize($res);


        
        // dd($res);
        return view('xin.index',['res'=>$res,'name'=>$name]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('xin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except('_token');
        //文件上传
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }

        $res=Xin::insert($post);
        if($res){
            return redirect('/xin/index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
