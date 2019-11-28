
@extends('admin.index.index')

@section('title')
顶部轮播图添加
@endsection
@section('content')
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/admin/images/metinfo.css" />
<script type="text/javascript" src="/admin/ckeditor/ckeditor.js"></script>

</head>

<body>

	<div class="metinfotop">
	<div class="position">简体中文：后台用户设置 > <a href="1.html">角色添加</a></div>

	</div>
	<div class="clear"></div>


<div class="stat_list">
	<ul>
		<li class="now"><a href="" title="基本信息">角色添加</a></li>
	</ul>
</div>
	<input name="action" type="hidden" value="modify" />
<table cellpadding="2" cellspacing="1" class="table">

    <tr> 
        <td class="text"><span class="bi_tian">*</span>角色名称：</td>
        <td class="input"><input name="r_name" type="text" class="text" /></td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>是否展示：</td>
        <td class="input">
          <input type="radio" value="0" name="is_show">是
          <input type="radio" value="1" name="is_show">否
        </td>
    </tr>
	<tr> 
        <td class="text"></td>
	    <td class="submit">
		<input type="submit" name="but" style="border:1px solid blur;background:yellow;border-radius:60px;" value="添加" class="submit" javascript:0; />		</td>
    </tr>
  </table>

</body>
</html>
<script>
  $(document).ready(function(){
    $("input[name='but']").click(function(){
      var r_name = $("input[name='r_name']").val();
      var is_show = $("input[name='is_show']:checked").val();
      var data = {};
      data.r_name = r_name;
      data.is_show = is_show;
      $.ajax({
          type : "post",
          data : {data:data},
          dataType : 'json',
          url:'/admin/role/add_do',
          success:function(res){
              if(res==1){
                alert('添加成功');
              }else{
                alert('添加失败');
              }
          }
      });
    })
  })
</script>
@endsection
