<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\TopimgModel;
class TopimgController extends Controller
{
    //顶部轮播图添加
    public function add(){
        return view('/admin/topimg/add');
    }
    
    //顶部图片上传
    public function up(Request $request)
    {
        $requestobj = $request->file("Filedata");
        $ext = $requestobj->getClientOriginalExtension();
        $path = $requestobj->getRealPath();
        $filename = date("YmdHis",time()).".".$ext;
        \Storage::disk('public')->put($filename,file_get_contents($path));
        $newPath = "/uploads/$filename";
        echo $newPath;
    }
    //顶部轮播图添加执行页面
    public function add_do(Request $request)
    {
        $list = $request->all();
        $time = time();
        $list['data']['add_time'] = $time;
        $add = $list['data'];
        $list = TopimgModel::insert($add);
        // var_dump($list);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
    }
    //顶部轮播图栏展示
    public function list()
    {
        $list = TopimgModel::select()->paginate(3);
        return view('/admin/topimg/list',["list"=>$list]);
    }
    //顶部轮播图删除
    public function del(Request $request)
    {
        $id = $request->all();
        $i_id = $id['i_id'];
        
        $del = TopimgModel::where('i_id',$i_id)->delete();
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }
}
