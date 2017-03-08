<?php
namespace Home\Controller;
use Think\Controller;
class TeamController extends Controller {


    public function adds(){  
    	
    	$team = D('Home/Team');
    	if(IS_POST)
    	{
    		if($team->create(I('post.'), 1))
    		{
    			if($id = $team->add())
    			{
    				//$this->redirect(U('Index/index'),'5','添加成功');
    				//$this->success('评论成功！', U('Team/page',array('id'=>'2')));
    				$this->success('提交成功，等待管理员审核', U('Home/Index/index'), 3);
    				exit;
    			}
    		}
    		$this->error($team->getError());
    	}
    	
    	
    	$this->display();

    }

    public function page(){

    	$id = I('get.id');
    	$team = D('Home/Team');
    	$array = $team->getPage($id);
    	$comments = D('Home/Comments');
    	$coms1 = $comments->getComments($id,5);
    	$cnum = D('Home/Cnum');
    	
 		
    	//初始化星星评论

    	//var_dump($com);die;
		
    	//var_dump($in);die;
    	
    	if(IS_POST)
    	{
    		
    		if($comments->create(I('post.'), 1))
    		{
    			$datata = $comments->create(I('post.'), 1);
    			$datata['ip'] = get_client_ip();
    			//var_dump($datata);die;
    			if($comments->add($datata))
    			{
    				/** 获取评论数**/

    				$com = $comments->getComment($_POST['tid']);
    				$coms2 = $comments->getComments($_POST['tid'],5);
    				$ccount = $coms2['count'];
    				$star = $comments->getStars($_POST['tid']);
    				$cnumss['cnums'] = $ccount;
    				$cnumss['star1'] = $star['star1'];
    				$cnumss['star2'] = $star['star2'];
    				$cnumss['star3'] = $star['star3'];
    				$cnumss['star4'] = $star['star4'];
    				$cnumss['star5'] = $star['star5'];
    				$cnumss['star5'] = $star['star5'];
    				$cnumss['starttotal'] = $star['total'];
    				$cnumss['s1'] = $star['s1'];
    				$cnumss['s2'] = $star['s2'];
    				$cnumss['s3'] = $star['s3'];
    				$cnumss['s4'] = $star['s4'];
    				$cnumss['s5'] = $star['s5'];
    				$cnumss['s6'] = $star['s6'];
    				//echo $ccount;
    				//var_dump($star);die;
    				//更新评论总数和星星总数表
    				$cnum->where(array('tids' => $_POST['tid']))->save($cnumss);
    				
    				/**  **/
    				$i = $com[0]['id'];
    				foreach ($com as $k => $v) {
    					$n['cnum'] = $k+1;
    					$comments->where(array('id' => $i))->save($n);
    					$i++;
    				}
    				$xx['cnum'] = $ccount;
    				$team->where(array('id' => $_POST['tid']))->save($xx);
    				//$ip = get_client_ip();
    				//var_dump($ip);die;
    				$this->success('评论成功！', U('Team/page',array('id'=>$_POST['tid'])),2);
    				exit;
    				
    				
    			}
    		}
    		$this->error($comments->getError());
    	}
    	
    	

    
    	/** 获取星星数 **/
    	$ccnum = $cnum->where(array('tids' => $id))->select();
    	
    	//var_dump($coms1);
    	//var_dump($star);
    	$this->assign(array(
    			'data' => $array,
    			'id' => $id,
    			'comments' => $coms1,
    			'ccnum' => $ccnum,
    			
    	));
    	
    	$this->display();
    }
    
    public function getAjax() {
    	
    	$comments = D('Home/Comments');
    	 
    	$com = $comments->getComments($id);
    	 
    	$star = $comments->getStars($id);
    	
    	$data = $model->getMovedata($type);
    	$data=json_encode($data);
    	echo $data;
    	
    }
    // 显示和处理表单
    public function edit()
    {
		
    	$model = D('team');
    	if(IS_POST)
    	{
    		//var_dump($_POST);die;
    		if($model->create(I('post.'), 2))
    		{
    			if(FALSE !== $model->save())  // save()的返回值是，如果失败返回false,如果成功返回受影响的条数【如果修改后和修改前相同就会返回0】
    			{
    				$this->success('操作成功！', U('Home/index'));
    				exit;
    			}
    		}
    		$error = $model->getError();
    		$this->error($error);
    	}
 
    }
    
}