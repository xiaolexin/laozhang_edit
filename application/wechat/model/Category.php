<?php
namespace app\wechat\model;

use think\Model;

/**
* 
*/
class Category extends Model
{
	public $categorys;

	function initialize()
	{
		parent::initialize();
		if(!cache('categorys')){$this->cache_category();}
		$this->categorys = cache('categorys');
	}
	function get_categorys(){
		$categorys = $this->categorys;
		foreach ($categorys as $k => $v) { 
			if($k == 0){ continue; }
			if($k == 2 ||$k == 3||/*$k == 7||*/$k == 13||$k == 14){ unset($categorys[$k]); }
			$categorys[$k]['url'] = $this->get_category_url_by_id($k,$categorys);
			if($k == 7){$categorys[$k]['url']='/feedback/index?category_id='.$k;}
		}
		return $categorys;
	}
	//根据id获取栏目url
	function get_category_url_by_id($category_id,$categorys){
		if(!$categorys){ $categorys = $this->categorys;}
		if($categorys[$category_id]['is_cover'] == 0 && isset($categorys[0][$category_id])){
			return $this->get_category_url_by_id($categorys[0][$category_id][0],$categorys);
		}
		if($categorys[$category_id]['model_id'] != 1){
			return '/'.$categorys[$category_id]["model_code"].'/list?category_id='.$category_id;
		}
		return '/'.$categorys[$category_id]["model_code"].'/index?category_id='.$category_id;
	}


}