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
        <link rel="stylesheet" href="/~xiaobing/think/Public/css/jbox.css" type="text/css" media="screen" />
    </head>


<body>
    <div id="body-wrapper"> 
        <div id="sidebar">
    <div id="sidebar-wrapper">
        <h1 id="sidebar-title"><a href="#">Admin</a></h1>
        <a href="#"><img id="logo" src="/~xiaobing/think/Public/images/logo.png" alt="logo" /></a>
        <div id="profile-links">
            Hello, <a href="<?php echo U('Index/admin_profile');?>" title="修改密码"><?php echo (session('username')); ?></a>
            |
            <a href="<?php echo U('Index/logout');?>" title="Sign Out">Logout</a>
        </div>        
        <ul id="main-nav"> 
            <li> 
                <a href="javascript:void(0);" class="nav-top-item" id="menu-1">
                    Product Management
                </a>
                <ul>
                    <li><a id="menu-1-1" href="<?php echo U('Index/index');?>">Product list</a></li>
                    <li><a id="menu-1-2" href="<?php echo U('Index/add_prd');?>">Add product</a></li>
                    <li><a id="menu-1-3" href="<?php echo U('Index/add_images');?>">Upload product images</a></li>
                </ul>
            </li>
            <li> 
                <a href="javascript:void(0);" class="nav-top-item" id="menu-2">
                    User Profile
                </a>
                <ul>
                    <li><a id="menu-2-1" href="#">Change Password</a></li>
                </ul>
            </li>
            <li> 
                <a href="javascript:void(0);" class="nav-top-item" id="menu-3">
                    System Config
                </a>
                <ul>
                    <li><a id="menu-3-1" href="<?php echo U('Index/edit_data_json');?>">Edit Base Data</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>


        <div id="main-content"> 
            <div class="content-box">
                <div class="content-box-header">
                    <h3>Product List</h3>
                </div>

                <div class="content-box-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Pid</th>
                                    <th>Model</th>
                                    <th>Input Voltage</th>
                                    <th>Lamp Shape</th>
                                    <th>Base</th>
                                    <th>Power</th>
                                    <th>Color Temperature</th>
                                    <th></th>
                                </tr>

                            </thead>
                            <tbody>
                            <?php if(is_array($prd_list)): $i = 0; $__LIST__ = $prd_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($vo["pid"]); ?></td>
                                    <td><a href="<?php echo U('Index/list_img');?>&model=<?php echo ($vo["model"]); ?>"><?php echo ($vo["model"]); ?></a></td>
                                    <td><?php echo ($vo["input_voltage"]); ?></td>
                                    <td><?php echo ($vo["lamp_shape"]); ?></td>
                                    <td><?php echo ($vo["base"]); ?></td>
                                    <td><?php echo ($vo["power"]); ?></td>
                                    <td><?php echo ($vo["color_temperature"]); ?></td>
                                    <td>
                                        <a href="<?php echo U('Index/edit_prd');?>&pid=<?php echo ($vo["pid"]); ?>" title="Edit"><img src="/~xiaobing/think/Public/images/icons/pencil.png" alt="Edit" /></a>
                                        <a href="<?php echo U('Index/del_prd');?>&pid=<?php echo ($vo["pid"]); ?>" title="Delete"><img src="/~xiaobing/think/Public/images/icons/cross.png" alt="Delete" /></a> 
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" style="text-align:right;padding-top:20px;">
                                        <?php echo ($page); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div> 
        </div> 
    </div>

<!-- jQuery -->
<script type="text/javascript" src="/~xiaobing/think/Public/js/jquery-1.7.2.min.js"></script>

<!--[if IE 6]>
    <script type="text/javascript" src="/~xiaobing/think/Public/js/DD_belatedPNG_0.0.7a.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.png_bg, img, li');
    </script>
<![endif]-->
<script type="text/javascript" src="/~xiaobing/think/Public/js/jquery.jBox-2.3.min.js"></script>
<script type="text/javascript" src="/~xiaobing/think/Public/js/jquery.jBox-zh-CN.js"></script>

<script type="text/javascript">
    var current_menu_id = "<?php echo ($menu_id); ?>";
    $(document).ready(function(){
        var current_menu = $("#"+current_menu_id);
        current_menu.addClass("current");
    });
    
</script>


</body>

</html>