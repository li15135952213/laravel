<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻表添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>新闻表添加</h2></center><hr/>
<form action="{{url('/xin/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="name" placeholder="请输入新闻名称">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻图片</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="img" placeholder="请输入新闻图片">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻内容</label>
		<div class="col-sm-8">
			<textarea name="content" id="" cols="30" rows="10" placeholder="请输入新闻内容"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>