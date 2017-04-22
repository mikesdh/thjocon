<?php
namespace app\common\model;
use think\Model;

class User extends Model{
	static public function login($username, $password){
		$map = array('username' => $username);
		$User = self::get($map);
		
		if(!is_null($User)){
			if($User->checkPassword($password)){
				session('userId', $User->getData('id'));
				return true;
			}
		}
		return false;
	}
	
	static public function logOut(){
		session('userId',null);
		return true;
	}
	
	static public function isLogin(){
		$userId = session('userId');
		if(isset($userId)){
			return true;
		}else{
			return false;
		}
		return true;
	}
	
	public function checkPassword($password){
		if($this->getData('password') === $this::encryptPassword($password)){
			return true;
		}else{
			return false;
		}
	}
	
	static public function encryptPassword($password){
		if (!is_string($password)) {
            throw new \RuntimeException("传入变量类型非字符串，错误码2", 2);
        }
		return sha1(md5($password) . 'shidonghua');
	}
}
?>