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
	
	

	
	
	function getStars($id) {
		$stars = $this->getComments($id);
		$i = 0;
		foreach ($stars as $k => $v) {
			$i++;
			$star['star1'] += (float)$v['star1'];
			$star['star2'] += (float)$v['star2'];
			$star['star3'] += (float)$v['star3'];
			$star['star4'] += (float)$v['star4'];
			$star['star5'] += (float)$v['star5'];
		}
		$star['star1'] = $star['star1']/$i;
		$star['star2'] = $star['star2']/$i;
		$star['star3'] = $star['star3']/$i;
		$star['star4'] = $star['star4']/$i;
		$star['star5'] = $star['star5']/$i;
		$star['s1'] = 145*$star['star1']/5;
		$star['s2'] = 145*$star['star2']/5;
		$star['s3'] = 145*$star['star3']/5;
		$star['s4'] = 145*$star['star4']/5;
		$star['s5'] = 145*$star['star5']/5;
		$star['total'] = ($star['star1']+$star['star2']+$star['star3']+$star['star4']+$star['star5'])/5;
		$star['s6'] = 145*$star['total']/5;
		$star['ctotal'] = $i;
		$star['star1'] = round($star['star1'],2);
		$star['star2'] = round($star['star2'],2);
		$star['star3'] = round($star['star3'],2);
		$star['star4'] = round($star['star4'],2);
		$star['star5'] = round($star['star5'],2);
		$star['total'] = round($star['total'],2);
 		return $star;

	}
	
}