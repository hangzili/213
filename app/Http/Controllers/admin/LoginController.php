<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\LoginModel;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;
use Mail;
class LoginController extends Controller
{
    //注册页面
    public function index()
    {
        return view('/admin/login/index');
    }
    //注册执行页面
    public function login_do(Request $request)
    {
        $all = $request->all();
        // $emails = $all['emails'];
        // $red = Redis::get($emails);
        // if($red==""){
        //     echo 1;exit;//返回邮箱验证码过期
        // }
        //u_name名字重复
        $list = LoginModel::where('u_name',$all['u_name'])->first();
        if(!empty($list)){
            echo 1;exit;//返回名字重复
        }

        $all['add_time'] = time();
        // var_dump($all);
        $add = LoginModel::create($all);
        echo 2;

    }
    
    //发送邮件
    public  function  sendMail(Request $request)  
    {  
        $u_email = $request->all('u_email');
        $u_name = $request->all('u_name');
        $name = $u_name['u_name'];
        $u_email = $u_email['u_email'];
        
        //获取邮箱标题
        $title = "10086";
        // 获取邮箱内容
        $id = uniqid();
        $content = "欢迎注册，验证码1分钟后失效，动作麻溜点。验证码为".$id;
        // Redis::setex($id,600,'123');
        $toMail = $u_email;
 
        Mail::raw($content, function ($message) use ($toMail, $title) {
            $message->subject($title);
            $message->to($toMail);
        });
    }  
    //登陆页面
    public function landing()
    {
        return view('/admin/login/landing');
    }
    //登陆执行页面
    public function landing_do(Request $request)
    {
        $all = $request->all();
        $na = LoginModel::where('u_name',$all['u_name'])->first();
        if(empty($na)){
            echo 1;exit;//用户的用户名不对
        }
        $nb = LoginModel::where('u_pwd',$all['u_pwd'])->first();
        if(empty($nb)){
            echo 2;exit;//用户的密码不对
        }
        // echo 3;
        // $rediss = redis::set("adminuser",$all['u_name']);
        Cookie::queue('adminuser', $all['u_name']);
        echo 3;
        // header("Location:http://www.213.com/admin/firstbar/add");
        // $rediss = redis::get('123');
        // var_dumP($rediss);
    }
    //退出登陆
    public function exit()
    {
        // Redis::del("adminuser");
        setCookie("adminuser","",time()-60);
        header("Location:http://www.213.com/admin/login/landing");
    }
}
