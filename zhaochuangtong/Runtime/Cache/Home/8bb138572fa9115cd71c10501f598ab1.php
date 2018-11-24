<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title><?php echo ($project_01["pro_title"]); ?>在线留言</title>
	<link rel="stylesheet" href="<?php echo CSS_URL ?>message.css" />
	<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	
</head>
<body>
	<div id="first">
<!--message-->
        <form action="/index.php/home/messpro/addmess" method="post">
        <input type="hidden" value="<?php echo ($pro_id); ?>" name="pro_id">
        <input type="hidden" value="<?php echo ($project_01["pro_title"]); ?>" name="pro_title">
		<div class="message">
			<h2>
				<img src="<?php echo IMG_URL ?>message/message.png" />
			</h2>
			<p>在线留言， 客服将在第一时间联系您。</p>
			<div class="box">
				<img src="<?php echo IMG_URL ?>message/name.png" />
				<input type="text" name="name" placeholder="请输入您的名字" />
			</div>
			<div class="box">
				<img src="<?php echo IMG_URL ?>message/contact.png" />
				<input type="text" name="tel" placeholder="请输入您的手机电话" />
			</div>
			<div class="box">
				<img src="<?php echo IMG_URL ?>message/mailbox.png" />
				<input type="text" name="other" placeholder="请输入您的其他联系方式(邮箱/QQ微信)" />
			</div>
			<div class="box">
				<img src="<?php echo IMG_URL ?>message/city.png" />
				<input type="text" name="city" placeholder="请输入您的所在城市" />
			</div>
		</div>
<!--content-->
		<div class="content">
			<h2>
				<img src="<?php echo IMG_URL ?>message/content.png" />
			</h2>
			<div class="choice">		
				<label><input type="checkbox" name="message[]" value="A．我对项目感兴趣，请联系我。" />A．我对项目感兴趣，请联系我。</label>
			</div>
			<div class="choice">
				<label><input type="checkbox" name="message[]" value="B．我有意向加盟，请问加盟费用是多少？" />B．我有意向加盟，请问加盟费用是多少？</label>	
			</div>
			<div class="choice">				
				<label><input type="checkbox" name="message[]" value="C．我要加盟，请来电告知加盟细节。" />C．我要加盟，请来电告知加盟细节。</label>
			</div>
			<div class="choice">				
				<label><input type="checkbox" name="message[]" value="D．请问具体加盟流程是什么样的？" />D．请问具体加盟流程是什么样的？</label>
			</div>
			<div class="choice">				
				<label><input type="checkbox" name="message[]" value="E．我所在地区是否有加盟商？" />E．我所在地区是否有加盟商？</label>
			</div>
			<div class="choice">				
				<label><input type="checkbox" name="message[]" value="F．合作后，你们会提供哪些服务？" />F．合作后，你们会提供哪些服务？</label>
			</div>
		</div>
		<div id="sub"><input type="submit" id="submit" value="在线提交" /></div>
		</form>
	</div>
<!--copyright-->
	<div class="copyright">技术支持 招创通 山东荆棘鸟网络科技有限公司</div>
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