<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\RolepowerModel;//角色权限
use App\admin\RoleModel;//角色
use App\admin\PowerModel;//权限
class RolepowerController extends Controller
{
    //角色权限添加
    public function add()
    {
        $role_list = RoleModel::get()->toArray();
        $power_list = PowerModel::get()->toArray();
        // var_dump($login_list);
        return view('/admin/rolepower/add',['role_list'=>$role_list,'power_list'=>$power_list]);
    }
    //角色权限添加执行页面
    public function add_do(Request $request)
    {
        // $all = $request->except('_token');
        $all = $request->all();
        $time = time();
        $all['data']['add_time'] = $time;
        $add = $all['data'];
        $list = RolepowerModel::insert($add);
        // var_dump($list);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
    }
    //角色权限表展示
    public function list(Request $request)
    {
        $r_name = $request->all('r_name');
        $url = $request->all('url');
        // var_dump($r_name);
        $r_name = $r_name['r_name'];
        $url = $url['url'];
        if(empty($r_name) && empty($url)){
            $list = RolepowerModel::join('role','role_power.r_id','=','role.r_id')
                            ->join('power','role_power.p_id','=','power.p_id')
                            ->select()->paginate(9);
        }else{
            $list = RolepowerModel::join('role','role_power.r_id','=','role.r_id')
                            ->join('power','role_power.p_id','=','power.p_id')
                            ->where('role.r_name','like','%'.$r_name.'%')
                            ->where('power.url','like','%'.$url.'%')->select()->paginate(9);
        }
        
        // var_dump($list);
        return view('/admin/rolepower/list',['list'=>$list]);
    }
    //角色权限关系删除
    public function del(Request $request)
    {
        $id = $request->all();
        $id = $id['id'];
        // echo $t_id;
        $del = UserroleModel::where('id',$id)->delete();
        if($del){
            echo 1;
        }else{
            echo 2;
        }
    }
}
