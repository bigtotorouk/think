<?php 
	header("Content-Type:text/html;charset=utf-8"); 
	define('BIND_MODULE', 'Admin'); // 绑定Home模块到当前入口文件
	// define('BIND_CONTROLLER','User'); // 绑定Index控制器到当前入口文件
	define('APP_PATH','./Application/');
	define('APP_DEBUG','true');
	require './ThinkPHP/ThinkPHP/ThinkPHP.php';
 ?>