<?php
namespace Admin\Controller;
class IndexController extends BaseController 
{
    public function index()
    {
    	$this->display();
    }
    public function top()
    {
    	$this->display();
    }
    public function menu()
    {
    	$this->display();
    }
    public function main()
    {
    	$team = D('Home/Team');
    	$array = $team->get();
    	$alteam = $team->getPData(2);
  //   	var_dump($array);
     	
//      	var_dump($_POST);die;
     	
    	
     	if(IS_POST)
     	{
//      		var_dump($_POST);die;
     		if($team->create(I('post.'), 2))
     		{
     			if(FALSE !== $team->where(array('id' => array('eq', $_POST['id'])))->save())  // save()的返回值是，如果失败返回false,如果成功返回受影响的条数【如果修改后和修改前相同就会返回0】
     			{
     				//在审核成功的时候，给该平台创建cnum表
     				$cnum = D('Home/Cnum');
     				$cnumss['cnums'] = '0';
     				$cnumss['star1'] = '5';
     				$cnumss['star2'] = '5';
     				$cnumss['star3'] = '5';
     				$cnumss['star4'] = '5';
     				$cnumss['star5'] = '5';
     				$cnumss['starttotal'] = '5';
     				$cnumss['s1'] = '145';
     				$cnumss['s2'] = '145';
     				$cnumss['s3'] = '145';
     				$cnumss['s4'] = '145';
     				$cnumss['s5'] = '145';
     				$cnumss['s6'] = '145';
     				$cnumss['tids'] = $_POST['id'];
     				$cnum->add($cnumss);
     				//在审核成功的时候，给该平台创建odr表
     				$Odr = D('Home/Odr');
     				$odrss['tids'] = $_POST['id'];
     				$odrss['odr'] = '0';
     				$Odr->add($odrss);
     				$this->success('操作成功！', U('main'));
     				exit;
     			}
     		}
     		$error = $team->getError();
     		$this->error($error);
     	}

    	$this->assign(array(
    			'data' => $array,
    			'alteam' => $alteam,
    	));
    	//var_dump($alteam);die;
    	$this->display();
    }

    public function zuan()
    {
    	$team = D('Home/Team');
    	$array = $team->get();
    	$alteam = $team->getPData(5);
    	//   	var_dump($array);
    
    	//      	var_dump($_POST);die;
    
    	 
    	if(IS_POST)
    	{
    		//      		var_dump($_POST);die;
    		if($team->create(I('post.'), 2))
    		{
    			if(FALSE !== $team->where(array('id' => array('eq', $_POST['id'])))->save())  // save()的返回值是，如果失败返回false,如果成功返回受影响的条数【如果修改后和修改前相同就会返回0】
    			{
    				//在审核成功的时候，给该平台创建cnum表
    				$cnum = D('Home/Cnum');
    				$cnumss['cnums'] = '0';
    				$cnumss['star1'] = '5';
    				$cnumss['star2'] = '5';
    				$cnumss['star3'] = '5';
    				$cnumss['star4'] = '5';
    				$cnumss['star5'] = '5';
    				$cnumss['starttotal'] = '5';
    				$cnumss['s1'] = '145';
    				$cnumss['s2'] = '145';
    				$cnumss['s3'] = '145';
    				$cnumss['s4'] = '145';
    				$cnumss['s5'] = '145';
    				$cnumss['s6'] = '145';
    				$cnumss['tids'] = $_POST['id'];
    				$cnum->add($cnumss);
    				//在审核成功的时候，给该平台创建odr表
    				$Odr = D('Home/Odr');
    				$odrss['tids'] = $_POST['id'];
    				$odrss['odr'] = '0';
    				$Odr->add($odrss);
    				$this->success('操作成功！', U('main'));
    				exit;
    			}
    		}
    		$error = $team->getError();
    		$this->error($error);
    	}
    
    	$this->assign(array(
    			'data' => $array,
    			'alteam' => $alteam,
    	));
    	//var_dump($alteam);die;
    	$this->display();
    }
    
    
}