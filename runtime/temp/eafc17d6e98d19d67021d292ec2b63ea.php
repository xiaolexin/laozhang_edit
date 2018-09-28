<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"/home/wwwroot/default/myblog/application/admin/view/public/login.tpl.php";i:1531289545;s:72:"/home/wwwroot/default/myblog/application/admin/view/public/toper.tpl.php";i:1531233332;s:73:"/home/wwwroot/default/myblog/application/admin/view/public/footer.tpl.php";i:1526267826;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>JasonBlog-后台管理中心</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <link rel="stylesheet" href="/static/css/global.css?v=<?php echo time();?>">
    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <!-- 为使用方便，直接使用jquery.js库 -->
	
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
	
    <!-- 引入封装了failback的接口--initGeetest -->
	
    <script src="http://static.geetest.com/static/tools/gt.js"></script>
</head>
<body>
<style type="text/css">html{background:url(/static/images/<?php echo "0".rand(1,5).".jpg";?>);background-size: 100%;background-repeat: no-repeat;}</style>
<div class="login_page">
<div style="margin-bottom:25px;">
    <img src="/static/images/login.png">
</div>
    <form class="layui-form popup">
        <div class="layui-form-item">
            <div class="layui-input-inline input-custom-width">
                <input type="text" name="username" lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input" value="admin">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-inline input-custom-width">
                <input type="password" name="password" lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
            </div>
        </div>
		<div class="layui-form-item">
            <div class="layui-input-inline input-custom-width">
                <input type="text" name="captcha" lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                <div class="captcha"><img src="<?php echo captcha_src(); ?>" alt="captche" title='点击切换' onclick="this.src='/captcha?id='+Math.random()"></div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-inline input-custom-width">
              <button class="layui-btn input-custom-width" lay-submit="" lay-filter="login" id="embed-submit">立即登陆</button>
            </div>
        </div>
    </form>
</div>
<!-- <script>
    var handlerEmbed = function (captchaObj) {
        $("#embed-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
    };
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "<?php echo url('http://neweb.top/index/jiyan/startcaptchaservlet'); ?>?t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
            }, handlerEmbed);
        }
    });
</script> -->
<script type="text/javascript">
layui.use('form',function(){
    var form = layui.form()
    ,jq = layui.jquery;

    //监听提交
      form.on('submit(login)', function(data){
        loading = layer.load(2, {
          shade: [0.2,'#000'] //0.2透明度的白色背景
        });
        var param = data.field;
        jq.post('<?php echo url("login/login"); ?>',param,function(data){
          if(data.code == 200){
            layer.close(loading);
            layer.msg(data.msg, {icon: 1, time: 1000}, function(){
              location.href = '<?php echo url("index/index"); ?>';
            });
          }else{
            layer.close(loading);
            layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
            jq('.captcha img').attr('src','/captcha?id='+Math.random());
          }
        });
        return false;
      });
});
</script>
</body>
</html>