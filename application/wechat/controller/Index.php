<?php
namespace app\wechat\controller;

/**
* 首页类
*/
class Index extends Init
{
	
	function _initialize()
	{
		parent::_initialize();
		$this->picture_model = model('common/picture');
		$this->page_model = model('common/page');
		$this->feedback_model = model('common/feedback');
	}

	/*function index(){
		$recommend_list = $this->
		->get_list(['is_recommend'=>'1'],'id desc',10); //推荐文章
		$new_list = $this->article_model->get_list([],['id desc'],10); //最新文章
		$hot_list = $this->article_model->get_list([],['hits desc'],10); //热门文章
		$links = json_decode($this->settings['links'],true); //友情链接
		return view('index',['links'=>$links,'recommend_list'=>$recommend_list,'new_list'=>$new_list,'hot_list'=>$hot_list]);
	}*/
	function settings(){
		$data = array();
		$settings = $this->settings;
		$data['site_name'] = $settings['site_name'];
		$data['logo'] = $settings['logo'];
		$data['stationmaster_name'] = $settings['stationmaster_name'];
		$data['stationmaster_occupation'] = $settings['stationmaster_occupation'];
		$data['stationmaster_motto'] = $settings['stationmaster_motto'];
		$data['stationmaster_qqnet'] = $settings['stationmaster_qqnet'];
		return json($data);
	}
	function categorys(){
		return json(model('wechat/category')->get_categorys());
	}
	function article_list(){
		$params = input('param.');
		$map = array();
		$order = 'id desc';
		$with_page = 2;
		$page_size = 0;
		if($params['category_id']){
			$map['category_id'] = $params['category_id'];
		}
		if($params['order']){
			$order = $params['order'];
		}
		if($params['with_page']){
			$with_page = $params['with_page'];
		}
		if($params['page_size']){
			$page_size = $params['page_size'];
		}
		$articles = $this->picture_model->get_list($map,$order,$page_size,$with_page);
		foreach ($articles['data'] as $k => $v) {
			if($v['image_url']){
				$articles['data'][$k]['thumb'] = thumb($v['image_url'],165,110,3);
			}
			$articles['data'][$k]['create_time'] = format_datetime($v['create_time']);
			$articles['data'][$k]['category_name'] = cache('categorys')[$v['category_id']]['name'];
		}
		return json($articles);
	}
	
	function article_detail(){
		$id = input('param.id');
		$article = $this->picture_model->get_details($id);
		$this->picture_model->where('id', $id)->setInc('hits'); //点击量自增一
		$article['hits'] = $article['hits']+1; //点击量加一
		$article['thumb'] = thumb($article['image'],165,110,3);
		$article['create_time'] = format_datetime($article['create_time']);
		$article['content'] = str_replace("/uploads","https://".$_SERVER['SERVER_NAME']."/uploads",$article['content']);
		$article['content'] = str_replace("<img","<img style='max-width:100%' ",$article['content']);
		return json($article);
	}
	function page_detail(){
		$category_id = input('param.category_id');
		$page = $this->page_model->get_details($category_id);
		$page['content'] = str_replace("/uploads","https://".$_SERVER['SERVER_NAME']."/uploads",$page['content']);
		$page['content'] = str_replace("<img","<img style='max-width:100%' ",$page['content']);
		return json($page);
	}
	function feedback_list(){
		$params = input('param.');
		$map = array();
		$order = 'id desc';
		$with_page = 2;
		$page_size = 0;
		if($params['order']){
			$order = $params['order'];
		}
		if($params['with_page']){
			$with_page = $params['with_page'];
		}
		if($params['page_size']){
			$page_size = $params['page_size'];
		}
		$feedbacks = $this->feedback_model->get_list($map,$order,$page_size,$with_page);
		foreach ($feedbacks['data'] as $k => $v) {
			$feedbacks['data'][$k]['create_time'] = format_datetime($v['create_time']);
			$feedbacks['data'][$k]['reply_time'] = format_datetime($v['reply_time']);
		}
		return json($feedbacks);
	}
	function feedback_add(){
		if(request()->isPost()){
			$params = input('post.');
			$params['create_time'] = date('Y-m-d H:i:s');
			if(empty($params['title'])){
				$params['title'] = mb_substr($params['content'], 0,40,'utf-8');
			}
			$result = model('common/feedback')->add($params);
			if($result){
				return json(array('code'=>200,'msg'=>'留言成功'));
			}else{
				return json(array('code'=>0,'msg'=>'留言失败'));
			}
		}
	}
}
