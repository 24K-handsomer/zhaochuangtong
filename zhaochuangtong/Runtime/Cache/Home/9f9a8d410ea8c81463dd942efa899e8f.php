<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href='<?php echo CSS_URL ?>projectcard.css' />
	<title><?php echo ($project_01["pro_title"]); ?></title>
</head>
<body>
<div id="content">
	<div class="logo">
		<img src="<?php echo ($project_01["pro_logo"]); ?>" />
	</div>
	
	<div id="title"><?php echo ($project_01["pro_title"]); ?></div>

	<div id="instr">
	
		<div id="instr-left">
			<div>
				<img src="<?php echo ($project_01["pro_twobar"]); ?>" />
			</div>
		</div>
		<div id="instr-right">
			<div id="info">
				<ul>
					<li><span class="glyphicon glyphicon-user"></span><span>联系人:<?php echo ($project_01["pro_usname"]); ?></span></li>
					<li><span class="glyphicon glyphicon-earphone"></span><span>电话:<?php echo ($project_01["pro_com_tel"]); ?></span></li>
					<li><span class="glyphicon glyphicon-envelope"></span><span>微信号:<?php echo ($project_01["pro_weixin"]); ?></span></li>
					<li><span class="glyphicon glyphicon-map-marker"></span><span>地址:<?php echo ($project_01["pro_com_addr"]); ?></span></li>
				</ul>
			</div>
		</div>

	</div>
	
	<div class="line"></div>
	
	<div>
		<ul id="myTab">
		    <li>
		        <a href="/index.php/home/project2/index/pro_id/<?php echo ($pro_id); ?>">项目简介</a>
		    </li>
		    <li><a href="/index.php/home/project3/index/pro_id/<?php echo ($pro_id); ?>">项目优势</a></li>
			<li><a href="/index.php/home/project4/index/pro_id/<?php echo ($pro_id); ?>">项目展示</a></li>
			<li><a href="/index.php/home/project5/index/pro_id/<?php echo ($pro_id); ?>">扶持政策</a></li>
		</ul>
	</div>
	<div class="tab-pane">
		<?php echo ($project_01["pro_shortdescription"]); ?>
	</div>
	<div class="share">
		<div><a data-toggle="modal" data-target="#myModal">分享收藏微名片</a></div>
		<div>点亮你的生活</div>
	</div>
	<!-- 模态框（Modal） -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">请点击右上角选择“分享到朋友圈”或“收藏”等功能</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal -->
	</div>
</div>	
<div class="nav-d">
	<div class="nav-d-div">
		<a href="javascript:returnPreviousPage()">
		<div><img src="<?php echo IMG_URL ?>project1/return.png" /></div>
		<div>返回</div>
		</a>
	</div>
	<div class="nav-d-div">
		<a href="tel:<?php echo ($project_01["pro_com_tel"]); ?>">
		<div><img src="<?php echo IMG_URL ?>project1/phone.png" /></div>
		<div>拨打电话</div>
		</a>
	</div>
	<div class="nav-d-div">
		<a href="/index.php/home/messpro/index/pro_id/<?php echo ($pro_id); ?>">
		<div><img src="<?php echo IMG_URL ?>project1/message.png" /></div>
		<div>在线留言</div>
		</a>
	</div>
	<div class="nav-d-div">
		<a href="/index.php/home/projectcard/index/pro_id/<?php echo ($pro_id); ?>">
		<div><img src="<?php echo IMG_URL ?>contact/card.png" /></div>
		<div>微名片</div>
		</a>
	</div>
	<div class="btn-group dropup nav-d-div">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<div><img src="<?php echo IMG_URL ?>project1/navigation.png" /></div>
		    <div>导航</div>
		</button>
		<ul class="dropdown-menu dropdown-menu-right" role="menu">
			<li><a href="/index.php/home/index/index">招创通</a></li>
			<li><a href="/index.php/home/project1/index/pro_id/<?php echo ($pro_id); ?>">项目首页</a></li>
			<li><a href="/index.php/home/project2/index/pro_id/<?php echo ($pro_id); ?>">项目介绍</a></li>
			<li><a href="/index.php/home/project3/index/pro_id/<?php echo ($pro_id); ?>">项目优势</a></li>
			<li><a href="/index.php/home/project4/index/pro_id/<?php echo ($pro_id); ?>">项目展示</a></li>
			<li><a href="/index.php/home/project5/index/pro_id/<?php echo ($pro_id); ?>">扶持服务</a></li>
			<li><a href="/index.php/home/contact/index/pro_id/<?php echo ($pro_id); ?>">联系方式</a></li>
		</ul>
	</div>
	<style type="text/css">
		.btn-group{
			padding-left: 4%;
		}
		.btn-group>button{
			padding: 0;
            border: 0px;
		}
		.dropdown-menu{
		}
		.dropdown-menu>li>a{
			text-align: center;
			padding-left: 0px;
			padding-right: 0px;
		}
	</style>
</div>
</body>
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function returnPreviousPage() 
	{ 
	    window.history.go(-1);    
	}
</script>
</html>