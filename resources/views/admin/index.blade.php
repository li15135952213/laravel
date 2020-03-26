

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理员列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>管理员列表<a style="float:right" href="{{url('/admin/create')}}" class="btn btn-default">添加</a></h2></center><hr/>
<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>管理员名字</th>
				<th>管理员密码</th>
				<th>管理员邮箱</th>
				<th>管理员电话</th>
				<th>管理员头像</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($admin as $v) 
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->pwd}}</td>
				<td>{{$v->email}}</td>
				<td>{{$v->tel}}</td>
				<td>@if($v->img)<img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="30" height="30">@endif</td>
				<td>
					<a href="{{url('/admin/edit/'.$v->id)}}" class="btn btn-primary">编辑</a>|
					<a href="{{url('/admin/destroy/'.$v->id)}}" class="btn btn-danger">删除</a>
				</td>
			</tr>
			@endforeach
			
		</tbody>
</table>