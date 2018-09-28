<?php
namespace app\index\controller;

/**
* 首页类
*/
class Index extends Init
{
	
	function _initialize()
	{
		parent::_initialize();
		$this->picture_model = model('common/picture');
	}

	function index(){
		$recommend_list = $this->picture_model->get_list(['is_recommend'=>'1'],'is_top desc,id desc',12); //推荐文章
		$new_list = $this->picture_model->get_list([],['id desc'],8); //最新文章
		$hot_list = $this->picture_model->get_list([],['hits desc'],8); //热门文章
		$links = json_decode($this->settings['links'],true); //友情链接
		return view('index',['links'=>$links,'recommend_list'=>$recommend_list,'new_list'=>$new_list,'hot_list'=>$hot_list]);
	}
}
