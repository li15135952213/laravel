<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>售楼管理列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>售楼管理列表<a style="float:right" href="{{url('/house/create')}}" class="btn btn-default">添加</a></h2></center><hr/>
<div class="table-responsive">
	<table class="table">
	
		<thead>
			<tr>
				<th>id</th>
				<th>小区名称</th>
				<th>导购人</th>
				<th>导购联系方式</th>
				<th>房屋面积</th>
				<th>房屋图片</th>
				<th>房屋相册</th>
				<th>售价</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($res as $v)
		<tbody>
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->man}}</td>
				<td>{{$v->tel}}</td>
				<td>{{$v->area}}</td>
				<td>@if($v->img)<img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="30" height="30">@endif</td>
				<td>
					@if($v->imgs)
					@php $imgs=explode('|',$v->imgs); @endphp
					@foreach($imgs as $vv)
					<img src="{{env('UPLOADS_URL')}}{{$vv}}" width="30" height="30">
					@endforeach
					@endif
				</td>
				<td>{{$v->price}}</td>
				<td><a href="{{url('/house/edit/'.$v->id)}}" class="btn btn-primary">编辑</a>|
					<a href="{{url('/house/destroy/'.$v->id)}}" class="btn btn-danger">删除</a>
				</td>
			</tr>
		@endforeach

		
		</tbody>
</table>
</div>  	

</body>
</html>