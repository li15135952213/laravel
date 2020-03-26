<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>品牌列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品品牌列表<a style="float:right" href="{{url('/brand/create')}}" class="btn btn-default">添加</a></h2></center><hr/>
<div class="table-responsive">
	<form action="">
		<input type="text" name="name" placeholder="请输入品牌关键字" value="{{$query['name']??''}}">
		<input type="text" name="url" placeholder="请输入网址关键字" value="{{$query['url']??''}}">
		<button>搜索</button>
	</form>
	<table class="table">
	
		<thead>
			<tr>
				<th>品牌id</th>
				<th>品牌名称</th>
				<th>品牌网址</th>
				<th>品牌LOGO</th>
				<th>品牌描述</th>
				<th>操作</th>
			</tr>
		</thead>
		@foreach($brand as $v)
		<tbody>
			<tr>
				<td>{{$v->brand_id}}</td>
				<td>{{$v->brand_name}}</td>
				<td>{{$v->brand_url}}</td>
				<td>@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" width="30" height="30">@endif</td>
				<td>{{$v->brand_desc}}</td>
				<td><a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-primary">编辑</a>|
					<a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
				</td>
			</tr>
		@endforeach

		<tr><td colspan="6">{{$brand->appends($query)->links()}}</td></tr>
		</tbody>
</table>
</div>  	

</body>
</html>