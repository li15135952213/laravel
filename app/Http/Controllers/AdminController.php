<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admin=Admin::all();
        // dd($admin);
        return view('admin.index',['admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 第一种验证
       $validatedData = $request->validate([ 
            'name' => 'required|unique:admin|max:16|min:2',
            'pwd' => 'required|min:6|numeric',
            'email' => 'required',
            'tel' => 'required|numeric',
        ],[
            'name.required'=>'管理员名字必填!',
            'name.unique'=>'管理员名字已存在!',
            'name.max'=>'管理员名字2-16位组成',
            'name.min'=>'管理员名字2-16位组成',
            'pwd.required'=>'密码必填!',
            'pwd.numeric'=>'密码必须是数字',
            'pwd.min'=>'密码至少6位',
           'email.required'=>'邮箱必填!',
           'tel.required'=>'电话必填!',
           'tel.numeric'=>'电话必须是数字',
        ]);
         $post=$request->except('_token');
       // 文件上传
       if($request->hasFile('img')){
            $post['img']=$this->upload('img');

       }

       $res=Admin::insert($post);
        if($res){
        return redirect('/admin/index');
       }
    }
     // 文件上传
    public function upload($img){
        // 判断上传过程中有无错误
        if(request()->file($img)->isValid()){
            // 接收文件
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
        $admin=Admin::where('id',$id)->first();
        return view('admin.edit',['admin'=>$admin]);
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

       $post=$request->except(['_token']);
       // 文件上传
       if($request->hasFile('img')){
            $post['img']=$this->upload('img');

       }
        $res=Admin::where('id',$id)->update($post);
       // dd($res);
       if($res!==false){
        return redirect('/admin/index');
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
       // ORM
        $res=Admin::destroy($id);


        // dd($res);
        if($res){
        return redirect('/admin/index');
       }
    }
}
