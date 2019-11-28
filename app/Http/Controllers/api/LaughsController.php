<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LaughsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取access_token
        // $ip = ($_SERVER['REMOTE_ADDR']);
        $id=uniqid();
        $key = sprintf("%u",crc32($id));
        Redis::set($key,1);
        echo $key;
        // Redis::setex('b',10,12);
        // echo Redis::get('b');
        // header("Location:http://www.213.com/api/laugh/".$num);
        // Redis::set($num,1);
        // dump($redis);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        $first = Redis::get($key);
        // echo $first;exit;
        //如果有值就自增，没值添加

        if($first){
            //有值
            if($first>=5){
                echo "调用次数太频繁";exit;
            }elseif($first==1){
                Redis::setex($key,60,$first+1);
            }else{
                Redis::setex($key,60,$first+1);

            }
        }else{
            echo "参数access_token不对";exit;
        }
        //展示 传过来access_token 
        $conn = mysqli_connect('localhost','root','');
        mysqli_select_db($conn,'203a');
        $sql = "select * from laugh";
        $re = mysqli_query($conn,$sql);
        $data =[];
        while($info = mysqli_fetch_array($re)){
            array_push($data,$info);
        }
        $get_into = date("Y/m/d/H",time());
        
        $new_info = $get_into."/1.txt";
        // echo $new_info;
        if(!is_dir(storage_path($get_into))){
            mkdir(storage_path($get_into),777,true);
        }
        file_put_contents(storage_path($new_info),json_encode($data),FILE_APPEND);        
        file_put_contents(storage_path($new_info),"\n<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);

        // $into = file_put_contents($new_info,json_encode($data),FILE_APPEND);
        echo $get_into;
        return json_encode($data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
