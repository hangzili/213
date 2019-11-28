
@extends('admin.index.index')

@section('title')
轮播图展示
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
	<div class="position">简体中文：导航栏设置 > <a href="1.html">一级导航栏展示</a></div>

	</div>
	<div class="clear"></div>


<div class="stat_list">
	<ul>
		<li class="now"><a href="1.html" title="基本信息">一级导航栏信息展示</a></li>
	</ul>
</div>
	<input name="action" type="hidden" value="modify" />
<table cellpadding="2" cellspacing="1" class="table" style="text-align: center;">
  <tr>
    <td>底部链接名称</td>
    <td>是否展示</td>
    <td>链接路径</td>
    <td>添加时间</td>
    <td>操作</td>
  </tr>
  <?php foreach($list as $k=>$v){ ?>
  <tr>
    <td><?php echo $v['name'] ?></td>
    <?php if($v['is_show']==0){ ?>
      <td>是</td>
    <?php }else{ ?>
      <td>否</td>
    <?php } ?>
    <td><?php echo $v['url'] ?></td>
    <td><?php echo date('Y-m-d H:i:s',$v['add_time']) ?></td>
    <td>
      <input type="submit" style="border:1px solid blur;background:red;border-radius:60px;" name="del"  value="删除" class="submit" id="<?php echo $v['id']?>" javascript:0; />     
      <a href="/admin/underurl/upd?id=<?php echo $v['id']?>"><input  style="border:1px solid blur;background:green;border-radius:60px;" type="submit" name="upd" value="修改" class="submit" javascript:0; /></a>
    </td>
  </tr>
  <?php } ?>
</table>

</body>
</html> 
<script>
  $(document).ready(function(){
    //底部链接删除
    $("input[name='del']").click(function(){
      var id = $(this).attr("id");
      var _this=$(this);
      $.ajax({
          type : "post",
          data : {id:id},
          dataType : 'json',
          url:'/admin/underurl/del',
          success:function(res){
              if(res==1){
                _this.parents('tr').hide();
                alert('删除成功');
              }else{
                alert('删除失败');
              }
          }
      });
    })
  })
</script>
@endsection
