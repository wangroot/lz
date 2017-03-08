<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$team = D('Home/Team');
    	$cnum = D('Home/Cnum');
    	$array = $team->getPData(40);
    	$tnew = $team->getN(10);
    	$s1 = $cnum->getS1(10);
    	$s2 = $cnum->getS1(10);
    	$s3 = $cnum->getS1(10);
    	$s4 = $cnum->getS1(10);
    	$s5 = $cnum->getS1(10);
    	$s6 = $cnum->getS1(10);

    	$this->assign(array(
    			'data' => $array,
    			'tnew' => $tnew,
    			's1' => $s1,
    			's2' => $s2,
    			's3' => $s3,
    			's4' => $s4,
    			's5' => $s5,
    			's6' => $s6,

    	));
    	//$ip = get_client_ip();
     	//var_dump($ip);die;
    	$this->display();
    }
}