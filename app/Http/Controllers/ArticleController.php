<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Brand;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title=request()->title;
        $where=[];
        if($title){
            $where[]=['title','like',"%$title%"];
        }
        $pageSize=config("app.pageSize");
        $res=Article::select('article.*','brand.brand_name')
                    ->leftjoin('brand','article.brand_id','=','brand.brand_id')
                    ->where($where)
                    ->paginate($pageSize);

       
        
        // dd($res);
        $query=request()->all();
        return view('article.index',['res'=>$res,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res=Brand::all();
        return view('article.create',['res'=>$res]);
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
            'title' => 'required|unique:article|max:20',
            'write' => 'required',
            'email' => 'required',
            'name' => 'required',
            'content' => 'required',
        ],[
            'title.required'=>'标题不能为空!',
            'title.unique'=>'标题已存在!',
            'title.max'=>'品牌名称最大长度不超过20位!',
            'write.required'=>'文章作者不能为空!',
            'email.required'=>'作者email不能为空!',
            'name.required'=>'关键字不能为空!',
            'content.required'=>'网页描述不能为空!',
        ]);

        $post=$request->except('_token');
        //文件上传
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }
        $res=Article::insert($post);
        // dd($res);
        if($res){
            return redirect('/article/index');
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
        $res1=Brand::all();
        $res=Article::where('id',$id)->first();
        return view('article.edit',['res'=>$res,'res1'=>$res1]);
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
        // 第一种验证
        $validatedData = $request->validate([ 
            'title' => 'required|unique:article|max:20',
            'write' => 'required',
            'email' => 'required',
            'name' => 'required',
            'content' => 'required',
        ],[
            'title.required'=>'标题不能为空!',
            'title.unique'=>'标题已存在!',
            'title.max'=>'品牌名称最大长度不超过20位!',
            'write.required'=>'文章作者不能为空!',
            'email.required'=>'作者email不能为空!',
            'name.required'=>'关键字不能为空!',
            'content.required'=>'网页描述不能为空!',
        ]);


        $post=$request->except('_token');
        //文件上传
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }
        $res=Article::where('id',$id)->update($post);
        // dd($res);
        if( $res!==false ){
            return redirect('/article/index');
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
        $res=Article::destroy($id);
        if( $res ){
            return redirect('/article/index');
        }
    }
}
