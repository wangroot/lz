<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$team = D('Home/Team');
    	$array = $team->getPromote();
    	
    	$this->assign(array(
    			'data' => $array,
    	));	
    	$this->display();
    }
}