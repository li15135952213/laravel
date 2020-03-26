<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文章管理列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章管理列表<a style="float:right" href="{{url('/article/create')}}" class="btn btn-default">添加</a></h2></center><hr/>
<div class="table-responsive">
	<form action="">
		<input type="text" name="title" placeholder="请输入关键字" value="{{$query['title']??''}}">
		
		<button>搜索</button>
	</form>
	<table class="table">
	
		<thead>
			<tr>
				<th>品牌id</th>
				<th>文章标题</th>
				<th>文章分类</th>
				<th>文章重要性</th>
				<th>是否显示</th>
				<th>文章作者</th>
				<th>作者email</th>
				<th>关键字</th>
				<th>网页描述</th>
				<th>上传文件</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($res as $v)
		<tbody>
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->title}}</td>
				<td>{{$v->brand_name}}</td>
				<td>{{$v->important}}</td>
				<td>{{$v->shows==1?"√":"×"}}</td>
				<td>{{$v->write}}</td>
				<td>{{$v->email}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->content}}</td>
				<td>@if($v->img)<img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="30" height="30">@endif</td>
				<td><a href="{{url('/article/edit/'.$v->id)}}" class="btn btn-primary">编辑</a>|
					<a href="{{url('/article/destroy/'.$v->id)}}" class="btn btn-danger">删除</a>
				</td>
			</tr>
		@endforeach

		<tr><td colspan="6">{{$res->appends($query)->links()}}</td></tr>
		</tbody>
</table>
</div>  	

</body>
</html>