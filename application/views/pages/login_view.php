<!-- Login box
================================================== -->
<div class="loginheadline"></div>
<div class="logincontainer">
	<h1>Login</h1>
	<form action="#" method="post">
		<div class="clearfix <?php echo form_error('username')?'error':''?>">
			<label for="username">Brugernavn:</label>
			<div class="input">
				<input type="text" 
					   name="username" 
					   id="username" 
					   value="<?php echo set_value('username'); ?>"
					   class="span3" />
				<?php echo form_error('username');?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('password')?'error':''?>">
			<label for="password">Password:</label>
			<div class="input">
				<input type="password" 
					   name="password" 
					   id="password" 
					   value="<?php echo set_value('password'); ?>"
					   class="span3" />
				<?php echo form_error('password'); ?>
			</div>
		</div>
		<div class="loginbtn">
			<button type="submit" name="login" class="btn primary">
				Login
			</button>
		</div>
	</form>
</div><!-- /logincontainer -->