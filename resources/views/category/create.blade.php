<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>分类添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>分类添加添加<a style="float:right" href="{{url('/category/index')}}" class="btn btn-default">列表</a></h2></center><hr/>
<form action="{{url('/category/store')}}" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="cate_name" placeholder="请输入品牌名称">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">父级分类</label>
		<div class="col-sm-8">
			<select name="pid" id="">
				<option>--请选择--</option>
				<option value="1">女装</option>
				<option value="2">男装</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类描述</label>
		<div class="col-sm-8">
			<textarea name="cate_desc" id="" cols="30" rows="10" placeholder="请输入分类描述"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否在导航显示</label>
		<div class="col-sm-8">
			<input type="radio" name="cate_nav" value="是" checked>是
			<input type="radio" name="cate_nav" value="否">否
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