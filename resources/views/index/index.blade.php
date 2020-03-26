@extends('layouts.shop')
@section('title', '首页')
@section('content')

<div class="head-top">
      <img src="/static/index/images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/static/index/images/touxiang.jpg" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>
         <li><a href="prolist.html"><strong>34</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="{{url('/log')}}">登录</a></li>
      <li><a href="{{url('/reg')}}" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <ul>
     <div id="sliderA" class="slider">
        @if($goods)
        @foreach($goods as $v)
          <a href="{{url('/goods/'.$v->goods_id)}}"><img src="{{env('UPLOADS_URL')}}{{$v->img}}" /></a>
        @endforeach
        @endif
     </div><!--sliderA/-->
   </ul>
     <div id="sliderA" class="slider">
        @foreach($new_res as $k=>$v)
      <img src="{{env('UPLOADS_URL')}}{{$v->img}}" />
        @endforeach
     </div><!--sliderA/-->
     <ul class="pronav">
      @foreach($pid_res as $k=>$v)
      <li><a href="#">{{$v->cate_name}}</a></li>
      @endforeach
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
      @foreach($up_res as $k=>$v)
      <div class="index-pro1-list">
       <dl>
        <dt><a href="proinfo.html"><img src="{{env('UPLOADS_URL')}}{{$v->img}}" /></a></dt>
        <dd class="ip-text"><a href="proinfo.html">{{$v->goods_name}}</a></dd>
        <dd class="ip-price"><strong>¥{{$v->goods_price}}</strong></dd>
       </dl>
      </div>
      @endforeach
      
      <div class="clearfix"></div>
     </div><!--index-pro1/-->


     <div class="prolist">
       @foreach($best_res as $k=>$v)
      <dl>
       <dt><a href="proinfo.html"><img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo.html">{{$v->goods_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->goods_price}}</strong></div>
       </dd>
      
       <div class="clearfix"></div>
      </dl>
      @endforeach
     </div><!--prolist/-->
     <div class="joins"><a href="fenxiao.html"><img src="/static/index/images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>
     @include('index.public.footer')

     @endsection