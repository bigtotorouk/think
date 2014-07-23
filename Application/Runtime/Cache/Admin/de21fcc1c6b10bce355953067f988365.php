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

<link rel="stylesheet" type="text/css" href="/~xiaobing/think/Public/uploadify/uploadify.css">
<style type="text/css">
    #load_images{
        width:90%;
        text-align:left;
        margin-top:15px;
    }
    #load_images img{
        border:1px solid #cccccc;
        width:114px;
        height:114px;
    }
    #load_images .img_box{
        float:left;
        margin:5px;
    }
    #load_images a.del_img{
        display:inline-block;
        width:20px;
        font-size:12px;
        text-align:left;
        padding:2px 5px;
        color:#0055FF;
    }
</style>
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
                    <h3>Add Product Images</h3>
                </div>

                <div class="content-box-content">
                    <form id="upload_images_form">
                        <fieldset>
                            <p>
                                <label>Product Model</label>
                                <select name="model" class="medium-input" id="model">
                                    <?php echo ($model_list); ?>
                                </select>
                            </p>
                            <div class="clear"></div>
                            <br>
                            <div>
                                <input id="file_upload" name="file_upload" type="file" multiple="true"/>
                                <div id="file_queue"></div>
                            </div>
                            <br>

                            <div class="clear"></div>
                            <p>
                                <a id="btn_cancel" class="button" href="###">Cancel</a>
                            </p>
                            <p>
                                <a id="btn_upload" class="button" href="###" style="width:120px;font-size:18px!important;line-height:40px;font-weight:bold;text-align:center;">Upload</a>
                            </p>

                        </fieldset>
                    </form>
                    <div class="clear"></div>
                    <div id="load_images"></div>
                    <div class="clear"></div>
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

<script src="/~xiaobing/think/Public/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function del_img(mid,me){
        var $this = $(me);
        var del_url = "<?php echo U('Index/del_img');?>&mid="+mid;
        $.get(del_url,function(ret){
            if(ret=='ok'){
                $this.parent().remove();
            }else{
                alert("Something wrong,please try again!");
            }
        });
    }
    $(document).ready(function() {
        var $file_upload = $('#file_upload');
        var uploader = "<?php echo U('Upload/upload_images');?>";
        
        $("#model").change(function(){
            $("#load_images").empty();
        });
        
        
        $file_upload.uploadify({
            "swf": "/~xiaobing/think/Public/uploadify/uploadify.swf",
            "queueID": "file_queue",
            "multi": true,
            "queueSizeLimit": 25,
            "fileExt": '*.jpg;*.gif,*.png',
            "sizeLimit": '2048000', //最大允许的文件大小为2M
            "method": 'post',
            "auto": false,
            "overrideEvents": ["onDialogClose"],
            "onSelect":function(){
                var model = $.trim($("#model").val());
                if(model==""){
                    alert("Please select model first!");
                    return false;
                }
            },
            "onFallback": function() {
                alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
            },
            "onUploadSuccess": function(file, data, response) {
                if(data.length>5){
                    var ret_data = JSON.parse(data);
                    var $load_images=$("#load_images");
                    var tmp_str = '<div class="img_box"><img src="'+ret_data.img_url+'"><a href="###" onclick="del_img('+ret_data.mid+',this);return false;">del</a></div>';
                    $load_images.append(tmp_str);
                }
                
            }
        });

        $("#btn_upload").click(function() {
            var file_queue = $("#file_queue").text();
            if ($.trim(file_queue) == "") {
                alert("Please select images to upload！");
                return false;
            }
            
            var model = $.trim($("#model").val());
            if (model == "") {
                alert("Please select model!");
                return false;
            }
            
            uploader += "&model="+model;
            $file_upload.uploadify("settings","uploader",uploader);
            $file_upload.uploadify("upload", "*");
            return false;
        });

        $("#btn_cancel").click(function() {
            $file_upload.uploadify("cancel", "*");
            return false;
        });


    });
</script>
</body>

</html>