<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title><?php echo ($news["ne_title"]); ?></title>
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo CSS_URL ?>article.css" />
</head>
<body>
	<div id="zhuti">
		<div id="title"><?php echo ($news["ne_title"]); ?></div>
		<div id="au-ti">
			<div id="author"><?php echo ($news["ne_author"]); ?></div>
			<div id="time"><?php echo ($news["ne_crtime"]); ?></div>
		</div>
		<div id="content">
			<?php echo ($news["ne_content"]); ?>
		</div>
		<div id="vi-sha">
			<div id="view">阅读：<?php echo ($news["ne_view"]); ?></div>
			<div id="share">
				<a data-toggle="modal" data-target="#myModal">分享<span class="glyphicon glyphicon-share"></span></a>
			</div>
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
</body>
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</html>