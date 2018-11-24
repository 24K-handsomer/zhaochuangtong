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
        
<h1>项目列表</h1>
<div>共有项目：<?php echo ($count); ?>条</div>
<table width="94%" border="1" cellpadding="0" cellspacing="0" id="tab">
	<tr id="first-tr">
	     <td>项目号</td>
	     <td>项目名称</td>
	     <td>项目人</td>
	     <td>缩略图</td>
	     <td>项目简介</td>
	     <td>发布时间</td>
	     <td>浏览量</td>
	     <td>操作</td>
	</tr>
	<?php if(is_array($Project_01)): foreach($Project_01 as $key=>$v): ?><tr id="second-tr">
	     <td id="id"><?php echo ($v["pro_id"]); ?></td>
	     <td id="title"><?php echo ($v["pro_title"]); ?></td>
	     <td id="usname"><?php echo ($v["pro_usname"]); ?></td>
	     <td id="miximg"><img src="<?php echo ($v["pro_miximg"]); ?>" /></td>
	     <td id="shortdes"><?php echo ($v["pro_shortdescription"]); ?></td>
	     <td id="crtime"><?php echo ($v["pro_crtime"]); ?></td>
	     <td id="views"><?php echo ($v["pro_views"]); ?></td>
	     <td id="caozuo">
	     	<a href="/index.php/admin/Updateproject/index/pro_id/<?php echo ($v["pro_id"]); ?>">修改</a>
	     	<a href="/index.php/admin/Deleteproject/index/pro_id/<?php echo ($v["pro_id"]); ?>">删除</a>
	     	<a href="http://www.zct365.com/index.php/Home/project1/index/pro_id/<?php echo ($v["pro_id"]); ?>" target="_blank">预览</a>
	     	<a href="/index.php/admin/Message/index/pro_id/<?php echo ($v["pro_id"]); ?>/pro_title/<?php echo ($v["pro_title"]); ?>">留言</a>
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

</html>