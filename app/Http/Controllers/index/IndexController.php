<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\TopimgModel;
use App\admin\FirstbarModel;
use App\admin\TwobarModel;
use App\admin\ContentModel;
use App\admin\DownimgModel;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    public function index()
    {
        //顶部图片轮播图
        $top_img = TopimgModel::get();
        //一级分类导航compact
        $firsbar_list = FirstbarModel::orderBy('order')->get();
        // $firsbar_list = FirstbarModel::orderBy('order','desc')->get();
        // 公司简介
        $intro = ContentModel::join('two_bar','two_bar.t_id','=','content.t_id')->where('two_bar.f_id','20')->get()->toArray();
        // var_dump($intro);
        //公司案例
        $case = ContentModel::join('two_bar','two_bar.t_id','=','content.t_id')->where('two_bar.f_id','21')->get()->toArray();
        //公司新闻
        $new = ContentModel::join('two_bar','two_bar.t_id','=','content.t_id')->where('two_bar.f_id','8')->get()->toArray();
        //client客户案例
        $client = ContentModel::join('two_bar','two_bar.t_id','=','content.t_id')->where('two_bar.f_id','6')->get()->toArray();
        //staff员工
        $staff = ContentModel::join('two_bar','two_bar.t_id','=','content.t_id')->where('two_bar.f_id','7')->get()->toArray();
        //底部产品轮播图
        $downimg = DownimgModel::get();
        return view("index/index/index",['top_img'=>$top_img,'downimg'=>$downimg,'intro'=>$intro,'firsbar_list'=>$firsbar_list,'staff'=>$staff,'case'=>$case,'new'=>$new,'client'=>$client]);
    }
    public function list(Request $request)
    {
        //一级分类导航compact
        $firsbar_list = FirstbarModel::orderBy('order')->get();
        $f_id = $request->all();
        $f_id = $f_id['f_id'];
        //获取二级分类
        $two_list = TwobarModel::where('f_id',$f_id)->get();
        // var_dump($two_list);
        //获取三级内容分类
        $content = ContentModel::join('two_bar','two_bar.t_id','=','content.t_id')->where('two_bar.f_id',$f_id)->get()->toArray();
        // var_dump($content);
        return view('index/index/list',['firsbar_list'=>$firsbar_list,'f_id'=>$f_id,'two_list'=>$two_list,'content'=>$content]);
    }
    //详细内容展示
    public function content(Request $request)
    {
        //一级分类导航compact
        $firsbar_list = FirstbarModel::orderBy('order')->get();
        $c_id = $request->all();
        $c_id = $c_id['c_id'];
        // Redis::setex($c_id,600,'123');
        $redis = Redis::get($c_id);
        //三表联查查出一级分类
        // echo $c_id;
        $first = TwobarModel::join('content','content.t_id','=','two_bar.t_id')
                            ->join('first_bar','first_bar.f_id','=','two_bar.f_id')
                            ->where('content.c_id',$c_id)->first()->toArray();
        // var_dump($first);
        $f_id = $first['f_id'];
        // echo $f_id;
        if(!empty($redis)){
            //缓存中有
            echo 'redis';
            $redis = Redis::get($c_id);
            echo $redis;
        }else{
            //判断是否有ob缓冲
            if(file_exists("ob/".$c_id."contents.html")){
                echo 'ob';
                $a = file_get_contents("ob/".$c_id."contents.html");
                echo $a;exit;
            }
            $content = ContentModel::where('c_id',$c_id)->first()->toArray();
            ob_start();
            echo view('index/index/content',['content'=>$content,'f_id'=>$f_id,'firsbar_list'=>$firsbar_list]);
            $ob_list = ob_get_contents();
            Redis::setex($c_id,600,$ob_list);
            file_put_contents("ob/".$c_id."contents.html",$ob_list);
        }
        
    }
}
