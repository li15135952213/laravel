<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>品牌列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品品牌列表<a style="float:right" href="{{url('/goods/create')}}" class="btn btn-default">添加</a></h2></center><hr/>
<div class="table-responsive">
	<table class="table">
	
		<thead>
			<tr>
				<th>商品id</th>
				<th>商品货号</th>
				<th>商品分类</th>
				<th>商品价格</th>
				<th>商品库存</th>
				<th>是否显示</th>
				<th>是否新品</th>
				<th>是否精品</th>
				<th>商品图片</th>
				<th>商品相册</th>
				<th>商品详情</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($res as $v)
		<tbody>
			<tr>
				<td>{{$v->goods_id}}</td>
				<td>{{$v->goods_name}}</td>
				<td>{{$v->cate_id}}</td>
				<td>{{$v->goods_price}}</td>
				<td>{{$v->goods_score}}</td>
				<td>{{$v->is_up}}</td>
				<td>{{$v->is_new}}</td>
				<td>{{$v->is_best}}</td>
				<td>@if($v->img)<img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="30" height="30">@endif</td>
				<td>
					@if($v->imgs)
					@php $imgs=explode('|',$v->imgs); @endphp
					@foreach($imgs as $vv)
					<img src="{{env('UPLOADS_URL')}}{{$vv}}" width="30" height="30">
					@endforeach
					@endif
				</td>
				<td>{{$v->goods_desc}}</td>
				<td>
					<a href="{{url('/goods/'.$v->goods_id)}}" class="btn btn-primary">预览</a>|
					<a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-primary">编辑</a>|
					<a href="{{url('/goods/destroy/'.$v->goods_id)}}" class="btn btn-danger">删除</a>
				</td>
			</tr>
		@endforeach

		
		</tbody>
</table>
</div>  	

</body>
</html>