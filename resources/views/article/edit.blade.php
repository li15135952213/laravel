<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章管理表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章管理表<a style="float:right" href="{{url('/article/index')}}" class="btn btn-default">列表</a></h2></center><hr/>


<form action="{{url('/article/update/'.$res->id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="title" value="{{$res->title}}" placeholder="请输入文章标题">

			<b style="color:red">{{$errors->first('title')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<select name="brand_id">
				@foreach($res1 as $v)
				<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-8">
			<input type="radio" name="important" value="普通" checked>普通
			<input type="radio" name="important" value="置顶">置顶
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
			<input type="radio" name="shows" value="1" {{$res->shows==1?"checked":""}}>显示
			<input type="radio" name="shows" value="2" {{$res->shows==1?"checked":""}}>不显示
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="write"  value="{{$res->write}}" placeholder="请输入文章作者">
			<b style="color:red">{{$errors->first('write')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者email</label>
		<div class="col-sm-8">
			<input type="email" class="form-control" id="firstname" name="email"  value="{{$res->email}}" placeholder="请输入作者email">
			<b style="color:red">{{$errors->first('email')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="name"  value="{{$res->name}}" placeholder="请输入关键字">
			<b style="color:red">{{$errors->first('name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-8">
			<textarea  class="form-control" id="品牌描述firstname" name="content"  placeholder="请输入网页描述">{{$res->content}}</textarea>
			<b style="color:red">{{$errors->first('content')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		@if($res->img)<img src="{{env('UPLOADS_URL')}}{{$res->img}}" width="30" height="30">@endif
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="img" placeholder="请输入品牌LOGD">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>