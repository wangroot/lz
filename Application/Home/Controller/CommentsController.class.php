<?php
namespace Home\Controller;
use Think\Controller;
class CommentsController extends Controller {
    public function page(){
    	$id = I('get.id');
    	$comments = D('Comments');
    	if(IS_POST)
    	{
    		if($comments->create(I('post.'), 1))
    		{
    			if($id = $comments->add())
    			{
    				//$this->redirect(U('Index/index'), 5, '添加成功');
    				$this->success('评论成功！', U('Team/page'));
    				exit;
    			}
    		}
    		$this->error($comments->getError());
    	}
    	  	  	
    	 
    }
}