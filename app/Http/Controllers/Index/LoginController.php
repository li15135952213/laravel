<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\Admin;
use App\Goods;
use App\Dl as User;
//邮箱
use App\mail\SendCode;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function log(){
    	return view('index.login');
    }

     //注册手机号
    public function regdo(){
        $arr = request()->except("_token");
        $nameInfo = session('nameInfo');
        // dd($nameInfo);
        //判断账号是否为空是否存在
        if(empty($arr["user_name"])){
            return redirect("/reg")->with("msg","账号不能为空");
        }
       
        //验证验证码是否为空
        if(empty($arr["user_code"])){
            return redirect("/reg")->with("msg","验证码不能为空");
        }
        //验证密码
        $ags = "/^\w{6,18}$/";
        if(empty($arr["user_pwd"])){
            return redirect("/reg")->with("msg","密码不能为空");
        }else if(!preg_match($ags,$arr["user_pwd"])){
            return redirect("/reg")->with("msg","密码必须由6-18位以上数字，字母，下划线组成");
        }
        if($arr["user_pwd"]!=$arr["user_pwds"]){
            return redirect("/reg")->with("msg","密码跟确认密码不一致");
        }
        $arr["user_pwd"] = encrypt($arr["user_pwd"]);
        $arr["user_pwds"] = encrypt($arr["user_pwds"]);
        //成功
        $arr["user_time"] = time();
        $res = User::create($arr);
        if($res){
            return redirect("/log");
        }
        

    }
    public function logindo(){
        $post=request()->all();
        // dd($post);
        $user=User::where('user_name',$post['user_name'])->first();
        if(decrypt($user->user_pwd)!=$post['user_pwd']){
            return redirect('/login')->with('msg','用户名或者密码错误');
        }
        session(['user'=>$user]);
        if($post['refer']){
             return redirect($post['refer']);
        }
        return redirect('/');
    	// $name=request()->name;
     // 	$pwd=request()->pwd;
     // 	$res=Admin::where('name',$name)->first();
     // 	// dd($name);
     // 	if($res){
     // 		if($res['pwd']==$pwd){
     // 			session(['admin'=>$name]);
     // 			return redirect('/');
     // 		}
     // 	}
   }
    public function reg(){
    	return view('index.reg');
    }

    public function sendSMS(){
    	$name= request()->name;
    	//php 验证手机号

    	$reg= '/^1[3|5|6|7|8|9]\d{9}$/';
    	if(!preg_match($reg, $name)){
    		return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或者邮箱']);
    	}

    	$code=rand(100000,999999);
    	$result=$this->send($name,$code);
    	//发送成功
    	if($result['Message']=='OK'){
    		session(['code'=>$code]);
    		return json_encode(['code'=>'00000','msg'=>'发送成功']);
    	}
    		//发送失败
    		return json_encode(['code'=>'00000','msg'=>$result['Message']]);
    }

    //发送短信验证码
    public function send($name,$code){
    	// echo $name;
    	// echo $code;


		// Download：https://github.com/aliyun/openapi-sdk-php
		// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

		AlibabaCloud::accessKeyClient('LTAI4ForFbLGooUZvmKgKFbL', 'jXHVJSMhf6jvVskRz7AWDzPaDplDyM')
		                        ->regionId('cn-hangzhou')
		                        ->asDefaultClient();

		try {
		    $result = AlibabaCloud::rpc()
		                          ->product('Dysmsapi')
		                          // ->scheme('https') // https | http
		                          ->version('2017-05-25')
		                          ->action('SendSms')
		                          ->method('POST')
		                          ->host('dysmsapi.aliyuncs.com')
		                          ->options([
		                                        'query' => [
		                                          'RegionId' => "cn-hangzhou",
		                                          'PhoneNumbers' => "$name",
		                                          'SignName' => "爱家人",
		                                          'TemplateCode' => "SMS_183242124",
		                                          'TemplateParam' => "{code:$code}",
		                                        ],
		                                    ])
		                          ->request();
		    return $result->toArray();
		} catch (ClientException $e) {
		    return $e->getErrorMessage() . PHP_EOL;
		} catch (ServerException $e) {
		    return $e->getErrorMessage() . PHP_EOL;
		}
    }

    public function sendEmail(){
        $name= request()->name;
        // dd($name);
        //php 验证手机号

        $reg= '/^[a-zA-Z0-9]{6,}@qq\.com$/';
        // dd(!preg_match($reg,$name));
        if(!preg_match($reg, $name)){
            return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或者邮箱']);
        }
       $code=rand(100000,999999);
       Mail::to($name)->send(new SendCode($code));
       
       return json_encode(['code'=>'00000','msg'=>'发送成功']);
  }
}
