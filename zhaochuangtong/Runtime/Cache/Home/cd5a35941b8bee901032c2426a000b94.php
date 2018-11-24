<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href='<?php echo CSS_URL ?>news.css' />
	<title></title>
</head>
<body>
	<!--第一行logo和搜索框-->
	<div id="first">
		<div><img src='<?php echo IMG_URL ?>project/logo.png' /></div>
		<form class="form-inline" action="/index.php/home/news/index" method="post" >
			<label>搜索</label>
			<div>
				<input type="text" class="form-control" name="text" />
			</div>
			<button type="submit" class="btn btn-default">
				<img src='<?php echo IMG_URL ?>project/magnifier.png' />
			</button>
		</form>
	</div>
	
	<!--第二行：分类搜索-->
	<div id="second">
		<ul class="nav nav-pills nav-justified">
		  <li>
			  <a href="/index.php/home/news/index/class/1">
			  	<div><img src='<?php echo IMG_URL ?>information/dynamic.png' /></div>
			  	<div>企业动态</div>
			  </a>
		  </li>
		  <li>
			  <a href="/index.php/home/news/index/class/2">
			  	<div><img src='<?php echo IMG_URL ?>information/story.png' /></div>
			  	<div>创业行情</div>
			  </a>
		  </li>
		  <li>
			  <a href="/index.php/home/news/index/class/3">
			  	<div><img src='<?php echo IMG_URL ?>information/policy.png' /></div>
			  	<div>政策法规</div>
			  </a>
		  </li>
		  <li>
			  <a href="/index.php/home/news/index/class/4">
			  	<div><img src='<?php echo IMG_URL ?>information/guidance.png' /></div>
			  	<div>加盟指导</div>
			  </a>
		  </li>
		  <li>
			  <a href="/index.php/home/news/index/class/5">
			  	<div><img src='<?php echo IMG_URL ?>information/investment.png' /></div>
			  	<div>投资行情</div>
			  </a>
		  </li>
	  </ul>
	</div>
	
	<!--第三行-->
	<div id="three">
		<ul id="myTab" class="nav nav-tabs">
		    <li class="active">
			    <a href="#ios" data-toggle="tab">
			    	<span>最新话题</span>
			    	<span class="glyphicon glyphicon-time"></span>
			    </a>
		    </li>
		    <li>
			    <a href="#java"  data-toggle="tab">
			    	<span>最热话题</span>
			    	<span class="glyphicon glyphicon-fire"></span>
			    </a>
		    </li>
        </ul>
        <!--最新话题显示-->
        <div id="myTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="ios">
				<div id="project-thr">

			   <!-- <div id="project-thr-fir">
						<div><img src='<?php echo IMG_URL ?>information/topic1.png' /></div>
						<div>
							<div class="name1">移动视频红利期已过，社交真的是移动视频的归宿？</div>
							<div class="content">辣么唇冒菜采用多种中草药熬制而成，辅以自有调料及常用调料，天然绿色，汤香扑鼻。是真正绿色、健康的冒菜，健脾康胃，不上火，不败胃，老少皆宜。</div>
						    <div><span>曾小贤</span>&nbsp;&nbsp;<span>2016-12-15 13:50</span></div>
						</div>
					</div> -->
					
					<?php if(is_array($new)): foreach($new as $key=>$v): ?><a href="/index.php/home/Article/index/ne_id/<?php echo ($v["ne_id"]); ?>">
					<div id="project-thr-fir">
						<div><img src='<?php echo ($v["ne_imgsrc"]); ?>' /></div>
						<div>
							<div class="name1"><?php echo ($v["ne_title"]); ?></div>
							<div class="content"><?php echo ($v["ne_abstract"]); ?></div>
						    <div><span><?php echo ($v["ne_author"]); ?></span>&nbsp;&nbsp;<span><?php echo ($v["ne_crtime"]); ?></span></div>
						</div>
					</div>
					</a><?php endforeach; endif; ?>

				</div>
				
			</div>
			<div class="tab-pane fade" id="java">
				<div id="project-thr">

			   <!-- <div id="project-thr-fir">
						<div><img src='<?php echo IMG_URL ?>information/topic1.png' /></div>
						<div>
							<div class="name1">移动视频红利期已过，社交真的是移动视频的归宿？</div>
							<div class="content">辣么唇冒菜采用多种中草药熬制而成，辅以自有调料及常用调料，天然绿色，汤香扑鼻。是真正绿色、健康的冒菜，健脾康胃，不上火，不败胃，老少皆宜。</div>
						    <div><span>曾小贤</span>&nbsp;&nbsp;<span>2016-12-15 13:50</span></div>
						</div>
					</div> -->
					
					<?php if(is_array($hot)): foreach($hot as $key=>$v): ?><div id="project-thr-fir">
						<div><img src='<?php echo ($v["ne_imgsrc"]); ?>' /></div>
						<div>
							<div class="name1"><a href="/index.php/home/Article/index/ne_id/<?php echo ($v["ne_id"]); ?>"><?php echo ($v["ne_title"]); ?></a></div>
							<div class="content"><?php echo ($v["ne_abstract"]); ?></div>
						    <div><span><?php echo ($v["ne_author"]); ?></span>&nbsp;&nbsp;<span><?php echo ($v["ne_crtime"]); ?></span></div>
						</div>
					</div><?php endforeach; endif; ?>
					
				</div>
			</div>
			
	    </div>
	</div>
	
	<!--尾部：版权、底部导航-->
	<div id="copyright">
		©2013-2016招创通&nbsp;&nbsp;技术支持&nbsp;荆棘鸟网络
	</div>
	
	<div class="mui-bar-footer">
		<ul class="mui-table-view">
		    <li class="mui-table-view-cell">
		      <a href="#">
		      	<div><img src="<?php echo IMG_URL ?>index/feilei.png" /></div>
		      	<div>分类</div>
		      </a>
		    </li>
		    
		    <li class="mui-table-view-cell">
		      <a href="#">
		      	<div><img src='<?php echo IMG_URL ?>index/121403.png' /></div>
		      	<div>电话</div>
		      </a>
		    </li>
		    
		    <li class="mui-table-view-cell">
		      <a href="#">
		      	<div><img src='<?php echo IMG_URL ?>index/logo.png' /></div>
		      </a>
		    </li>
		    
		    <li class="mui-table-view-cell">
		      <a href="#">
		      	<div><img src='<?php echo IMG_URL ?>index/QQ.png' /></div>
		      	<div>QQ</div>
		      </a>
		    </li>
		    
		    <li class="mui-table-view-cell">
		      <a href="#">
		      	<div><img src='<?php echo IMG_URL ?>index/join.png' /></div>
		      	<div>加入我们</div>
		      </a>
		    </li>
	    </ul>
	</div>
</body>
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</html>