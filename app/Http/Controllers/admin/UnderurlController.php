<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\UnderurlModel;
class UnderurlController extends Controller
{
    //底部友情连接添加
    public function add()
    {
        return view('/admin/underurl/add');
    }
    //底部友情链接添加执行页面
    public function add_do(Request $request)
    {
        // $all = $request->except('_token');
        $list = $request->all();
        $time = time();
        $list['data']['add_time'] = $time;
        $add = $list['data'];
        $list = UnderurlModel::insert($add);
        // var_dump($list);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
    }
    //底部友情链接展示
    public function list()
    {
        $list = UnderurlModel::get();
        return view('/admin/underurl/list',["list"=>$list]);
    }
    //底部友情链接删除
    public function del(Request $request)
    {
        $id = $request->all();
        $id = $id['id'];
        
        $del = UnderurlModel::where('id',$id)->delete();
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }
    //底部友情链接修改
    public function upd(Request $request)
    {
        $all = $request->all();
        $id = $all['id'];
        $list = UnderurlModel::where('id',$id)->first();
        // var_dump($list['f_name']);die;
        return view('/admin/underurl/upd',["list"=>$list]);
    }
    //底部友情链接修改执行页面
    public function upd_do(Request $request)
    {
        $all = $request->all();
        $updlist = $all['data'];
        // var_dump($updlist);
        $upd = UnderurlModel::where('id',$updlist['id'])->update($updlist);
        if($upd){
            echo 1;
        }else{
            echo 2;
        }
    }
}
