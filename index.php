<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',false);

// 定义应用目录
define('APP_PATH','./zhaochuangtong/');

//给系统静态资源文件请求路径设置常量
//Home前台
define('CSS_URL','/Public/Home/css/');
define('JS_URL','/Public/Home/js/');
define('IMG_URL','/Public/Home/imges/');
//Admin后台
define('ADMIN_CSS_URL','/Public/Admin/css/');
define('ADMIN_JS_URL','/Public/Admin/js/');
define('ADMIN_IMG_URL','/Public/Admin/imges/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单