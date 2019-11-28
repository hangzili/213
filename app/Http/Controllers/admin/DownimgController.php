<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\DownimgModel;
class DownimgController extends Controller
{
    //底部轮播图添加
    public function add(){
        return view('/admin/downimg/add');
    }
    
    //底部图片上传
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
    //底部轮播图添加执行页面
    public function add_do(Request $request)
    {
        $list = $request->all();
        $time = time();
        $list['data']['add_time'] = $time;
        $add = $list['data'];
        $list = DownimgModel::insert($add);
        // var_dump($list);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
    }
    //底部轮播图栏展示
    public function list(Request $request)
    {
        $name = $request->all('name');
        $name = $name['name'];
        $list = DownimgModel::where('name','like','%'.$name.'%')->select()->paginate(4);
        return view('/admin/downimg/list',["list"=>$list]);
    }
    //底部轮播图删除
    public function del(Request $request)
    {
        $id = $request->all();
        $id = $id['id'];
        
        $del = DownimgModel::where('id',$id)->delete();
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }
}
