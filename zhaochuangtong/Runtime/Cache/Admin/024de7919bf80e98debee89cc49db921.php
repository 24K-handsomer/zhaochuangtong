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
    
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>addproject.css" />

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
        
<h1>暂时不显示用户</h1>

    </div>
</div>
<div id="foot">
    <div>技术支持：济南荆棘鸟</div>
</div>
</body>
<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

</script>

</html>