<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>学生表添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>学生表添加</h2></center><hr/>
<form action="{{url('/student/store')}}" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生姓名</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="name" placeholder="请输入学生姓名">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生性别</label>
		<div class="col-sm-8">
			<input type="radio" name="sex" value="男" checked>男
			<input type="radio" name="sex" value="女">女
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生班级</label>
		<div class="col-sm-8">
			<select name='class'>
				<option>--请选择--</option>
				<option>1909php</option>
				<option>1910php</option>
				<option>1908php</option>
			</select>
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