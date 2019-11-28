
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
	<div class="position">简体中文：一级导航栏设置 > <a href="1.html">一级导航栏修改</a></div>

	</div>
	<div class="clear"></div>


<div class="stat_list">
	<ul>
		<li class="now"><a href="" title="基本信息">导航栏修改</a></li>
	</ul>
</div>
	<input name="action" type="hidden" value="modify" />
<table cellpadding="2" cellspacing="1" class="table">
    <input type="hidden" name="f_id" f_id=<?php echo $list['f_id'] ?>>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>导航栏名称：</td>
        <td class="input"><input name="name" type="text" value="<?php echo $list['f_name'] ?>" class="text" /></td>
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
        <td class="text"><span class="bi_tian">*</span>权重：</td>
        <td class="input"><input name="order" type="text" value="<?php echo $list['order'] ?>" class="text" /></td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>导航栏链接：</td>
        <td class="input"><input name="url" type="text" value="<?php echo $list['url'] ?>" class="text" /></td>
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
      var name = $("input[name='name']").val();
      var is_show = $("input[name='is_show']:checked").val();
      var order = $("input[name='order']").val();
      var url = $("input[name='url']").val();
      var f_id = $("input[name='f_id']").attr('f_id');
      var data = {};
      data.f_name = name;
      data.is_show = is_show;
      data.order = order;
      data.url = url;
      data.f_id = f_id;
      $.ajax({
          type : "post",
          data : {data:data,'_token':'{{csrf_token()}}'},
          dataType : 'json',
          url:'/admin/firstbar/upd_do',
          success:function(res){
              if(res==1){
                  window.location.href = '/admin/firstbar/list';
              }else{
                  alert('修改错误');
              }
            
          }
      });
    })
  })
</script>
@endsection
