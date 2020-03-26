<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品品牌添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品品牌添加<a style="float:right" href="{{url('/brand/index')}}" class="btn btn-default">列表</a></h2></center><hr/>


@if ($errors->any()) 
<div class="alert alert-danger">
 <ul>
 	@foreach ($errors->all() as $error) 
 		<li>{{ $error }}</li>
 	@endforeach
 </ul>
</div>
@endif


<form action="{{url('/brand/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_name" placeholder="请输入品牌名称">

			<b style="color:red">{{$errors->first('brand_name')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_url" placeholder="请输入品牌网址">

			<b style="color:red">{{$errors->first('brand_url')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌LOGD</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="brand_logo" placeholder="请输入品牌LOGD">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="品牌描述firstname" name="brand_desc" placeholder="请输入品牌描述"></textarea>
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