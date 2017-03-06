<?php
namespace Home\Model;
use Think\Model;
class TeamModel extends Model 
{
	protected $insertFields = array('name','contact','type','minimum_recharge','minimum_withdrawal','introduction','promote','cnum');
	protected $updateFields = array('promote','id','star1','star2','star3','star4','star5','cname','csubject','ccontent','cnum');
	
	
	// 添加前
	protected function _before_insert(&$data, $option)
	{
		$data['type'] = implode(',',$data['type']);
	}
// 	public $array= array();

// 	// 验证验证码是否正确
// 	function getdata(){
// 		$array = $this
// 		->field('month,num')
// 		->limit(5)
// 		->select();
// // 	    $month = $this->month;
// // 	    $num = $this->num;
// // 	    $array['month'] = $month;
// // 	    $array['num'] = $num;
// 	    return $array;
// 	}
	// 获取温度、湿度动态数据
	function get(){
		$array = $this->where(array(
 						'promote' => array('NEQ', '1'),
					))
		->select();
		return $array;
	}


	
	function getPData($perPage){
		
		/*************** 翻页 ****************/
		// 取出总的记录数
		$count = $this->where(array('promote' => array('EQ', '1'),))->count();
		// 生成翻页类的对象
		$pageObj = new \Think\Page($count, $perPage);
		// 设置样式
		$pageObj->lastSuffix=false;
		$pageObj->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		$pageObj->setConfig('prev','上一页');
		$pageObj->setConfig('next','下一页');
		$pageObj->setConfig('last','末页');
		$pageObj->setConfig('first','首页');
		$pageObj->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		// 生成页面下面显示的上一页、下一页的字符串
		$pageString = $pageObj->show();
		
		/** 取数据 **/
		if ($count < $perPage){
			$data = $this->where(array('promote' => array('EQ', '1'),))
			->select();
		}else {
			$data = $this->where(array('promote' => array('EQ', '1'),))
			->limit($pageObj->firstRow.','.$pageObj->listRows)
			->select();
		}
		/****/
		
		
		
		return array(
				'data' => $data,  // 数据
				'page' => $pageString,  // 翻页字符串
		);
	}
	

	
	
	function getPage($id){
		$array = $this->where(array(
				'id' => array('EQ', $id),
		))
		->select();
		return $array;
	}
	
	
	/************************************ 其他方法 ********************************************/
}