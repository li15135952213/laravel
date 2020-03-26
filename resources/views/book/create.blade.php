<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>图书管理添加<a style="float:right" href="{{url('/book/index')}}" class="btn btn-default">列表</a></h2></center><hr/>
<form action="{{url('/book/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">书名</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="" name="name" placeholder="请输入书名">
			<b style="color:red">{{$errors->first('name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="" name="write" placeholder="请输入作者">
			<b style="color:red">{{$errors->first('write')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">售价</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="" name="price" placeholder="请输入售价">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书封面</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="" name="img">
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