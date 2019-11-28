
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
<script type="text/javascript" src="/admin/ueditor1/ueditor.all.js"></script>
<script type="text/javascript" src="/uploadify/jquery.uploadify.js"></script>

<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script> <!--ueditor的配置文件-->
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"></script> <!--ueditor核心文件-->
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/lang/zh-cn/zh-cn.js"></script> <!--ueditor语言文件-->





</head>

<body>

	<div class="metinfotop">
	<div class="position">简体中文：导航栏设置 > <a href="1.html">三级内容添加</a></div>

	</div>
	<div class="clear"></div>


<div class="stat_list">
	<ul>
		<li class="now"><a href="" title="基本信息">三级内容添加</a></li>
	</ul>
</div>
	<input name="action" type="hidden" value="modify" />
<table cellpadding="2" cellspacing="1" class="table">

    <tr> 
        <td class="text"><span class="bi_tian">*</span>内容标题：</td>
        <td class="input"><input name="c_title" type="text" class="text" maxlength="15" placeholder="最多输入15位"/></td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>是否展示：</td>
        <td class="input">
          <input type="radio" value="0" name="is_show">是&nbsp;&nbsp;&nbsp;
          <input type="radio" value="1" name="is_show">否
        </td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>是否热门：</td>
        <td class="input">
          <input type="radio" value="0" name="is_hot">是&nbsp;&nbsp;&nbsp;
          <input type="radio" value="1" name="is_hot">否
        </td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>图片上传：</td>
        <td class="input">
          <input name="img" type="file" id="uploadify" class="" />
          <input type="hidden" name="path" id="img">
        </td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>上一级导航：</td>
        <td class="input">
          <select name="t_id" id="">
            <?php foreach($two as $k=>$v){ ?>
              <option value="<?php echo $v['t_id']?>"><?php echo $v['t_name']?></option>
            <?php } ?>
          </select>
        </td>
    </tr>
    <tr>
      <td class="text"><span class="bi_tian">*</span>网站描述：</td>
      <td colspan="2" class="text">
        <div style="width: 300px; height: 200px;">
          <script id="editor" type="text/plain" style="width:1024px;height:150px;"></script>
        </div>
        <script type="text/javascript">
            var ue = UE.getEditor('editor');
        </script>
      </td>
    </tr> 
   
	
	  <tr> 
        <td class="text"></td>
	    <td class="submit">
		<input type="submit" style="border:1px solid blur;background:yellow;border-radius:60px;" name="but" value="添加" class="submit" javascript:0; />		</td>
    </tr>
  </table>

</body>
</html>
<script>
  $(document).ready(function(){
    $("#uploadify").uploadify({
      'swf': '/uploadify/uploadify.swf',
      'uploader':'/admin/content/up',
      'onUploadSuccess':function(file,msg,data){
        $("input[name='path']").val(msg);
      }
    })
    $("input[name='but']").click(function(){
      var c_title = $("input[name='c_title']").val();
      var c_content = UE.getEditor('editor').getContent();
      var is_show = $("input[name='is_show']:checked").val();
      var is_hot = $("input[name='is_hot']:checked").val();
      var t_id = $("option:checked").val();
      var img = $("input[name='path']").val();
      var data = {};
      data.c_title = c_title;
      data.c_content = c_content;
      data.is_show = is_show;
      data.is_hot = is_hot;
      data.t_id = t_id;
      data.img = img;
      console.log(data);
      $.ajax({
          type : "post",
          data : {data:data},
          dataType : 'json',
          url:'/admin/content/add_do',
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
