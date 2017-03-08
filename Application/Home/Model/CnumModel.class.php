<?php
namespace Home\Model;
use Think\Model;
class CnumModel extends Model 
{
	protected $insertFields = array('tids','cnums','star1','star2','star3','star4','star5','starttotal');
	protected $updateFields = array('cnums','star1','star2','star3','star4','star5','starttotal');
	
	// 获取信誉度排行
	function getS1($limit) {
		$array = $this->alias('a')
		->field('a.*,b.name')
		->join('LEFT JOIN __TEAM__ b ON a.tids=b.id')
		->order('a.s1 desc')->limit($limit)
		->select();
		return $array;
	}
	// 获取提款速度排行
	function getS2($limit) {
		$array = $this->alias('a')
		->field('a.*,b.name')
		->join('LEFT JOIN __TEAM__ b ON a.tids=b.id')
		->order('a.s2 desc')->limit($limit)
		->select();
		return $array;
	}
	// 获取彩种丰富排行
	function getS3($limit) {
		$array = $this->alias('a')
		->field('a.*,b.name')
		->join('LEFT JOIN __TEAM__ b ON a.tids=b.id')
		->order('a.s3 desc')->limit($limit)
		->select();
		return $array;
	}
	// 获取玩法丰富排行
	function getS4($limit) {
		$array = $this->alias('a')
		->field('a.*,b.name')
		->join('LEFT JOIN __TEAM__ b ON a.tids=b.id')
		->order('a.s4 desc')->limit($limit)
		->select();
		return $array;
	}
	// 获取客服服务态度排行
	function getS5($limit) {
		$array = $this->alias('a')
		->field('a.*,b.name')
		->join('LEFT JOIN __TEAM__ b ON a.tids=b.id')
		->order('a.s5 desc')->limit($limit)
		->select();
		return $array;
	}
	// 获取人气排行
	function getS6($limit) {
		$array = $this->alias('a')
		->field('a.*,b.name')
		->join('LEFT JOIN __TEAM__ b ON a.tids=b.id')
		->order('a.s6 desc')->limit($limit)
		->select();
		return $array;
	}
	
	
}