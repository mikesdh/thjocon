<?php
namespace app\index\controller;
use think\Request;
use app\common\model\User;

class UserController extends IndexController
{	
	//用户列表展示
    public function index()
    {
    	//获取查询信息
    	$name = input('get.name');

    	$pageSize = 5;
        $User = new User;
        if(!empty($name)){
        	$User->where('name','like','%'.$name.'%');
        }
        $users = $User->paginate($pageSize,false,[
        	'query'=>[
        		'name' => $name,
        	],
        ]);
        //向V层传数据
        $this->assign('users',$users);
        //取回打包后的数据
        $htmls = $this->fetch();
        //将数据返回用户
        return $htmls;
    }
    
    //接收表单数据插入
    public function add(){
    	$htmls = $this->fetch();
    	return $htmls;
    }
    
    public function insert(){
    	// 接收传入数据
    	$postData = Request::instance()->post();
        // 实例化Teacher空对象
        $User = new User();
        // 为对象赋值
        $User->name = $postData['name'];
        $User->username = $postData['username'];
        $User->sex = $postData['sex'];
        $User->email = $postData['email'];
        // 新增对象至数据表
        $result = $User->validate(true)->save($User->getData());

        // 反馈结果
        if (false === $result)
        {
            return '新增失败:' . $User->getError();
        } else {
            return $this->success('新增成功',url('index'));
        }
    }
    
    public function delete(){
    	//获取传入的id
    	$id = Request::instance()->param('id/d');
    	
    	if(0 === $id){
    		return $this->error('未获取到ID信息');
    	}
    	
    	//获取要删除的对象
    	$User = User::get($id);
    	if(is_null($User)){
    		return $this->error('不存在id为：'.$id.'的用户，删除失败');
    	}
    	
    	//删除对象
    	if(!$User->delete()){
    		return $this->error('删除失败:'.$User->getError);
    	}
    	
    	//删除成功进行跳转
    	return $this->success('删除成功',url('index'));
    }
    
    public function edit(){
    	// 获取传入ID
    	$id = Request::instance()->param('id/d');
        // 在User表模型中获取当前记录
        $User = User::get($id);
        // 将数据传给V层
        $this->assign('user',$User);
        // 获取封装好的V层内容
        $htmls = $this->fetch();
        // 将封装好的V层内容返回给用户
        return $htmls;
    }
    
    public function update(){
    	try{
    		$id = Request::instance()->post('id/d');
    		$User = User::get($id);
    		if(!is_null($User)){
    			$User->name = Request::instance()->post('name');
    			$User->username = Request::instance()->post('username');
    			$User->sex = Request::instance()->post('sex');
    			$User->email = Request::instance()->post('email');
    			//更新
    			if(false === $User->validate(true)->save($User->getData())){
    				return $this->error('更新失败'.$User->getError());
    			}
    		}else{
    			throw new \Exception('所更新的记录不存在',1);
    		}
    		
    	}catch(think\Exception\HttpResponException $e){
    		throw $e;
    	}catch(\Exception $e){
    		return $e->getMessage();
    	}
    	return $this->success('修改成功',url('index'));
    }
}
