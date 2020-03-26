<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>管理员添加</h2></center><hr/>
<form action="{{url('/admin/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名字</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="name" placeholder="请输入管理员名字">
			<b style="color:red">{{$errors->first('name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员密码</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" id="firstname" name="pwd" placeholder="请输入密码">
			<b style="color:red">{{$errors->first('pwd')}}</b>
			
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员邮箱</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="email" placeholder="请输入管理员邮箱">
			<b style="color:red">{{$errors->first('email')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员电话</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="tel" placeholder="请输入管理员电话">
			<b style="color:red">{{$errors->first('tel')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员头像</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="img" >
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
