<?php
	require('backend_header.php');
?>
	<div class="container">
		<div class="jumbotron">
			<h2 align="center">修改密码</h2>
			<form method="post" action="/index.php/passwd/passwd_update">
				当前密码：
				<input class="form-control" type="password"></input><br/>
				新密码：
				<input class="form-control" type="password"></input><br>
				重复新密码：
				<input class="form-control" type="password"></input><br>
				<br />
				<input class="btn form-control" type="submit" value="提交"></input>
			</form>
		</div>
	</div>
<?php
	require('backend_footer.php');
?>