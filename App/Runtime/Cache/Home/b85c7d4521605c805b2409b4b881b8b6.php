<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>异清轩博客管理系统</title>
<link rel="stylesheet" type="text/css" href="/xiangmu2/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/xiangmu2/Public/css/style.css">
<link rel="stylesheet" type="text/css" href="/xiangmu2/Public/css/login.css">
<link rel="apple-touch-icon-precomposed" href="/xiangmu2/Public/images/icon/icon.png">
<link rel="shortcut icon" href="/xiangmu2/Public/images/icon/favicon.ico">
<script src="/xiangmu2/Public/js/jquery-2.1.4.min.js"></script>
<!--[if gte IE 9]>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/html5shiv.min.js" type="text/javascript"></script>
  <script src="js/respond.min.js" type="text/javascript"></script>
  <script src="js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>

<body class="user-select">
<div class="container">
  <div class="siteIcon"><img src="/xiangmu2/Public/images/icon/icon.png" alt="" data-toggle="tooltip" data-placement="top" draggable="false" /></div>
  <form action="<?php echo U('login');?>" method="post" autocomplete="off" class="form-signin">
    <h2 class="form-signin-heading">管理员登录</h2>
    <input type="text" id="userName" name="userName" class="form-control" placeholder="请输入用户名" required autofocus autocomplete="off" maxlength="20">
    <input style="border-radius: 0px;" type="password" name="userPwd" class="form-control userPwd" placeholder="请输入密码" required autocomplete="off" maxlength="20">
    <input type="text" id="userPwd" name="code" style="width: 150px;display: inline-block;border-top: 0px;border-radius: 0 0 0 4px;" class="form-control" placeholder="请输入验证码" maxlength="20">
    <img id="coad" src="<?php echo U('Event/code');?>" style="width: 150.5px;display: inline-block;height: 44px;margin:-5px 0px 0px -5px;border-radius: 0 0 5px 0;"/>
    <a><input class="btn btn-lg btn-primary btn-block" type="submit" value="登录" id="signinSubmit"/></a>
  </form>
  <div class="footer">
    <p style="color: red"><?php echo ($error); ?></p>
  </div>
</div>
<script src="/xiangmu2/Public/js/bootstrap.min.js"></script> 
<script>
$('[data-toggle="tooltip"]').tooltip();
window.oncontextmenu = function(){
	//return false;
};
$('.siteIcon img').click(function(){
	window.location.reload();
});
var src = $("#coad").attr("src");
$("#coad").click(function () {
    $(this).attr("src",src+"?t="+Math.random());
});
</script>
</body>
</html>