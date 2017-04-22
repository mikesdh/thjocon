<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\common\model\User;

class LoginController extends Controller{
	
	//显示登陆表单
	public function index(){
		$htmls = $this->fetch();
		return $htmls;
	}
	
	//处理用户登陆数据
	public function login(){
		$postData = Request::instance()->post();
		if(User::login($postData['username'],$postData['password'])){
			return $this->success('登陆成功',url('User/index'));
		}else{
			return $this->error('用户名或者密码错误',url('index'));
		}
	}
	
	public function logOut(){
		if(User::logOut()){
			return $this->success('注销成功',url('index'));
		}else{
			return $this->error('注销失败',url('index'));
		}
	}
	
	public function test(){
		echo User::encryptPassword('12345');
	}
}
?>