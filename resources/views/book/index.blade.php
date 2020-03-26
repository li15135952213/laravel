<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>图书管理列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>图书管理列表<a style="float:right" href="{{url('/book/create')}}" class="btn btn-default">添加</a></h2></center><hr/>
<div class="table-responsive">
	<form action="">
		<input type="text" name="name" placeholder="请输入书名" value="{{$query['name']??''}}">
		
		<button>搜索</button>
	</form>

	<table class="table">
	
		<thead>
			<tr>
				<th>id</th>
				<th>书名</th>
				<th>作者</th>
				<th>售价</th>
				<th>图书封面</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($res as $v)
		<tbody>
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->write}}</td>
				<td>{{$v->price}}</td>
				<td>@if($v->img)<img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="30" height="30">@endif</td>
				<td><a href="{{url('/book/edit/'.$v->id)}}" class="btn btn-primary">编辑</a>|
					<a href="{{url('/book/destroy/'.$v->id)}}" class="btn btn-danger">删除</a>
				</td>
			</tr>
		@endforeach
		<tr><td colspan="6">{{$res->appends($query)->links()}}</td></tr>
		
		</tbody>
</table>
</div>  	

</body>
</html>