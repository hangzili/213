<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\FirstbarModel;
use App\admin\TwobarModel;
class TwobarController extends Controller
{
    //二级导航栏添加
    public function add()
    {
        $first = FirstbarModel::all()->toArray();
        return view('/admin/twobar/add',['first'=>$first]);
    }
    //二级导航栏添加执行页面
    public function add_do(Request $request)
    {
        $list = $request->all();
        // var_dump($list);
        $time = time();
        $list['data']['add_time'] = $time;
        $add = $list['data'];
        // var_dump($add);
        $list = TwobarModel::insert($add);
        // // var_dump($list);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
    }
    //二级导航栏展示
    public function list()
    {
        // $list = TwobarModel::get();
        $list = FirstbarModel::join('two_bar','two_bar.f_id','=','first_bar.f_id')->select()->paginate(6);
        return view('/admin/twobar/list',["list"=>$list]);
    }
    //二级导航栏导航删除
    public function del(Request $request)
    {
        $id = $request->all();
        $t_id = $id['t_id'];
        // echo $t_id;
        $del = TwobarModel::where('t_id',$t_id)->delete();
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }
    //二级导航的修改
    public function upd(Request $request)
    {
        $all = $request->all();
        $t_id = $all['t_id'];
        $t_list = FirstbarModel::join('two_bar','two_bar.f_id','=','first_bar.f_id')->where('two_bar.t_id','=',$t_id)->first();
        // var_dump($f_name['t_name']);
        $first = FirstbarModel::all()->toArray();
        // $list = FirstbarModel::where('f_id',$f_id)->first();
        // // var_dump($list['f_name']);die;
        return view('/admin/twobar/upd',["t_list"=>$t_list,"first"=>$first]);
    }
    //二级导航的修改执行页面
    public function upd_do(Request $request)
    {
        $all = $request->all();
        $updlist = $all['data'];
        // var_dump($updlist);
        $upd = TwobarModel::where('t_id',$updlist['t_id'])->update($updlist);
        if($upd){
            echo 1;
        }else{
            echo 2;
        }
    }
}
