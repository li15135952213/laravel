<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>后台登录</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>后台登录</h2></center><hr/>
@if(session('msg'))
 <div class="alert alert-danger">{{session('msg')}}</div>
 @endif

<form action="{{url('/logindo')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户名</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="name" placeholder="请输入用户名">
			<!-- <b style="color:red">{{$errors->first('name')}}</b> -->
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" id="firstname" name="pwd" placeholder="请输入密码">
			<b style="color:red">{{$errors->first('pwd')}}</b>
			
		</div>
	</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
		</div>
	</div>
</form>

</body>
</html>
