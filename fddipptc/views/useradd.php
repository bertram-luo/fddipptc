<?php
	require('backend_header.php');

?>
    <div class="container">
        <div class="jumbotron">
        	<h1 align="center">添加新用户</h1>
			<!?php echo validation_errors();?>
	        <?php if(isset($error)) echo "<div class=\"alert alert-danger\"><h2>$error</h2></div>"?>
			<!--?php echo form_open('backend/useradd');?-->
            <form  class="form" method="post" action="/index.php/useradd/useradd_insert">
            	<label for="username" class="col-md-2">用户名：</label>
            	<input class="form-control" type="text" id="username" name="username"></input>
                <label for="password" class="col-md-2">密码：</label>
            	<input class="form-control" type="password" id="password" name="password" placeholder="密码"></input>
                <label class="col-md-2" for="password_conf">确认密码:</label>
				<input class="form-control" type="password"  id="password_conf" name="password_conf"></input>
				<input class="btn btn-default" type="submit" value="确定"></input>
            </form>
        </div>
    </div>
<?php
	require('backend_footer.php');
?>
