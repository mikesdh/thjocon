<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\AppServ\www\thinkphp\public/../application/index\view\user\index.html";i:1492820151;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>用户管理</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body class="container">
	<div class="page-header"><a href="<?php echo url('Login/index'); ?>" class="btn btn-primary">注销</a></div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="name">姓名</label>
                            <input name="name" type="text" class="form-control" placeholder="姓名..." value="<?php echo input('get.name'); ?>">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>&nbsp;查询</button>
                    </form>
                </div>
                <div class="col-md-4 text-right">
                    <a href="<?php echo url('add'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;增加</a>
                </div>
            </div>
            <hr />
            <table class="table table-hover table-bordered">
                <tr class="info">
                    <th>序号</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>邮箱</th>
                    <th>用户名</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): $key = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($key % 2 );++$key;?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $user->getData('name'); ?></td>
                    <td><?php if($user->getData("sex") == '0'): ?>男<?php else: ?>女<?php endif; ?></td>
                    <td><?php echo $user->getData('email'); ?></td>
                    <td><?php echo $user->getData('username'); ?></td>
                    <td><?php echo $user->getData('create_time'); ?></td>
                    <td><?php echo $user->getData('update_time'); ?></td>
                    <td>
                    	<a href="<?php echo url('edit?id='.$user->getData('id')); ?>">编辑</a>
                    	&nbsp;&nbsp;
                    	<a href="<?php echo url('delete?id='.$user->getData('id')); ?>">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <?php echo $users->render(); ?>
        </div>
    </div>
    <hr />
    <div class="footer">欢迎【<?php echo $user->getData('name'); ?>】登陆</div>
</body>

</html>