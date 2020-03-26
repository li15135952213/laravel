<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/goods', function () {
//     // return view('welcome');
//     echo '哈哈哈';
// });
// Route::get('/index', 'IndexController@index');//需要indexc 访问时用index
// Route::get('/good', 'IndexController@good');//需要用indexc  访问时用good  控制器  方法

// // Route::get('/add', function () {
// //     echo '<form action="/adddo" method="post">'.csrf_field().'<input type="text" name="name"><button>提交</button></form>';
// // });
// // Route::post('/adddo',function(){
// // 	echo request()->name;
// // });

// Route::get('/add', 'IndexController@add');
// Route::post('/adddo', 'IndexController@adddo');


// //一个路由支持多个请求方式
// // Route::match(['get','post'],'/add','IndexController@add');
// // Route::any('/add','IndexController@add');

// //路由视图
// // Route::view('/add','add');//请求地址  模板
// // Route::get('/add','IndexController@add');


// //必填参数
// // Route::get('/show/{id}/{name}',function($id,$name){
// // 	echo $id."==".$name;
// // });


// Route::get('/show/{id}/{name}','IndexController@show');

//可选参数路由
// Route::get('/news/{id?}','IndexController@news');

// Route::get('/news/{id}/{name?}',function($id,$name=null){
// 	echo $id."==".$name;
// });


//正则约束
// Route::get('/ze/{id?}','IndexController@ze')->where('id','[0-9]+');//传过去$id=null
// Route::get('/ze/{id?}','IndexController@ze')->where('id','\d+');

// Route::get('/ze/{id}/{name}','IndexController@ze')->where('id','\d+');//还没写完


//品牌模块的CURD
Route::prefix('brand')->middleware('islogin')->group(function(){
	Route::get('create','BrandController@create');
	Route::post('store','BrandController@store');
	Route::get('index','BrandController@index');
	Route::get('edit/{id}','BrandController@edit');
	Route::get('update/{id}','BrandController@update');
	Route::get('destroy/{id}','BrandController@destroy');
});


//分类模块
Route::get('/category/create','CategoryController@create');
Route::post('/category/store','CategoryController@store');
Route::get('/category/index','CategoryController@index');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/category/update/{id}','CategoryController@update');
Route::get('/category/destroy/{id}','CategoryController@destroy');


//商品管理
Route::prefix('goods')->group(function(){
	Route::get('create','GoodsController@create');
	Route::post('store','GoodsController@store');
	Route::get('index','GoodsController@index');
	Route::get('edit/{id}','GoodsController@edit');
	Route::post('update/{id}','GoodsController@update');
	Route::get('destroy/{id}','GoodsController@destroy');
});


// 后台的管理员管理模块
Route::prefix('admin')->group(function(){
	Route::get('create','AdminController@create');
	Route::post('store','AdminController@store');
	Route::get('index','AdminController@index');
	Route::get('edit/{id}','AdminController@edit');
	Route::post('update/{id}','AdminController@update');
	Route::get('destroy/{id}','AdminController@destroy');
});


//登录
Route::get('login','LoginController@login');
Route::post('logindo','LoginController@logindo');



//学生表
Route::get('/student/create','StudentController@create');
Route::post('/student/store','StudentController@store');
Route::get('/student/index','StudentController@index');


//售楼管理功能
Route::get('/house/create','HouseController@create');
Route::post('/house/store','HouseController@store');
Route::get('/house/index','HouseController@index');

//图书管理表
Route::prefix('book')->group(function(){
	Route::get('create','BookController@create');
	Route::post('store','BookController@store');
	Route::get('index','BookController@index');
});

//新闻表
Route::prefix('news')->group(function(){
	Route::get('create','NewsController@create');
	Route::post('store','NewsController@store');
	Route::get('index','NewsController@index');
});

//新闻表
Route::prefix('xin')->group(function(){
	Route::get('create','XinController@create');
	Route::post('store','XinController@store');
	Route::get('index','XinController@index');
});

// 文章管理功能
Route::prefix('article')->group(function(){
	Route::get('create','ArticleController@create');
	Route::post('store','ArticleController@store');
	Route::get('index','ArticleController@index');
	Route::get('edit/{id}','ArticleController@edit');
	Route::post('update/{id}','ArticleController@update');
	Route::get('destroy/{id}','ArticleController@destroy');
});



Route::get('/','Index\IndexController@index')->name('index');
Route::get('/log','Index\LoginController@log');
Route::get('/reg','Index\LoginController@reg');
Route::get('/reg/sendSMS','Index\LoginController@sendSMS');
Route::post('/login/logindo','Index\LoginController@logindo');
Route::any('/reg/regdo','Index\LoginController@regdo');
Route::get('/reg/sendEmail','Index\LoginController@sendEmail');

//商品详情  前台
Route::get('/goods/{id}','Index\GoodsController@index')->name('goods');
Route::post('/addcart','Index\GoodsController@addcart');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pay', 'Index\CartController@pay');

