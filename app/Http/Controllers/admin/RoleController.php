<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\RoleModel;
class RoleController extends Controller
{
    //角色添加
    public function add()
    {
        return view('/admin/role/add');
    }
    //角色添加执行页面
    public function add_do(Request $request)
    {
        // $all = $request->except('_token');
        $list = $request->all();
        $time = time();
        $list['data']['add_time'] = $time;
        $add = $list['data'];
        $list = RoleModel::insert($add);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
    }
    //角色展示
    public function list(Request $request)
    {
        $r_name = $request->all('r_name');
        $r_name = $r_name['r_name'];
        if(empty($r_name)){
            $list = RoleModel::select()->paginate(2);
        }else{
            $list = RoleModel::where('r_name','like','%'.$r_name.'%')->select()->paginate(2);
        }
        
        return view('/admin/role/list',["list"=>$list]);
    }
    //角色删除
    public function del(Request $request)
    {
        $id = $request->all();
        $r_id = $id['r_id'];
        // dd($r_id);
        $del = RoleModel::where('r_id',$r_id)->delete();
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }
    //角色的修改
    public function upd(Request $request)
    {
        $all = $request->all();
        $r_id = $all['r_id'];
        $list = RoleModel::where('r_id',$r_id)->first();
        // var_dump($list['f_name']);die;
        return view('/admin/role/upd',["list"=>$list]);
    }
    //角色的修改执行页面
    public function upd_do(Request $request)
    {
        $all = $request->all();
        $updlist = $all['data'];
        $upd = RoleModel::where('r_id',$updlist['r_id'])->update($updlist);
        if($upd){
            echo 1;
        }else{
            echo 2;
        }
    }
}
