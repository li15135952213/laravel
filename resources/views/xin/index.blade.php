<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>新闻列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>新闻列表</h2></center><hr/>
<div class="table-responsive">
<form>
	新闻名称<input type="text" name="name" placeholder="请输入品牌关键字" value="{{$query['name']??''}}">
	<button>搜索</button>
</form>

	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>新闻名称</th>
				<th>新闻图片</th>
				<th>新闻内容</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($res as $v)
		<tbody>
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>@if($v->img)<img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="30" height="30">@endif</td>
				<td>{{$v->content}}</td>
				<td><button type="button" class="btn btn-primary">编辑</button>|<button type="button" class="btn btn-danger">删除</button></td>
			</tr>
		@endforeach
		<tr><td colspan="6">{{$res->appends(['name'=>$name])->links()}}</td></tr>
		</tbody>
</table>
</div>  	

</body>
</html>