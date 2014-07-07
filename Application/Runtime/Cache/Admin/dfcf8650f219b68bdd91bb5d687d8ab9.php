<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html">
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="/~xiaobing/think/Public/css/reset.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="/~xiaobing/think/Public/css/style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="/~xiaobing/think/Public/css/invalid.css" type="text/css" media="screen" />	
        <link rel="stylesheet" href="/~xiaobing/think/Public/css/blue.css" type="text/css" media="screen" />
        <!--[if lte IE 7]>
            <link rel="stylesheet" href="/~xiaobing/think/Public/css/ie.css" type="text/css" media="screen" />
        <![endif]-->
    </head>
  
	<body id="login">
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<h1>Administrator Pannel</h1>
				<img id="logo" src="/~xiaobing/think/Public/images/logo.png" alt="Admin logo" />
			</div> 
			
			<div id="login-content">
				<form action="<?php echo U('Account/login');?>" method="post">
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="uname"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="pwd"/>
					</p>
                    <!--
                    <p>
                        <input type="text" name="verify" class='text-input' style="width:80px;float:right;margin-right:50px;"/>
                        <img width="80" height="25" src="<?php echo U('verify');?>" id="getCode" style="float:right;margin-right:10px;"/>
                    </p>
                    -->
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Login" name="submit" style="width:100px;"/>
					</p>
					
				</form>
			</div> 
		</div>

        <script type="text/javascript" src="/~xiaobing/think/Public/js/jquery-1.7.2.min.js"></script>
		<!--[if IE 6]>
			<script type="text/javascript" src="/~xiaobing/think/Public/js/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
  </body>
    
  
</html>