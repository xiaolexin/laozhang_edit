<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:38:"./template/default/feedback/index.html";i:1534201924;s:37:"./template/default/public/header.html";i:1532046846;s:41:"./template/default/public/breadcrumb.html";i:1526267826;s:37:"./template/default/public/footer.html";i:1532165972;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title id="title" title="<?php echo $seo['title']; ?>"><?php echo $seo['title']; ?></title>
	<meta name="keywords" content="<?php echo $seo['keywords']; ?>">
	<meta name="description" content="<?php echo $seo['description']; ?>">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="baidu-site-verification" content="AxkUy98NH3" />
	<meta name="baidu-site-verification" content="FvkTaYT6be" />
	<meta name="360-site-verification" content="b255c71ea0af038d3577f05ab2b9e7ea" />
	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<?php echo $settings['head_html']; ?>
	<link rel="stylesheet" type="text/css" href="__JASON__/static/layui/css/layui.css">
	<link rel="stylesheet" href="__JASON__/static/css/calender.css?v=<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="__JASON__/static/css/style.css?v=<?php echo time();?>">
	<link href="https://cdn.bootcss.com/limonte-sweetalert2/7.21.1/sweetalert2.css" rel="stylesheet">
	<link rel="stylesheet" href="https://at.alicdn.com/t/font_234130_nem7eskcrkpdgqfr.css">
	<!-- <link rel="stylesheet" href="__JASON__/static/css/skplayer.css?v=<?php echo time();?>"> -->
	<script src="https://use.fontawesome.com/e4bec7758e.js"></script>
	<script src="__JASON__/static/js/jquery.min.js"></script>
	<script src="__JASON__/static/js/jquery.lazyload.min.js?v=1.9.1"></script>
	<script type="text/javascript" src="__JASON__/static/layui/layui.js"></script>
	<!-- <script type="text/javascript" src="__JASON__/static/js/skplayer.min.js"></script> -->
	<script type="text/javascript" src="__JASON__/static/js/calendar.js?v=<?php echo time();?>"></script>
	<?php echo $settings['site_statistice']; ?>
	<!--SyntaxHighlighter的基本脚本-->
    <link href="/static/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/static/ueditor/syntaxhighlighter/scripts/shCore.js"></script>
	<!--SyntaxHighlighter的对各个编程语言解析的脚本-->
	<script type="text/javascript" src="/static/ueditor/syntaxhighlighter/scripts/shBrushJScript.js"></script>
	<script type="text/javascript" src="/static/ueditor/syntaxhighlighter/scripts/shBrushPhp.js"></script>
	<script type="text/javascript" src="/static/ueditor/syntaxhighlighter/scripts/shBrushJava.js"></script>
	<script type="text/javascript" src="/static/ueditor/syntaxhighlighter/scripts/shBrushPython.js"></script>
	<script type="text/javascript" src="/static/ueditor/syntaxhighlighter/scripts/shBrushSql.js"></script>
	<!--所使用的SyntaxHighlighter样式-->
	<link type="text/css" rel="stylesheet" href="/static/ueditor/syntaxhighlighter/styles/shCoreEclipse.css"/>
	<!--初始化SyntaxHighlighter的必须代码，必须放在head中，引入文件之后-->
	<script type="text/javascript">SyntaxHighlighter.all();</script>
	<!--用于消除右上角的广告-->
	<script type="text/javascript">SyntaxHighlighter.defaults['toolbar'] = false;</script>
	<script src="https://cdn.bootcss.com/limonte-sweetalert2/7.21.1/sweetalert2.all.js"></script>
	<script>
		document.addEventListener('visibilitychange',function(){ //浏览器切换事件
    		if(document.visibilityState=='hidden') { //状态判断
        		//normal_title=document.title;
        			document.title = '哎呦，你又去哪里浪了，回来啊！！'; 
    		}else {
        			document.title = $("#title").attr("title");
    		}
		});
	</script>
	<script>(function(){var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?ba7cb826604b61e2d46f71d918f1a449":"https://jspassport.ssl.qhimg.com/11.0.1.js?ba7cb826604b61e2d46f71d918f1a449";document.write('<script src="' + src + '" id="sozz"><\/script>');})();</script>
</head>
<body>
<!-- 头部 开始 -->
<div class="layui-header header trans_3">
<div class="main index_main">
	<a class="logo" href="/"><img class="layui-anim layui-anim-scale" src="<?php if($settings['logo']): ?><?php echo $settings['logo']; else: ?>__JASON__/static/images/logo-header.png<?php endif; ?>" alt="<?php echo $seo['title']; ?>"></a>

	<ul class="layui-nav" lay-filter="top_nav">
	  	<li class="layui-nav-item home" class="layui-anim layui-anim-upbit"><a href="/">首页</a></li>
	  	<?php if(is_array($categorys[0][0]) || $categorys[0][0] instanceof \think\Collection): $i = 0; $__LIST__ = $categorys[0][0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($categorys[$vo]['is_menu'] == 1): ?>
	  	<li class="layui-nav-item">
	  		<a href="<?php echo $categorys[$vo]['url']; ?>" class="layui-anim layui-anim-upbit"><?php echo $categorys[$vo]['name']; ?></a>
	  		<?php if(!(empty($categorys[0][$vo]) || ($categorys[0][$vo] instanceof \think\Collection && $categorys[0][$vo]->isEmpty()))): ?>
			<dl class="layui-nav-child"> <!-- 二级菜单 -->
				<?php if(is_array($categorys[0][$vo]) || $categorys[0][$vo] instanceof \think\Collection): $i = 0; $__LIST__ = $categorys[0][$vo];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($categorys[$v]['is_menu'] == 1): ?>
		      	<dd><a href="<?php echo $categorys[$v]['url']; ?>"><?php echo $categorys[$v]['name']; ?></a></dd>
		      	<?php endif; endforeach; endif; else: echo "" ;endif; ?>
		    </dl>
			<?php endif; ?>
	  	</li>
	  	<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<div class="title"><?php echo $settings['site_name']; ?></div>
	<form action="<?php echo url('index/search/search'); ?>" mothod="post" class="head_search trans_3 layui-form">
	  <div class="layui-form-item trans_3">
	  	<span class="close trans_3"><i class="layui-icon">&#x1006;</i> </span>
	    <div class="layui-input-inline trans_3">
	      <select name="model_id">
	      <?php if(is_array($search_model_select) || $search_model_select instanceof \think\Collection): $i = 0; $__LIST__ = $search_model_select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	      	<option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == 2): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
	      <?php endforeach; endif; else: echo "" ;endif; ?>
	      </select>
	    </div>
	    <input type="text" name="keywords" placeholder="搜索" autocomplete="off" class="search_input trans_3">
	    <button class="layui-btn" lay-submit="" style="display: none;"></button>
	  </div>
		
	</form>
</div>
</div>
<div class="header_back"></div>
<!-- 头部 结束 -->
<!-- 左边导航 开始 -->
<div class="layui-side layui-bg-black left_nav trans_2">
  <div class="layui-side-scroll">
	<ul class="layui-nav layui-nav-tree"  lay-filter="left_nav">
		<li class="layui-nav-item home"><a href="/">首页</a></li>
	  	<?php if(is_array($categorys[0][0]) || $categorys[0][0] instanceof \think\Collection): $i = 0; $__LIST__ = $categorys[0][0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($categorys[$vo]['is_menu'] == 1): ?>
	  	<li class="layui-nav-item">
	  		<?php if(!(empty($categorys[0][$vo]) || ($categorys[0][$vo] instanceof \think\Collection && $categorys[0][$vo]->isEmpty()))): ?>
	  		<a href="javascript:void();"><?php echo $categorys[$vo]['name']; ?></a>
			<dl class="layui-nav-child"> <!-- 二级菜单 -->
				<?php if(is_array($categorys[0][$vo]) || $categorys[0][$vo] instanceof \think\Collection): $i = 0; $__LIST__ = $categorys[0][$vo];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($categorys[$v]['is_menu'] == 1): ?>
		      	<dd><a href="<?php echo $categorys[$v]['url']; ?>"><?php echo $categorys[$v]['name']; ?></a></dd>
		      	<?php endif; endforeach; endif; else: echo "" ;endif; ?>
		    </dl>
		    <?php else: ?>
		    <a href="<?php echo $categorys[$vo]['url']; ?>"><?php echo $categorys[$vo]['name']; ?></a>
			<?php endif; ?>
	  	</li>
	  	<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</ul>
  </div>
</div>
<div class="left_nav_mask"></div>
<div class="left_nav_btn"><i class="layui-icon">&#xe602;</i></div>
<!-- 左边导航 结束 -->
<!-- 面包屑导航 开始 -->
<div class="main breadcrumb_nav trans_3">
	<span class="layui-breadcrumb" lay-separator="—">
	  <?php echo $breadcrumb; ?>
	</span>
</div>
<!-- 面包屑导航 结束 -->
<div class="main">
	<div class="page_left">	
	<form class="layui-form feedback-form">
		<div class="layui-form-item">
			    <div class="">
			    	<textarea name="content" lay-verify="layedit" autocomplete="off" placeholder="我要留言" class="llayui-textarea layui-hide" id="content"></textarea>
			    </div>
		    	
		      	<input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="您的昵称(默认游客身份)(本站每个IP每天最多评论5条数据，请勿灌水！)." class="layui-input">
		      	<input type="text" name="website" lay-verify="title" autocomplete="off" placeholder="您的博客站(选填)(点击评论昵称可跳至贵站哦)" class="layui-input">
		    	
		</div>
		<div class="layui-form-item">
		    <button class="layui-btn" lay-submit="" lay-filter="feedback">提交留言</button>
		     <!-- <bottom class="layui-btn layui-btn-warm" id="music">听听音乐</bottom> -->
		</div>
	</form>
	<ul class="feedback_list"> 
	<?php if(is_array($lists) || $lists instanceof \think\Collection): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li>
			<div class="feedback_member">
			 	<?php if($vo['member_id'] == 0): ?>
			 	<div class="avatar"><?php $info=rand(01,15);?><img src="__JASON__/static/images/tourist/<?php echo $info; ?>.jpg" alt="" style="border-radius:50%" class="layui-anim layui-anim-rotate" ></div>
			 	<div class="name_date"><p class="name"><a href="<?php if($vo['website']!=null){echo $vo['website'];}else{echo 'javascript:;';}?>" target="_blank"><?php if($vo['username']!=null){echo $vo['username'];}else{echo "游客朋友No.".rand(0000,9999);}?></a> <span style="font-size: 11px;color:gray;"><?php echo useragent($vo['useragent']);?></span></p>
			 	<?php else: ?>
			 	<div class="avatar"><img src="<?php echo $vo['avatar']; ?>" alt="<?php echo $vo['nickname']; ?>" style="border-radius:50%"> </div>
				<div class="name_date"><p class="name"><?php echo $vo['nickname']; ?> <img src="__JASON__/static/images/qq.png?v=" alt="" style="width:6%" title="QQ一键登陆用户"> <span style="font-size: 11px;color:gray;"><?php echo useragent($vo['useragent']);?></span></p>
			 	<?php endif; ?>
			 	<p class="date"><?php echo format_datetime($vo['create_time']); ?></p></div>
			 	<div class="feedback_content"><?php echo html_entity_decode($vo['content']) ?></div>
				<div style="color:gray;font-size:10px;margin-top:-6px;"><img src="__JASON__/static/images/address.png" alt="" style="width:1.5%"><?php echo $vo['ip_addr']; ?></div>
			</div>
			<?php if($vo['reply']): ?>
			<div class="feedback_member feedback_reply">
			 	<div class="avatar"><img src="<?php if($vo['admin_avatar']): ?><?php echo $vo['admin_avatar']; else: ?>__JASON__/static/images/default.png<?php endif; ?>" alt="管理员头像" style="border-radius:25%"></div>
				<div class="name_date"><p class="name"><?php if($vo['admin_name']): ?><?php echo $vo['admin_name']; else: ?>Jason<?php endif; ?></p>
				<img src="__JASON__/static/images/renzheng.png" alt="" style="width:3%;" title="站长认证">
					<img src="__JASON__/static/images/admincard.png" alt="" style="width:3%;" title="实名认证"> 
			 	<p class="date"><?php echo format_datetime($vo['reply_time']); ?></p></div>
			 	<div class="feedback_content reply_content">回复：<?php echo $vo['reply']; ?></div>
			</div>
			<?php endif; ?>
		</li>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<div id="page"><?php echo $page; ?></div>
	</div>
	<div class="page_right">
		<?php if($settings['stationmaster_name']||$settings['stationmaster_occupation']||$settings['stationmaster_motto']||$settings['stationmaster_qqnet']): ?>
		<div class="new_list">
			<h3>博主信息</h3>
			<ol class="page_right_list trans_3" style="margin-bottom:3px;">
				<?php if($settings['stationmaster_name']): ?><li>姓名：<?php echo $settings['stationmaster_name']; ?></li><?php endif; if($settings['stationmaster_occupation']): ?><li>职业：<?php echo $settings['stationmaster_occupation']; ?></li><?php endif; if($settings['stationmaster_motto']): ?><li>座右铭：<?php echo $settings['stationmaster_motto']; ?></li><?php endif; ?>
			</ol>
		</div>
		<?php endif; ?>
		<!-- <div class="new_list" style="margin-bottom: 3px;">
			<h3><i class="fa fa-music" aria-hidden="true" style="color:red;"></i> 音乐你的生活</h3>
        	<div style="height:100px;width:100%;background-color:#fff;">
				
        	</div>
		</div> -->
		<div class="new_list" style="margin-bottom: 20px;">
			<h3><i class="fa fa-comments" aria-hidden="true"></i> 闲聊么-快来试试点击一下头像吧 <i class="fa fa-hand-o-down" aria-hidden="true" style="font-size:18px;color:red;font-weight:bold;"></i></h3>
        	<div style="height:400px;width:100%;background-color:#fff;">
				<iframe src="http://neweb.top/chat.php" height="400" width="100%" frameborder="0"></iframe>
        	</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
layui.use(['form', 'layedit'], function(){
	var form = layui.form(),
  	layer = layui.layer,
  	layedit = layui.layedit,
  	$ = layui.jquery;

  //创建一个编辑器
  var content = layedit.build('content',{
  	tool: ['face', '|', 'left', 'center', 'right','strong','del','italic','underline','link','unlink']
    ,height: 150
  });
  //表单验证
  form.verify({
    //编辑器数据同步
    layedit: function(value){
      layedit.sync(content);
      if(layedit.getText(content).length < 10){
        return '您的字数不够十个字，也太糊弄我了吧...';
      }
    }

  });
  //监听提交
  form.on('submit(feedback)', function(data){
  	var is_login = false;
  	$.ajax({
  		type:"POST",  
        async:false,  //设置同步请求  
        url:'<?php echo url("member/is_login"); ?>',  
        dataType:'json',  
        success:function(data) {
        	if(data.code == 200){
		        is_login = true;
		    }
        }
  	});
  	if(!is_login){
  		var login_iframe = layer.open({
	        type: 2,
	        title: 'QQ一键登陆',
	        shadeClose: true,
	        shade: false,
	        maxmin: false, //开启最大化最小化按钮
	        offset: '150px',
	        area: ['300px', ''],
	        anim: 1,
	        content: '<?php echo url("index/member/other_login"); ?>',
	
	    	<?php if($settings['guest_feedback'] == 1): ?>
	    	btn: ['不登录留言'], //按钮
	  	 	yes:function(){
			  	layer.close(login_iframe);
			  	loading = layer.load(2, {
			      shade: [0.2,'#000'] //0.2透明度的白色背景
			    });
			    var param = data.field;
			    $.post('<?php echo url("feedback/add"); ?>',param,function(data){
			      if(data.code == 200){
			       layer.close(loading);
			        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
			          location.reload();//do something
			        });
			      }else if(data.code==201){
			      	layer.close(loading);
			        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
			      }else{
			        layer.close(loading);
			        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
			      }
			    });
			}
  	 		<?php endif; ?>
		});
  	}else{
  		loading = layer.load(2, {
	      shade: [0.2,'#000'] //0.2透明度的白色背景
	    });
	    var param = data.field;
	    $.post('<?php echo url("feedback/add"); ?>',param,function(data){
	      if(data.code == 200){
	        layer.close(loading);
	        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
	          location.reload();//do something
	        });
	      }else if(data.code==201){
			      	layer.close(loading);
			        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
		  }else{
	        layer.close(loading);
	        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
	      }
	    });
  	}
    return false;
  });

});
</script>
<!-- 底部 开始 --> 
<ul class="layui-fixbar">
	
	<li id="fixbar_avatar" class="<?php if(\think\Session::get('member.id') == 0): ?>hidden<?php endif; ?>"><img src="<?php echo \think\Session::get('member')['avatar']; ?>" alt="头像"><div class="fixbar_member_info trans_3"><?php echo \think\Session::get('member')['nickname']; ?><span id="logout_btn">退出</span></div></li>
	<li class="layui-icon layui-fixbar-top" id="to_top">&#xe604;</li>
</ul>

<div class="layui-footer footer">
  <div>
    <p><?php echo $settings['copy']; ?> <a href="/Sitemap.xml">网站地图</a> <a class="icp" target="_blank" href="http://www.miitbeian.gov.cn"><?php echo $settings['icp']; ?></a> </p>
    <p style="margin-top:5px;"><a href="http://wpa.qq.com/msgrd?v=3&uin=996265368&site=qq&menu=yes" target="_blank" title="点击若不跳转自动添加好友，请手动添加QQ：996265368">QQ</a>&nbsp;<a href="javascript:;" target="_blank" title="同QQ,996265368">微信</a>&nbsp;<a href="https://weibo.com/DJJ518516" target="_blank">微博</a><a href="http://webscan.360.cn/index/checkwebsite/url/neweb.top" name="f0ba2bf6aeef009ae19ffd5fb6c65b8a" target="_blank">360网站安全检测平台</a> <a href="http://ce.baidu.com/index/guance?start_url=neweb.top" target="_blank">百度云观测安全监测</a> <script src="https://s13.cnzz.com/z_stat.php?id=1272913964&web_id=1272913964" language="JavaScript"></script></p><canvas></canvas>
  </div>
</div>
<!-- 底部 结束 -->
<script type="text/javascript" charset="utf-8">
$(function() {
    $("img.lazy").lazyload({effect: "fadeIn"});
});
</script>
<script type="text/javascript">
layui.use(['form','element'], function(){
	var layer = layui.layer,
	form = layui.form(),
	element = layui.element(),
	$ = layui.jquery;

	//左边导航点击显示
	$('.left_nav_btn').click(function(){
		$('.left_nav_mask').show();
		$('.left_nav').addClass('left_nav_show');
	});
	//左边导航点击消失
	$('.left_nav_mask').click(function(){
		$('.left_nav').removeClass('left_nav_show');
		$('.left_nav_mask').hide();
	});

	//搜索框特效
	$('.header .head_search .search_input').focus(function(){
		$('.header .head_search').addClass('focus');
		$(this).attr('placeholder','输入关键词搜索');
	});
	/*$(document).click(function(){
		$('.header .head_search').removeClass('focus');
		$('.header .head_search .search_input').attr('placeholder','搜索');
	});
	$('.header .head_search').click(function(e){
		$(this).addClass('focus');
		e.stopPropagation(); 
	});*/
	$('.header .head_search .close').click(function(){
		$('.header .head_search').removeClass('focus');
		$('.header .head_search .search_input').attr('placeholder','搜索');
	});
	//底部会员头像
	$('#fixbar_avatar').click(function(){
		if($('#fixbar_avatar .fixbar_member_info').is(":visible")){
			$('#fixbar_avatar .fixbar_member_info').hide().css({'opacity':0,'right':'70px'});
	        
	    }else{
	        $('#fixbar_avatar .fixbar_member_info').show().animate({'opacity':1,'right':'50px'},50);
	    }
	});
	$('#fixbar_avatar').hover(function(){
		$('#fixbar_avatar .fixbar_member_info').show().animate({'opacity':1,'right':'50px'},50);
	},function(){
		$('#fixbar_avatar .fixbar_member_info').hide().css({'opacity':0,'right':'70px'});
	});
	//退出登陆 
	$("#fixbar_avatar").on('click','#logout_btn',function() {
		loading = layer.load(2, {
	      shade: [0.2,'#000'] //0.2透明度的白色背景
	    });
	    $.post('<?php echo url("member/logout"); ?>',function(data){
	      if(data.code == 200){
	        layer.close(loading);
	        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
	        	$('#fixbar_avatar').hide()
	          //location.reload();//do something
	        });
	      }else{
	        layer.close(loading);
	        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
	      }
	    });
    });
	//回到顶部
	$("#to_top").click(function() {
      $("html,body").animate({scrollTop:0}, 200);
    });
    $(document).scroll(function(){
    	var	scroll_top = $(document).scrollTop();
    	if(scroll_top > 500){
    		$("#to_top").show();
    	}else{
    		$("#to_top").hide(); 
    	}
    }); 
    //底部版权始终在底部 
    var win_height = $(window).height();
    var body_height = $('body').height();
    var footer_height = $('.footer').height();
    if(body_height - win_height < 0){
    	$('.footer').addClass('footer_fixed');
    }

    $(".picture_list_container li").mousemove(function(){
        $(".picture_list_container li .pic .fade").eq($(this).index()).addClass("fade_block").siblings().removeClass("fade_block")
    }).mouseout(function(){
        $(".picture_list_container li .pic .fade").removeClass("fade_block")
    })
});
document.addEventListener('touchmove', function (e) {  
                e.preventDefault()  
            })  
            var c = document.getElementsByTagName('canvas')[0],  
                x = c.getContext('2d'),  
                pr = window.devicePixelRatio || 1,  
                w = window.innerWidth,  
                h = window.innerHeight,  
                f = 90,  
                q,  
                m = Math,  
                r = 0,  
                u = m.PI*2,  
                v = m.cos,  
                z = m.random  
            c.width = w*pr  
            c.height = h*pr  
            x.scale(pr, pr)  
            x.globalAlpha = 0.6  
            function i(){  
                x.clearRect(0,0,w,h)  
                q=[{x:0,y:h*.7+f},{x:0,y:h*.7-f}]  
                while(q[1].x<w+f) d(q[0], q[1])  
            }  
            function d(i,j){     
                x.beginPath()  
                x.moveTo(i.x, i.y)  
                x.lineTo(j.x, j.y)  
                var k = j.x + (z()*2-0.25)*f,  
                    n = y(j.y)  
                x.lineTo(k, n)  
                x.closePath()  
                r-=u/-50  
                x.fillStyle = '#'+(v(r)*127+128<<16 | v(r+u/3)*127+128<<8 | v(r+u/3*2)*127+128).toString(16)  
                x.fill()  
                q[0] = q[1]  
                q[1] = {x:k,y:n}  
            }  
            function y(p){  
                var t = p + (z()*2-1.1)*f  
                return (t>h||t<0) ? y(p) : t  
            }  
            document.onclick = i  
            document.ontouchstart = i  
            i()  
</script>

</body>
</html>