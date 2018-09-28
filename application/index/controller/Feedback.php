<?php
namespace app\index\controller;

/**
* 留言控制器
*/
class Feedback extends Init
{
	
	function _initialize()
	{
		parent::_initialize();
		$this->model = model('common/feedback');
	}

	function index(){
		$feedbacks = $this->model->get_list('','id desc',15,1);
		
		$breadcrumb = '<a href="/">首页</a><a><cite>留言</cite></a>';
		return view('index',['lists'=>$feedbacks,'page'=>$feedbacks->render(),'breadcrumb'=>$breadcrumb]);
	}

	function add(){
		if(request()->isPost()){
			$params = input('post.');
			if(isset($params['website'])){
				if(substr($params['website'],0,3)=="http"){
					$params['website']=$params['website'];
				}else if(substr($params['website'],0,4)=="https"){
					$params['website']=$params['website'];
				}else{
					$params['website']="http://".$params['website'];
				}
			}
			$params['member_id'] = session('member.id');
			if($this->settings['guest_feedback'] == 0 && $params['member_id'] ==0){
				return json(array('code'=>0,'msg'=>'请登陆后留言'));
			}
			$params['create_time'] = date('Y-m-d H:i:s');
			if(empty($params['title'])){
				$params['title'] = mb_substr(strip_tags($params['content']), 0,40,'utf-8');
			}
			
			$params['title'] = htmlentities($params['title']);
			$params['content'] = htmlentities($params['content']); 
			$data = array();
			$data['username']=$params['username'];
			$data['website']=htmlentities($params['website']);
			$data['title'] = $params['title'];
			$data['content'] = $params['content'];
			$data['member_id'] =$params['member_id'];
			$data['create_time'] = date('Y-m-d H:i:s');
			$data['useragent'] = $_SERVER['HTTP_USER_AGENT'];
			$data['ip_addr']=get_client_ip_addr();
			$ips=get_client_ip();
			$ip_key=date('ymd').'_'.$ips;
			$num=session($ip_key)?session($ip_key):0;
			if ($num<=5){
			    $num++;
			    session($ip_key,$num);
			}else{
			    return json(array('code'=>201,'msg'=>'当日留言次数达上限，请明日再试。'));
			    exit;
			}
		
			$data['ip']=$ips;
			
			$result = $this->model->add($data);
			if($result){
				return json(array('code'=>200,'msg'=>'留言成功'));
			}else{
				return json(array('code'=>0,'msg'=>'留言失败'));
			}
		}
		return view('add');
	}

}