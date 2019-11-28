<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::any('/laugh','laugh\LaughController@laugh_add');

//后台
Route::any('/admin/login/index','admin\LoginController@index');//后台注册页面
Route::any('/admin/login/login_do','admin\LoginController@login_do');//后台注册页面
Route::any('/admin/login/sendMail','admin\LoginController@sendMail');//后台注册页面
Route::any('/admin/login/landing','admin\LoginController@landing');//后台登陆页面
Route::any('/admin/login/landing_do','admin\LoginController@landing_do');//后台登陆执行
Route::any('/admin/login/exit','admin\LoginController@exit');//后台退出登陆

Route::any('/admin/role/add','admin\RoleController@add')->middleware('long');//后台角色添加
Route::any('/admin/role/add_do','admin\RoleController@add_do')->middleware('long');//后台角色添加执行页面
Route::any('/admin/role/list','admin\RoleController@list')->middleware('long');//后台角色展示页面
Route::any('/admin/role/del','admin\RoleController@del')->middleware('long');//后台角色删除页面
Route::any('/admin/role/upd','admin\RoleController@upd')->middleware('long');//后台角色修改页面
Route::any('/admin/role/upd_do','admin\RoleController@upd_do')->middleware('long');//后台角色修改执行页面

Route::any('/admin/userrole/add','admin\UserroleController@add')->middleware('long');//后台用户角色关联
Route::any('/admin/userrole/add_do','admin\UserroleController@add_do')->middleware('long');//后台用户角色关联添加
Route::any('/admin/userrole/list','admin\UserroleController@list');//后台用户角色关联展示-----------------------------------------------
Route::any('/admin/userrole/del','admin\UserroleController@del')->middleware('long');//后台用户角色关联删除

Route::any('/admin/power/add','admin\PowerController@add')->middleware('long');//后台权限添加
Route::any('/admin/power/add_do','admin\PowerController@add_do')->middleware('long');//后台权限添加执行页面
Route::any('/admin/power/list','admin\PowerController@list')->middleware('long');//后台权限展示页面
Route::any('/admin/power/del','admin\PowerController@del')->middleware('long');//后台权限删除页面

Route::any('/admin/rolepower/add','admin\RolepowerController@add')->middleware('long');//后台角色权限关联
Route::any('/admin/rolepower/add_do','admin\RolepowerController@add_do')->middleware('long');//后台角色权限关联添加
Route::any('/admin/rolepower/list','admin\RolepowerController@list')->middleware('long');//后台角色权限关联展示
Route::any('/admin/rolepower/del','admin\RolepowerController@del')->middleware('long');//后台角色权限关联删除

Route::any('/admin/index/index','admin\IndexController@index');
Route::any('/admin/topimg/add','admin\TopimgController@add')->middleware('long');//顶部轮播图添加
Route::any('/admin/topimg/add_do','admin\TopimgController@add_do')->middleware('long');//顶部轮播图添加执行页面
Route::any('/admin/topimg/up','admin\TopimgController@up')->middleware('long');//顶部轮播图图片上传
Route::any('/admin/topimg/list','admin\TopimgController@list')->middleware('long');//顶部轮播图展示
Route::any('/admin/topimg/del','admin\TopimgController@del')->middleware('long');//顶部轮播图删除

Route::any('/admin/downimg/add','admin\DownimgController@add')->middleware('long');//底部轮播图添加
Route::any('/admin/downimg/add_do','admin\DownimgController@add_do')->middleware('long');//底部轮播图添加执行页面
Route::any('/admin/downimg/up','admin\DownimgController@up')->middleware('long');//底部轮播图图片上传
Route::any('/admin/downimg/list','admin\DownimgController@list')->middleware('long');//底部轮播图展示
Route::any('/admin/downimg/del','admin\DownimgController@del')->middleware('long');//底部轮播图删除

Route::any('/admin/firstbar/add','admin\FirstbarController@add')->middleware('long');//一级导航栏添加
Route::any('/admin/firstbar/add_do','admin\FirstbarController@add_do')->middleware('long');//一级导航栏添加
Route::any('/admin/firstbar/list','admin\FirstbarController@list')->middleware('long');//一级导航栏展示
Route::any('/admin/firstbar/del','admin\FirstbarController@del')->middleware('long');//一级导航栏导航删除
Route::any('/admin/firstbar/upd','admin\FirstbarController@upd')->middleware('long');//一级导航栏导航修改页面
Route::any('/admin/firstbar/upd_do','admin\FirstbarController@upd_do')->middleware('long');//一级导航栏导航修改执行页面

Route::any('/admin/twobar/add','admin\TwobarController@add')->middleware('long');//二级导航栏添加
Route::any('/admin/twobar/add_do','admin\TwobarController@add_do')->middleware('long');//二级导航栏添加执行
Route::any('/admin/twobar/list','admin\TwobarController@list')->middleware('long');//二级导航栏展示
Route::any('/admin/twobar/del','admin\TwobarController@del')->middleware('long');//二级导航栏删除
Route::any('/admin/twobar/upd','admin\TwobarController@upd')->middleware('long');//二级导航栏修改
Route::any('/admin/twobar/upd_do','admin\TwobarController@upd_do')->middleware('long');//二级导航栏修改执行页面

Route::any('/admin/content/add','admin\ContentController@add')->middleware('long');//三级信息添加
Route::any('/admin/content/add_do','admin\ContentController@add_do')->middleware('long');//三级信息添加
Route::any('/admin/content/up','admin\ContentController@up')->middleware('long');//三级信息添加
Route::any('/admin/content/list','admin\ContentController@list')->middleware('long');//三级信息添加
Route::any('/admin/content/del','admin\ContentController@del')->middleware('long');//三级信息删除

Route::any('/admin/underurl/add','admin\UnderurlController@add')->middleware('long');//底部友情连接添加
Route::any('/admin/underurl/add_do','admin\UnderurlController@add_do')->middleware('long');//底部友情连接添加执行
Route::any('/admin/underurl/list','admin\UnderurlController@list')->middleware('long');//底部友情连接展示页面
Route::any('/admin/underurl/del','admin\UnderurlController@del')->middleware('long');//底部友情连接删除
Route::any('/admin/underurl/upd','admin\UnderurlController@upd')->middleware('long');//底部友情连接修改
Route::any('/admin/underurl/upd_do','admin\UnderurlController@upd_do')->middleware('long');//底部友情连接修改执行

//前台
Route::any('/index/index/index','index\IndexController@index');//前台index模块
Route::any('/index/index/recursion','index\IndexController@recursion');//前台index模块
Route::any('/index/index/list','index\IndexController@list');//前台index模块
Route::any('/index/index/content','index\IndexController@content');//前台index模块
