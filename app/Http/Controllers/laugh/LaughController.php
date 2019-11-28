<?php

namespace App\Http\Controllers\laugh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaughController extends Controller
{
    public function laugh_add()
    {
        $url = file_get_contents("http://api.avatardata.cn/Joke/QueryJokeByTime?key=f25376407e974173a089927b81353663&page=2&rows=10&sort=asc&time=1418745237");
        $list = json_decode($url,1);
        // var_dump($list['result']);
        $str = "";
        foreach($list['result'] as $k=>$v){
            $str = $v['content'];
            $conn = mysqli_connect('localhost','root','');
            mysqli_select_db($conn,'203a');
            $sqlb = "insert into laugh(text) values('$str')";
            $re = mysqli_query($conn,$sqlb);
        }
        if($re){
            echo "笑话添加成功";
        }

    }
}
       