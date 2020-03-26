<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>学生列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>学生列表</h2></center><hr/>
<div class="table-responsive">
	<table class="table">
	
		<thead>
			<tr>
				<th>id</th>
				<th>学生姓名</th>
				<th>学生性别</th>
				<th>班级</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($res as $v)
		<tbody>
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->sex}}</td>
				<td>{{$v->class}}</td>
				<td><button type="button" class="btn btn-primary">编辑</button>|<button type="button" class="btn btn-danger">删除</button></td>
			</tr>
		@endforeach
		</tbody>
</table>
</div>  	

</body>
</html>