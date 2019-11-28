<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;
use App\admin\DownimgModel;
use App\admin\LoginModel;
use App\admin\UserroleModel;
use App\admin\RoleModel;
use App\admin\PowerModel;
use App\admin\RolepowerModel;
class LoginToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $u_name = Cookie::get('adminuser');
        if($u_name==""){
            echo "<script>location.href='/admin/index/index'</script>";
        }else{
            //判断用户的权限
            $u_id = LoginModel::where('u_name',$u_name)->first();
            $role = UserroleModel::join('role','role.r_id','=','user_role.r_id')->where('user_role.u_id',$u_id['u_id'])->get()->toArray();
            if(empty($role)){
                //没有权限
                echo "<script>location.href='/admin/index/index'</script>";
            }
            $r_id = $role['0']['r_id'];
            $power = RolepowerModel::join('power','power.p_id','=','role_power.p_id')->where('role_power.r_id',$r_id)->get()->toArray();
            if($power==""){
                //没有权限
                // header("Location: http://www.213.com/admin/index/index");
                echo "<script>location.href='/admin/index/index'</script>";
            }
            // $url = $power['0']['url'];
            $url2 = $power['1']['url'];
            $num = 0;
            foreach($power as $k=>$v){
                $num += 1;
            }
            for($i=0;$i<$num;$i++){
                $url[] = $power[$i]['url'];
            }
            $user_url = $_SERVER['REDIRECT_URL'];
            // var_dump($_SERVER);
            if(!in_array($user_url,$url)){
                echo "<script>location.href='/admin/index/index'</script>";
                // echo "<script>alert('没有权限'),location.href='/admin/index/index'</script>";
            }
           
        }
        
        return $next($request);
    }
}
