
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
	<div class="position">简体中文：用户设置 > <a href="1.html">用户角色添加</a></div>

	</div>
	<div class="clear"></div>


<div class="stat_list">
	<ul>
		<li class="now"><a href="" title="基本信息">用户权限添加</a></li>
	</ul>
</div>
	<input name="action" type="hidden" value="modify" />
<table cellpadding="2" cellspacing="1" class="table">

    <tr> 
        <td class="text"><span class="bi_tian">*</span>权限：</td>
        <td class="input">
          <select id="">
          @foreach($power_list as $k=>$v)
            <option name="p_id" value="<?php echo $v['p_id']?>"><?php echo $v['url']?></option>
          @endforeach
          </select>
        </td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>角色：</td>
        <td class="input">
          <select  id="">
          @foreach($role_list as $k=>$v)
            <option name="r_id" value="<?php echo $v['r_id']?>"><?php echo $v['r_name']?></option>
          @endforeach
          </select>
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
      var p_id = $("option[name='p_id']:checked").val();
      var r_id = $("option[name='r_id']:checked").val();
      var data = {};
      data.p_id = p_id;
      data.r_id = r_id;
      $.ajax({
          type : "post",
          data : {data:data},
          dataType : 'json',
          url:'/admin/rolepower/add_do',
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
