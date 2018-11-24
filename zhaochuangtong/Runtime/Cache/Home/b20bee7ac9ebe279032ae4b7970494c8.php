<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title><?php echo ($project_01["pro_title"]); ?></title>
	<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>project1.css"/>
</head>
<body>
<!--banner-->
	<div class="banner">
		<img src="<?php echo ($project_02["pro_navimg"]); ?>" />
	</div>
<!--nav-wrap-->
	<div class="nav-wrap">
		
		<div class="nav-div">
			<a href="/index.php/home/project2/index/pro_id/<?php echo ($pro_id); ?>">
			<div><img src="<?php echo IMG_URL ?>project1/introduce.png" /></div>
			<div class="item">项目介绍</div>
			</a>
		</div>
		<div class="nav-div">
			<a href="/index.php/home/project3/index/pro_id/<?php echo ($pro_id); ?>">
			<div><img src="<?php echo IMG_URL ?>project1/advantage.png" /></div>
			<div class="item">项目优势</div>
			</a>
		</div>
		<div class="nav-div">
			<a href="/index.php/home/project4/index/pro_id/<?php echo ($pro_id); ?>">
			<div><img src="<?php echo IMG_URL ?>project1/exhibition.png" /></div>
			<div class="item">产品展示</div>
			</a>
		</div>
		<div class="nav-div">
			<a href="/index.php/home/project5/index/pro_id/<?php echo ($pro_id); ?>">
			<div><img src="<?php echo IMG_URL ?>project1/support.png" /></div>
			<div class="item">扶持服务</div>
			</a>
		</div>
		
	</div>
<!--introduce-->
	<div class="introduce">
		<div>
			<a class="introduce-wrap" href="/index.php/home/project2/index/pro_id/<?php echo ($pro_id); ?>">
				<div>项目介绍</div>
				<div><img src="<?php echo IMG_URL ?>project1/arrow.png" /></div>
			</a>
		</div>
		<div>推荐您感兴趣的各类招商项目</div>
		<div class="shortdescr">
			<div><img src="<?php echo ($project_01["pro_miximg"]); ?>" /></div>
			<div><?php echo ($project_01["pro_title"]); ?></div>
			<p><?php echo ($project_01["pro_shortdescription"]); ?></p>
		</div>
	</div>
<!--information-wrap-->
	<div id="project">
		<div id="project-fir">
			<div><a href="#/ne_userid/<?php echo ($project_01["pro_userid"]); ?>">最新资讯</a></div>
			<div><img src="<?php echo IMG_URL ?>index/port.png" /></div>
		</div>
		<div id="project-sec">推荐您感兴趣的各类资讯消息</div>
		<div id="project-thr">
			
	   <!-- <div id="project-thr-fir">
				<div><img src='<?php echo IMG_URL ?>project1/information1.png' /></div>
				<div>
					<div><a href="#">移动视频红利已过</a></div>
					<div class="content">辣么唇冒菜采用多种中草药熬制而成，辅以自有调料及常用调料，天然绿色，汤香扑鼻。是真正绿色、健康的冒菜，健脾康胃，不上火，不败胃，老少皆宜。</div>
					<div><span>曾小贤</span>&nbsp;&nbsp;<span>2016-12-15 13:50</span></div>
				</div>
			</div> -->
			
			<?php if(is_array($news)): foreach($news as $key=>$v): ?><a href="/index.php/home/article/index/ne_id/<?php echo ($v["ne_id"]); ?>">
			<div id="project-thr-fir">
				<div><img src="<?php echo ($v["ne_imgsrc"]); ?>" /></div>
				<div>
					<div class="name1"><?php echo ($v["ne_title"]); ?></div>
					<div class="content"><?php echo ($v["ne_abstract"]); ?></div>
					<div><span><?php echo ($v["ne_author"]); ?></span>&nbsp;&nbsp;<span><?php echo ($v["ne_crtime"]); ?></span></div>
				</div>
			</div>
			</a><?php endforeach; endif; ?>
			
		</div>
	</div>
<!--copyright-->
	<div id="copyright">
		©2013-2016招创通&nbsp;&nbsp;技术支持&nbsp;荆棘鸟网络
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