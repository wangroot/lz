<?php
namespace Home\Model;
use Think\Model;
class CommentsModel extends Model 
{
	protected $insertFields = array('tid','star1','star2','star3','star4','star5','cname','csubject','ccontent');
	//protected $updateFields = array('promote');
	
	
	
	function getComments($id){
		$array = $this->where(array(
				'tid' => array('EQ', $id),
		))
		->select();
		return $array;
	}
	
}