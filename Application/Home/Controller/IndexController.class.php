<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$team = D('Home/Team');
    	$array = $team->getPData(5);

    	$this->assign(array(
    			'data' => $array,

    	));
    	//var_dump($array);die;
    	$this->display();
    }
}