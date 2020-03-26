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
<center><h2>新闻列表<a style="float:right" href="{{url('/news/create')}}" class="btn btn-default">添加</a></h2></center><hr/>
<div class="table-responsive">
	<table class="table">
	
		<thead>
			<tr>
				<th>id</th>
				<th>新闻标题</th>
				<th>新闻分类</th>
				<th>新闻作者</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($news as $v)
		<tbody>
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->title}}</td>
				<td>{{$v->cate_name}}</td>
				<td>{{$v->author}}</td>
				<td>{{date("Y-m-d H:i:s",$v->time)}}</td>
				<td>
					<a href="" class="btn btn-primary">编辑</a>|
					<a href="" class="btn btn-danger">删除</a>
				</td>
			</tr>
		@endforeach
		<tr><td colspan="6">{{$news->links()}}</td></tr>
		</tbody>
</table>
</div>  	

</body>
</html>