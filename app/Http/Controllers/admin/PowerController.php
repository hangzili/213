<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\PowerModel;
class PowerController extends Controller
{
     //权限添加
     public function add()
     {
         return view('/admin/power/add');
     }
     //权限添加执行页面
     public function add_do(Request $request)
     {
         // $all = $request->except('_token');
         $list = $request->all();
         $time = time();
         $list['data']['add_time'] = $time;
         $add = $list['data'];
         $list = PowerModel::insert($add);
         if($list){
             echo 1;
         }else{
             echo 2;
         }
     }
     //权限展示
     public function list(Request $request)
     {
         $url = $request->all('url');
         $url = $url['url'];
        //  var_dump($url);
         if(empty($url)){
            //  echo 1111;
             $list = PowerModel::select()->paginate(9);
         }else{
            //  echo 222;
            $list = PowerModel::where('url','like','%'.$url.'%')->select()->paginate(9);
         }
         
         return view('/admin/power/list',["list"=>$list]);
     }
     //权限删除
     public function del(Request $request)
     {
         $id = $request->all();
         $p_id = $id['p_id'];
         // dd($r_id);
         $del = PowerModel::where('p_id',$p_id)->delete();
         if($del){
             echo 1;
         }else{
             echo 2;
         }
     }
}
