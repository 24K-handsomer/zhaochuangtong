<?php if (!defined('THINK_PATH')) exit();?><!doctype html public "-//w3c//dtd xhtml 1.0 frameset//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-frameset.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <meta http-equiv=pragma content=no-cache />
        <meta http-equiv=cache-control content=no-cache />
        <meta http-equiv=expires content=-1000 />
    <!-- <script type="text/javascript" src='/Public/jquery-1.8.3.min.js'></script> -->
    <link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>demo.css" />
    
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>showproject.css" />

    <script type="text/javascript" src='/Public/ueditorpro/ueditor.config.js'></script>
    <script type="text/javascript" src='/Public/ueditorpro/ueditor.all.min.js'></script>
    <script type="text/javascript" src='/Public/ueditorpro/lang/zh-cn/zh-cn.js'></script>
</head>
<body>
<div id="menu">
    <div><img src="<?php echo ADMIN_IMG_URL ?>logo.png"></div>
    <div>数据管理系统</div>
    <div><?php echo session('u_name'); ?></div>
    <div><a href="/index.php/admin/Login/logout">退出</a></div>
</div>
<div id="subject">
    <div id="navleft">
        
<ul class="nav nav-tabs">
    <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): ?><li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?php echo ($v["auth_name"]); ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if($vv['auth_pid']==$v['auth_id']): ?><li><a href="/index.php/admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>"><?php echo ($vv["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
        </ul>
    </li><?php endforeach; endif; ?>
</ul>

    </div>
    <div id="public">
        
<h1><?php echo ($title); ?>留言列表</h1>
<div>共有留言：<?php echo ($count); ?>条</div>

<table width="94%" border="1" cellpadding="0" cellspacing="0">
	<tr id="first-tr">

	    <td>留言者姓名</td>
	    <td>手机号</td>
	    <td>其他联系方式</td>
	    <td>留言内容</td>
	    <td>所在地</td>
	    <td>留言时间</td>
	    <td>是否已阅读</td>
	    <td>操作</td>
	</tr>
	<?php if(is_array($liuyan)): foreach($liuyan as $key=>$v): ?><tr id="second-tr" class="row<?php echo ($v["liu_id"]); ?>">
	    <td><?php echo ($v["liu_name"]); ?></td>
	    <td><?php echo ($v["liu_tel"]); ?></td>
	    <td><?php echo ($v["liu_other"]); ?></td>
	    <td><?php echo ($v["liu_content"]); ?></td>
	    <td><?php echo ($v["liu_city"]); ?></td>
	    <td><?php echo ($v["liu_crtime"]); ?></td>
	    <td id="read<?php echo ($v["liu_id"]); ?>">
	     	<?php if($v['liu_read']==0): ?><button style="color: red" class="read" value="<?php echo ($v["liu_id"]); ?>">阅读</button>
	     	<?php else: ?>
	     		已阅<?php endif; ?>
	    </td>
	    <td>
	     	<a class="delete" bs="<?php echo ($v["liu_id"]); ?>">删除</a>
	    </td>
	</tr><?php endforeach; endif; ?>
</table>
<div><?php echo ($show); ?></div>

    </div>
</div>
<div id="foot">
    <div>技术支持：济南荆棘鸟</div>
</div>
</body>
<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/Public/jquery-2.0.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//阅读处理
	$(".read").click(function(){
		var id=$(this).val();
		var td="#read"+id;
		$.ajax({
			url:"/index.php/admin/message/update",
            data:{liu_id:id},
            type:"POST",
            dataType:"JSON",
            success: function(data)
            {
            	if(data.status==1){ 
	                $(td).html("<span>已阅</span>");
	            }
            },

		});

	});

	//删除处理
	$(".delete").click(function(){
		var id=$(this).attr("bs");
		var tr=".row"+id;
		$.ajax({
			url:"/index.php/admin/message/delete",
            data:{liu_id:id},
            type:"POST",
            dataType:"JSON",
            success: function(data)
            {
            	if(data.status==1){ 
	                $(tr).remove();
	            }
            },

		});

	});

})
</script>

</html>