<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\FirstbarModel;
class FirstbarController extends Controller
{
    //一级导航栏添加
    public function add()
    {
        return view('/admin/firstbar/add');
    }
    //一级导航栏添加执行页面
    public function add_do(Request $request)
    {
        // $all = $request->except('_token');
        $list = $request->all();
        $time = time();
        $list['data']['add_time'] = $time;
        $add = $list['data'];
        $list = FirstbarModel::insert($add);
        // var_dump($list);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
    }
    //一级导航栏展示
    public function list()
    {
        $list = FirstbarModel::select()->paginate(4);
        return view('/admin/firstbar/list',["list"=>$list]);
    }
    //一级导航栏导航删除
    public function del(Request $request)
    {
        $id = $request->all();
        $f_id = $id['f_id'];
        
        $del = FirstbarModel::where('f_id',$f_id)->delete();
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }
    //一级导航的修改
    public function upd(Request $request)
    {
        $all = $request->all();
        $f_id = $all['f_id'];
        $list = FirstbarModel::where('f_id',$f_id)->first();
        // var_dump($list['f_name']);die;
        return view('/admin/firstbar/upd',["list"=>$list]);
    }
    //一级导航的修改执行页面
    public function upd_do(Request $request)
    {
        $all = $request->all();
        $updlist = $all['data'];
        $upd = FirstbarModel::where('f_id',$updlist['f_id'])->update($updlist);
        if($upd){
            echo 1;
        }else{
            echo 2;
        }
    }
}
