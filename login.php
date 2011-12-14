<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin - Login</title>
	
	<!-- HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		
	<link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap-extend/bootstrap-extend.css" />
	<link rel="stylesheet" href="css/style.css" />
        
	<script src="js/jquery-1.7.1.js"></script>
<!--	<script src="js/bootstrap/bootstrap-modal.js"></script>-->
<!--	<script src="js/bootstrap/bootstrap-alerts.js"></script>-->
<!--	<script src="js/bootstrap/bootstrap-twipsy.js"></script>-->
<!--	<script src="js/bootstrap/bootstrap-popover.js"></script>-->
<!--	<script src="js/bootstrap/bootstrap-dropdown.js"></script>-->
<!--	<script src="js/bootstrap/bootstrap-scrollspy.js"></script>-->
<!--	<script src="js/bootstrap/bootstrap-tabs.js"></script>-->
<!--	<script src="js/bootstrap/bootstrap-buttons.js"></script>-->

	<script src="js/bootstrap-extend/contentlist.js"></script>
</head>
<body>

<!-- Login box
================================================== -->
	<div class="loginheadline"></div>
	<div class="logincontainer">
		<h1>Login</h1>
		<form action="#" method="post">
			<div class="clearfix <?php //echo form_error('username')?'error':''?>">
				<label for="username">Username:</label>
				<div class="input">
					<input type="text" 
						   name="username" 
						   id="username" 
						   value="<?php //echo set_value('username'); ?>"
						   class="span3" />
					<?php //echo form_error('username');?>
				</div>
			</div>
			<div class="clearfix <?php //echo form_error('password')?'error':''?>">
				<label for="password">Password:</label>
				<div class="input">
					<input type="password" 
						   name="password" 
						   id="password" 
						   value="<?php //echo set_value('password'); ?>"
						   class="span3" />
					<?php //echo form_error('password'); ?>
				</div>
			</div>
			<div class="loginbtn">
				<button type="submit" name="login" class="btn primary">
					Login
				</button>
			</div>
		</form>
	</div><!-- /logincontainer -->

</body>

</html>
