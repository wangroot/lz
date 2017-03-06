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
    	$comments = D('Home/Comments');
    	$array = $team->getPage($id);
    	//var_dump($in);die;
    	
    	if(IS_POST)
    	{
    		
    		if($comments->create(I('post.'), 1))
    		{
    			
    			if($comments->add())
    			{
    				
    				//var_dump(U('Index/index'));
    				//$this->redirect(U('Home/Index/index'), 5, '添加成功');
    				//$this->success('评论成功！', U('Team/page',array('id'=>$id)),3);
    				$this->success('评论成功！');
    				exit;
    			}
    		}
    		$this->error($comments->getError());
    	}
    	
    	

    	
    	$com = $comments->getComments($id);
    	
    	$star = $comments->getStars($id);
    	
    	//var_dump($com);
    	//var_dump($star);
    	$this->assign(array(
    			'data' => $array,
    			'id' => $id,
    			'comments' => $com,
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