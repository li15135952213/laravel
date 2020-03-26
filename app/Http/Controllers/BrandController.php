<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name=request()->name;
        $where=[];
        if($name){
            $where[]=['brand_name','like',"%$name%"];
        }
        $url=request()->url;
        if($url){
            $where[]=['brand_url','like',"%$url%"];
        }
        $pageSize=config("app.pageSize");
        //DB操作
        // $brand=DB::table('brand')->get();

        //ORM操作
        // $brand =Brand::all();
        $brand =Brand::where($where)->orderby('brand_id','desc')->paginate($pageSize);

        $query=request()->all();
        return view('brand.index',['brand'=>$brand,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加界面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//第一种验证
    // public function store(StoreBrandPost $request)//第二种验证
    {

        //第一种验证
        // $validatedData = $request->validate([ 
        //     'brand_name' => 'required|unique:brand|max:20',
        //     'brand_url' => 'required',
        // ],[
        //     'brand_name.required'=>'品牌名称必填!',
        //     'brand_name.unique'=>'品牌名称已存在!',
        //     'brand_name.max'=>'品牌名称最大长度不超过20位!',
        //     'brand_url.required'=>'品牌网址必填!',
        // ]);


         $post=$request->except('_token');
        // dd($post);

         //第三种验证
         $validator = Validator::make($post, [ 
            'brand_name' => 'required|unique:brand|max:20',
            'brand_url' => 'required',
         ],[
            'brand_name.required'=>'品牌名称必填!',
            'brand_name.unique'=>'品牌名称已存在!',
            'brand_name.max'=>'品牌名称最大长度不超过20位!',
            'brand_url.required'=>'品牌网址必填!',
        ]);
         if ($validator->fails()) { 
            return redirect('brand/create') 
                ->withErrors($validator) 
                ->withInput(); 
        }

         //文件上传
         if ($request->hasFile('brand_logo')) { 
             $post['brand_logo']=upload('brand_logo');
             // dd($img);
         }


        //DB操作
        // $res=DB::table('brand')->insert($post);
        // dd($res);


        //ORM操作  添加  第一种
        // $brand=new Brand;
        // $brand->brand_name=$request->brand_name;
        // $brand->brand_url=$request->brand_url;
        // $brand->brand_logo=$request->brand_logo;
        // $brand->brand_desc=$request->brand_desc;
        // $res=$brand->save();
        

        //ORM操作  添加  第二种
        // $res=Brand::create($post);
        // dd($res);


         //ORM操作  添加  第二种
         $res=Brand::insert($post);


        if($res){
            return redirect('/brand/index');
        }
    }

   

    /**
     * Display the specified resource.
     *详情页展示（预览）
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *展示编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //DB操作
        //根据id获取单条记录
        // $brand=DB::table('brand')->where('brand_id',$id)->first();
        // dd($brand);


        //ORM操作
        // $brand=Brand::find($id);
        $brand=Brand::where('brand_id',$id)->first();


        return view('brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //DB操作
        //排除接受谁
         $post=$request->except(['_token']);
          //文件上传
         if ($request->hasFile('brand_logo')) { 
             $post['brand_logo']=$this->upload('brand_logo');
             // dd($img);
         }
        //只接受谁
        // $post=$request->only(['_token','brand_logo']);

        // dd($post);
        // $res=DB::table('brand')->where('brand_id',$id)->update($post);
        // dd($res);


        //ORM操作 第一种save更新
        // $brand= Brand::find($id);
        // $brand->brand_name=$request->brand_name;
        // $brand->brand_url=$request->brand_url;
        // $brand->brand_logo=$request->brand_logo;
        // $brand->brand_desc=$request->brand_desc;
        // $res=$brand->save();

        $res=Brand::where('brand_id',$id)->update($post);
        if( $res!==false ){
            return redirect('/brand/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $res=DB::table('brand')->where('brand_id',$id)->delete();


        //ORM操作
        $res=Brand::destroy($id);
        if( $res ){
            return redirect('/brand/index');
        }
    }
}
