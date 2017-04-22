<?php
namespace app\index\controller;
use app\common\model\User;
use think\Controller;

class IndexController extends Controller{
	public function __construct(){
		parent::__construct();
		
		//验证用户是否登陆
		if(!User::isLogin()){
			return $this->error('请登陆', url('Login/index'));
		}
	}
	public function index(){
		
	}
}
?>