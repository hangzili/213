<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\UserroleModel;
use App\admin\LoginModel;
use App\admin\RoleModel;
class UserroleController extends Controller
{
    //用户角色添加
    public function add()
    {
        $role_list = RoleModel::get()->toArray();
        $login_list = LoginModel::get()->toArray();
        // var_dump($login_list);
        return view('/admin/userrole/add',['role_list'=>$role_list,'login_list'=>$login_list]);
    }
    //用户角色添加执行页面
    public function add_do(Request $request)
    {
        // $all = $request->except('_token');
        $all = $request->all();
        $time = time();
        $all['data']['add_time'] = $time;
        $add = $all['data'];
        $list = UserroleModel::insert($add);
        // var_dump($list);
        if($list){
            echo 1;
        }else{
            echo 2;
        }
    }
    //用户角色表展示
    public function list(Request $request)
    {
        // $userlist = LoginModel::get()->toArray();
        // $list = [];
        // foreach($userlist as $k=>$v){
        //     $user = UserroleModel::where('u_id',$v['u_id'])->first()->toArray();
        //     // var_dump($user['r_id']);
        //     $role = RoleModel::where('r_id',$user['r_id'])->first()->toArray();
        //     $list[] = $v + $role + $user;
            
        // }
        $u_name = $request->all('u_name');
        $u_name = $u_name['u_name'];
        if(empty($u_name)){
            $list = UserroleModel::join('admin_user','admin_user.u_id','=','user_role.u_id')
                                ->join('role','role.r_id','=','user_role.r_id')
                                ->select()->paginate(3);
        }else{
            $list = UserroleModel::join('admin_user','admin_user.u_id','=','user_role.u_id')
                                ->join('role','role.r_id','=','user_role.r_id')
                                ->where('admin_user.u_name','like','%'.$u_name.'%')->select()->paginate(3);
        }
        
        return view('/admin/userrole/list',['list'=>$list]);
    }
    //用户关系删除
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
