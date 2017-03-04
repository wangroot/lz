<?php
namespace Home\Controller;
use Think\Controller;
class TeamController extends Controller {
    public function add(){
    	
//     	$team = D('team');
// 		$array = $team->get();
// 		var_dump($array);
// 		var_dump($_POST);
    	if(IS_POST)
    	{
    		$model = D('Team');
    		if($model->create(I('post.'), 1))
    		{
    			if($id = $model->add())
    			{	
    				//$this->redirect(U('Index/index'), 5, '添加成功');
     				$this->success('添加成功,等待管理员审核！', U('Index/index'));
     				exit;
    			}
    		}
    		$this->error($model->getError());
    	}
    	
    	
    	// 设置页面中的信息
    	$this->assign(array(
    			'_page_title' => '添加属性表',
    			'_page_btn_name' => '属性表列表',
    			'_page_btn_link' => U('lst?type_id='.I('get.type_id')),
    	));
    	$this->display();
    	
//     	$model = D('Team');
//     	$data = $model->getData();
//     	$data=json_encode($data);
//     	$type = $_POST;
// //     	var_dump($_POST);
//     	$name = $_POST['name'];
//     	$contact = $_POST['contact'];
//     	$contact = $_POST['type'];
//     	$contact = $_POST['minimum_recharge'];
//     	$contact = $_POST['minimum_withdrawal'];
//     	$contact = $_POST['introduction'];
// //     	print_r($_POST['type']);
// //     	echo U('Team/add');
//     	var_dump($data);
//     	$this->display();
    }
    public function get(){
//     	$type = $_POST['type'];
//     	$model = D('Nodeone');
//     	$data = $model->getData($type);
//     	$data=json_encode($data);
//     	echo $data;
    	$model = D('Team');
    	$data = $model->getData();
    	$data=json_encode($data);
		echo $data;
    }
    public function page(){
    	
    	$id = I('get.id');
    	$team = D('Home/Team');
    	$array = $team->getPage($id);

    	$this->assign(array(
    			'data' => $array,
    	));
    	
    	$this->display();
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