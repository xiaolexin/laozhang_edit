<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/default/member/other_login.html";i:1530848282;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $seo['title']; ?></title>
	<link rel="stylesheet" type="text/css" href="__JASON__/static/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="__JASON__/static/css/style.css">
	<script type="text/javascript" src="__JASON__/static/layui/layui.js"></script>
	<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="<?php echo $settings['qq_app_id']; ?>" data-redirecturi="http://<?php echo \think\Request::instance()->host(); ?><?php echo url('member/other_login'); ?>" charset="utf-8"></script>
</head>
<body>
<span id="qqLoginBtn"></span>
<script type="text/javascript">
layui.use(['layer'], function(){
	var layer = layui.layer,
	$ = layui.jquery;
	var	is_login = QC.Login.check();
	if(is_login){
		var access_token = '';
		var openid = '';
		QC.Login.getMe(function(openId, accessToken){
			access_token = accessToken;
			openid = openId;
		});
		var paras = {oauth_consumer_key:'<?php echo $settings[qq_app_id]; ?>',access_token:access_token,openid:openid};
		QC.api('get_user_info', paras).success(function(s){
			//成功回调，通过s.data获取OpenAPI的返回数据
			var	param ={openid:openid,nickname:s.data.nickname,avatar:s.data.figureurl_qq_2,sex:s.data.gender};
			$.post('<?php echo url("member/do_other_login"); ?>',param,function(res){
		      if(res.code == 200){
		      	QC.Login.signOut()//注销qq登陆
		        $('#fixbar_avatar',window.parent.document).empty().append('<img src="'+res.data.avatar+'"><div class="fixbar_member_info trans_3">'+res.data.nickname+'<span id="logout_btn">退了</span></div>').show();
		        layer.msg(res.msg, {icon: 1, anim: 6, time: 1000});
				var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
				parent.layer.close(index); //再执行关闭
		      }else{
		        layer.msg(res.msg, {icon: 2, anim: 6, time: 1000});
		      }
		    });
			
			//alert("获取用户信息成功！当前用户昵称为："+s.data.nickname);
		});

	}else{ 
		self.location.href='https://graph.qq.com/oauth2.0/authorize?client_id=<?php echo $settings[qq_app_id]; ?>&response_type=token&scope=all&redirect_uri='+encodeURIComponent(self.location.href);
	}
});
	
</script>
</body>
</html>