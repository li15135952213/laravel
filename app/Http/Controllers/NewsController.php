<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config('app.pageSize');
        $news=news::select('news.*','category.cate_name')
                    ->leftjoin('category','news.cate_id','=','category.cate_id')
                    ->paginate($pageSize);
       return view('news.index',['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $category=Category::all();
        // dd($brand);
        // 无限极分类
        $category=CreateTree($category);
        // dd($category);
        return view('news.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         //验证
       $validatedData = $request->validate([ 
            'title' => 'required|unique:news|max:30|min:2',
            'author' => 'required',
            'cate_id' => 'required',
          
        ],[
            'title.required'=>'标题必填!',
            'title.unique'=>'标题已存在!',
            'title.max'=>'标题2-30位之间',
            'title.min'=>'标题2-30位之间',
            'author.required'=>'作者必填!',
            'cate_id.required'=>'分类必填!',
        ]);

      $post=$request->except('_token');
      //添加时间
        $post['time']=time();
        // dd($post);
      $res=News::insert($post);
       // dd($res);die;
      if($res){
        return redirect('/news/index');
       }
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
