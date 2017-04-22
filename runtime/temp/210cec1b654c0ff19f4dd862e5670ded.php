<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\AppServ\www\thinkphp\public/../application/index\view\login\index.html";i:1492229785;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<hr />
				<div class="row">
					<form action="<?php echo url('login'); ?>" method="post">
				        <label for="username">用户名：</label><input type="text" name="username" id="username" /><br />
				        <label for="password">密&nbsp;&nbsp;&nbsp;码：</label><input type="password" name="password" id="password" /><br />
				        <button type="submit">登陆</button>
				    </form>
				</div>
				<hr />
			</div>				
		</div>
	</div>
    
</body>
</html>
