<?php 
	//公共函数文件

	//文件上传
    function upload($img){
        if(request()->file($img)->isValid()){
            $file=request()->$img;
            $store_result=$file->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

    //上传多张图片
    function Moreupload($img){
        //接受文件
        $file=request()->$img;
        foreach($file as $k=>$v){
            //判断上传过程中有无错误
            if($v->isValid()){
                $store_result[$k]=$v->store('uploads');
            }else{
                $store_result[$k]='未获取到上传文件或上传过程出错';
            }
        }
        return $store_result;
    }

    function CreateTree($data,$pid=0,$lavel=1){
        static $res=[];
        foreach($data as $v){
            if($v->pid==$pid){
                $lavel=$v->lavel;
                $res[]=$v;
        CreateTree($data,$v->cate_id,$lavel+1);           
            }
        }
        return $res;
    }
 ?>