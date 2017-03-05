<?php
namespace Home\Model;
use Think\Model;
class TeamModel extends Model 
{
	protected $insertFields = array('name','contact','type','minimum_recharge','minimum_withdrawal','introduction','promote');
	protected $updateFields = array('promote','id','star1','star2','star3','star4','star5','cname','csubject','ccontent');
	
	
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
	function getPromote(){
		$array = $this->where(array(
				'promote' => array('EQ', '1'),
		))
		->select();
		return $array;
	}
	function getPage($id){
		$array = $this->where(array(
				'id' => array('EQ', $id),
		))
		->select();
		return $array;
	}
	
	


	
	function getData(){

		
	}
	/************************************ 其他方法 ********************************************/
}