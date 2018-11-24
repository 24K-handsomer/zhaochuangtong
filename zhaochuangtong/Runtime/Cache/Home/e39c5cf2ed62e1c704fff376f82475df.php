<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title><?php echo ($project_01["pro_title"]); ?></title>
<link rel="stylesheet" href="<?php echo CSS_URL ?>project3.css" />
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

</head>
	<body>
<!--banner-->
		<div class="banner">
			<img src="<?php echo ($project_02["pro_navimg"]); ?>" />
		</div>
<!--content-->
        <div class="title">
			<img src="<?php echo IMG_URL ?>project3/advantage.png" />
		</div>
		<div class="content">
			<?php echo ($project_02["pro_advantage"]); ?>
			
		</div>
<!--copyright-->
		<div class="copyright">
			<span>技术支持 招创通 山东荆棘鸟网络科技有限公司</span>
		</div>
<!--nav-d-->
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