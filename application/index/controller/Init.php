<?php
namespace app\index\controller;

use think\Controller;

/**
* index模块基础类
*/
class Init extends Controller
{
	
	function _initialize()
	{
		parent::_initialize();
		error_reporting(0);
		if(!session('?member')){ session('member.id',0);}
		$this->settings = cache('settings');
		$this->categorys = cache('categorys');
		$this->models = cache('models');
		$search_model_ids = explode(',', $this->settings['search_model']);
		foreach ($search_model_ids as $model_id) {
			$search_model_select[$model_id] = $this->models[$model_id];
		}
		$this->seo['title'] = $this->settings['site_name'].$this->settings['title_add'];
		$this->seo['keywords'] = $this->settings['keywords'];
		$this->seo['description'] = $this->settings['description'];
		// 发送基本信息
		$this->assign(['settings' => $this->settings,'categorys' => $this->categorys,'search_model_select'=>$search_model_select,'seo' => $this->seo]);
	}


}