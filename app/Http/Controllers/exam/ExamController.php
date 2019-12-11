<?php

namespace App\Http\Controllers\exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\laugh\ExamModel;
use Illuminate\Support\Facades\Redis;
class ExamController extends Controller
{
    public function add()
    {
        $get = file_get_contents("http://api.avatardata.cn/Joke/QueryJokeByTime?key=f25376407e974173a089927b81353663&page=2&rows=1&sort=asc&time=1418745237");
        $list = json_decode($get,1);
        $content = [];
        foreach($list['result'] as $k=>$v){
            // var_dump(]);
            $content['content'] = $v['content'];
            // var_dump($content);
            ExamModel::insert($content);
        }
        // var_dump($list);
    }
    public function list()
    {
        $list = ExamModel::get()->toArray();
        if(file_exists("exam/list.html")){
            $lis = file_get_contents("exam/list.html");
            echo $lis;exit;
        }
        ob_start();
        echo view("exam/list",['list'=>$list]);
        $ob_list = ob_get_contents();
        if(!is_dir(public_path("exam"))){
            mkdir(public_path("exam"),777,true);
        }
        file_put_contents("exam/list.html",$ob_list);
    }
    public function content(Request $request)
    {
        $all = $request->all('id');
        $id = $all['id'];
        $list = ExamModel::where('id',$id)->first();
        $redis_list = Redis::get($id);
        if(!empty($redis_list)){
            $redislist = Redis::get($id);
            echo $redislist;
        }else{
            if(file_exists("exam/".$id."content.html")){
            $lis = file_get_contents("exam/".$id."content.html");
            echo $lis;exit;
            }
            ob_start();
            echo view("exam/content",['list'=>$list]);
            $ob_list = ob_get_contents();
            Redis::setex($id,6000,$ob_list);
            if(!is_dir(public_path("exam"))){
                mkdir(public_path("exam"),777,true);
            }
            file_put_contents("exam/".$id."content.html",$ob_list);
        }
        
    }
}
