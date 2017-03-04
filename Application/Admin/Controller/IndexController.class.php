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
  //   	var_dump($array);
     	
//      	var_dump($_POST);die;
     	
    	
     	if(IS_POST)
     	{
//      		var_dump($_POST);die;
     		if($team->create(I('post.'), 2))
     		{
     			if(FALSE !== $team->where(array('id' => array('eq', $_POST['id'])))->save())  // save()的返回值是，如果失败返回false,如果成功返回受影响的条数【如果修改后和修改前相同就会返回0】
     			{
     				$this->success('操作成功！', U('main'));
     				exit;
     			}
     		}
     		$error = $team->getError();
     		$this->error($error);
     	}
//      	$data =array();
//     	$name = array();
//     	$contact = array();
//     	$name = array();
//     	$type = array();
//     	$minimum_recharge = array();
//     	$minimum_withdrawal = array();
//     	$introduction = array();
//     	foreach ($array as $k => $v)
//     	{
//     		$data['name'][] = $v['name'];
//     		$data['contact'][] = $v['contact'];
//     		$data['type'][] = $v['type'];
//     		$data['minimum_recharge'][] = $v['minimum_recharge'];
//     		$data['minimum_withdrawal'][] = $v['minimum_withdrawal'];
//     		$data['introduction'][] = $v['introduction'];
//     	}
    	$this->assign(array(
    			'data' => $array,
    	));
    	//var_dump($_gaData);
    	$this->display();
    }
    
    
}