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
    	$ccnum = $cnum->where(array('tids' => $id))->select();
 
    	//var_dump($com);die;
		
    	//var_dump($in);die;
    	
    	if(IS_POST)
    	{
    		
    		if($comments->create(I('post.'), 1))
    		{
    			
    			if($comments->add())
    			{
    				/** 获取评论数**/

    				$com = $comments->getComment($_POST['tid']);
    				$coms2 = $comments->getComments($_POST['tid'],5);
    				$ccount = $coms2['count'];
    				$cnum = D('Home/Cnum');
    				$cnumss['cnums'] = $ccount;
    				
    				//echo $ccount;
    				//var_dump($coms2);die;
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
    				
    				$this->success('评论成功！', U('Team/page',array('id'=>$_POST['tid'])),2);
    				exit;
    				
    				
    			}
    		}
    		$this->error($comments->getError());
    	}
    	
    	

    
    	/** 获取星星数 **/
    	$star = $comments->getStars($id);
    	
    	//var_dump($com);
    	//var_dump($star);
    	$this->assign(array(
    			'data' => $array,
    			'id' => $id,
    			'comments' => $coms1,
    			'star' => $star,
    			
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