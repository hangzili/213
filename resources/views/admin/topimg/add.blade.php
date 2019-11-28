
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
<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css" />
<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.swf" />
<script type="text/javascript" src="/admin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/uploadify/jquery.uploadify.js"></script>

</head>

<body>

	<div class="metinfotop">
	<div class="position">简体中文：顶部轮播图设置 > <a href="1.html">轮播图添加</a></div>

	</div>
	<div class="clear"></div>


<div class="stat_list">
	<ul>
		<li class="now"><a href="" title="基本信息">轮播图添加</a></li>
	</ul>
</div>
	<input name="action" type="hidden" value="modify" />
<table cellpadding="2" cellspacing="1" class="table">

    <tr> 
        <td class="text"><span class="bi_tian">*</span>图片上传：</td>
        <td class="input">
          <input name="img" type="file" id="uploadify" class="" />
          <input type="hidden" name="path">
        </td>
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
		<input type="submit" name="but" value="提交" class="submit" onclick="return Smit($(this),'myform')" />		</td>
    </tr>
    
  </table>


</body>
</html> 

<script>
  $(document).ready(function(){
    $("#uploadify").uploadify({
      'swf': '/uploadify/uploadify.swf',
      'uploader':'/admin/topimg/up',
      'onUploadSuccess':function(file,msg,data){
        $("input[name='path']").val(msg);
      }
    })
    $("input[name='but']").click(function(){
      var path = $("input[name='path']").val();
      var is_show = $("input[name='is_show']:checked").val();
      // alert(path);
      var data = {};
      data.path = path;
      data.is_show = is_show;
      $.ajax({
          type : "post",
          data : {data:data},
          dataType : 'json',
          url:'/admin/topimg/add_do',
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
