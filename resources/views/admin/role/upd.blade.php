
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
	<div class="position">简体中文：用户设置 > <a href="1.html">角色修改</a></div>

	</div>
	<div class="clear"></div>


<div class="stat_list">
	<ul>
		<li class="now"><a href="" title="基本信息">角色修改</a></li>
	</ul>
</div>
	<input name="action" type="hidden" value="modify" />
<table cellpadding="2" cellspacing="1" class="table">
    <input type="hidden" name="r_id" r_id=<?php echo $list['r_id'] ?>>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>角色名称：</td>
        <td class="input"><input name="r_name" type="text" value="<?php echo $list['r_name'] ?>" class="text" /></td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>是否展示：</td>
        <td class="input">
        <?php if($list['is_show']==0){ ?>
          <input type="radio" value="0" checked name="is_show">是
          <input type="radio" value="1" name="is_show">否
        <?php }else{ ?>
          <input type="radio" value="0" name="is_show">是
          <input type="radio" value="1" checked name="is_show">否
        <?php } ?>
          
        </td>
    </tr>
	<tr> 
        <td class="text"></td>
	    <td class="submit">
		<input type="submit" name="but" value="修改" class="submit" javascript:0; />		</td>
    </tr>
  </table>

</body>
</html>
<script>
  $(document).ready(function(){
    $("input[name='but']").click(function(){
      var r_name = $("input[name='r_name']").val();
      var is_show = $("input[name='is_show']:checked").val();
      var r_id = $("input[name='r_id']").attr('r_id');
      var data = {};
      data.r_name = r_name;
      data.is_show = is_show;
      data.r_id = r_id;
      $.ajax({
          type : "post",
          data : {data:data},
          dataType : 'json',
          url:'/admin/role/upd_do',
          success:function(res){
              if(res==1){
                  window.location.href = '/admin/role/list';
              }else{
                  alert('修改错误');
              }
            
          }
      });
    })
  })
</script>
@endsection
