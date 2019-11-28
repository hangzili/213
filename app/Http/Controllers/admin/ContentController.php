<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\TwobarModel;
use App\admin\ContentModel;
class ContentController extends Controller
{
    //三级内容添加
    public function add()
    {
        $two = TwobarModel::all()->toArray();
        return view('/admin/content/add',['two'=>$two]);
    }
    //三级内容添加执行页面
    public function add_do(Request $request)
    {
        $list = $request->all();
        // var_dump($list);
        $time = time();
        $list['data']['add_time'] = $time;
        $add = $list['data'];
        // var_dump($add);
        $list = ContentModel::insert($add);
        // // var_dump($list);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
        
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
    //三级内容展示
    public function list(Request $request)
    {
        $c_title = $request->all('c_title');
        $c_content = $request->all('c_content');
        $c_title = $c_title['c_title'];
        $c_content = $c_content['c_content'];
        // echo $c_title;
        // $list = ContentModel::get();
        $list = ContentModel::join('two_bar','two_bar.f_id','=','content.t_id')
                            ->where('content.c_title','like','%'.$c_title.'%')
                            ->where('content.c_content','like','%'.$c_content.'%')
                            ->select()->paginate(3);
        // var_dump($f_name);
        return view('/admin/content/list',["list"=>$list]);
    }  
    //三级导航栏导航删除
    public function del(Request $request)
    {
        $id = $request->all();
        $c_id = $id['c_id'];
        $del = ContentModel::where('c_id',$c_id)->delete();
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }
}
