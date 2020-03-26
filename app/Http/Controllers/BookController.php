<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=request()->name;
        $where=[];
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        $pageSize=config("app.pageSize");
        $res=Book::where($where)->paginate($pageSize);
        
         $query=request()->all();
        return view('book.index',['res'=>$res,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
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
            'name' => 'required|unique:brand|max:15',
            'write' => 'required',
        ],[
            'name.required'=>'书名必填!',
            'name.unique'=>'书名已存在!',
            'name.max'=>'书名最大长度不超过15位!',
            'write.required'=>'作者必填!',
        ]);

        $post=$request->except('_token');
        // dd($post);

        //文件上传
         if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }

        $res=Book::insert($post);
        // dd($res);

        if($res){
            return redirect('/book/index');
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
