<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>新闻表添加</h2></center><hr/>
<form action="{{url('/news/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="title" placeholder="请输入新闻标题">
			<b style="color:red">{{$errors->first('title')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻分类</label>
		<div class="col-sm-8">
			<select name="cate_id" id="">
				<option value="0">--请选择--</option>
				@foreach($category as $v)
				<option value="{{$v->cate_id}}">{{str_repeat('|-',$v->level)}}{{$v->cate_name}}</option>
				@endforeach
			</select>
			<b style="color:red">{{$errors->first('cate_id')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="author" placeholder="请输入新闻作者">
			<b style="color:red">{{$errors->first('author')}}</b>
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
