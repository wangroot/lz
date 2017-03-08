<?php
namespace Home\Model;
use Think\Model;
class CommentsModel extends Model 
{
	protected $insertFields = array('tid','star1','star2','star3','star4','star5','cname','csubject','ccontent','ip');
	protected $updateFields = array('cnum');
	
	

	function getComment($id){
	
		/** 取数据 **/
		$data = $this->where(array('tid' => array('EQ', $id),))
		->select();
		return $data;
		
		
	}
	function getComments($id,$perPage){
		
		
		/*************** 翻页 ****************/
		// 取出总的记录数
		$count = $this->where(array('tid' => array('EQ', $id),))->count();
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
		if ($count <= $perPage){
			$data = $this->where(array('tid' => array('EQ', $id),))
			->select();
		}else {
			$data = $this->where(array('tid' => array('EQ', $id),))
			->limit($pageObj->firstRow.','.$pageObj->listRows)
			->select();
		}

		
// 		/****/
// 		$data = $this->alias('a')
// 		->field('a.*,b.cnums')
// 		->join('LEFT JOIN __CNUM__ b ON a.tid=b.tids')
// 		->where(array('a.tid' => array('EQ', $id),))
// 		->limit($pageObj->firstRow.','.$pageObj->listRows)
// 		->select();

		/****/
		        
		
		
		return array(
			'data' => $data,  // 数据
			'page' => $pageString,  // 翻页字符串
			'count' => $count,
		);
	}
	
	

	
	
	function getStars($id) {
		$stars = $this->getComments($id);
		$i = 0;
		foreach ($stars['data'] as $k => $v) {
			$i++;
			$star['star1'] += (float)$v['star1'];
			$star['star2'] += (float)$v['star2'];
			$star['star3'] += (float)$v['star3'];
			$star['star4'] += (float)$v['star4'];
			$star['star5'] += (float)$v['star5'];
		}
		//var_dump($i);die;
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
		//var_dump($star);die;
 		return $star;

	}
	
}