<?php
	// 绑定Admin模块到当前入口文件
	// define('BIND_MODULE','Admin');
	// define('BUILD_CONTROLLER_LIST','Index,User,Menu');
	// define('BUILD_MODEL_LIST','User,Menu');
	header("Content-Type:text/html;charset=utf-8"); 
	define('APP_PATH','./Application/');
	define('APP_DEBUG','true');
	require './ThinkPHP/ThinkPHP/ThinkPHP.php';
?>