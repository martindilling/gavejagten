<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin - Opret sponsor</title>
	
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
	
<!-- Top menu
================================================== -->
	<div class="topbar-wrapper" style="z-index: 5;">
		<div class="topbar" data-dropdown="dropdown" >
			<div class="topbar-inner">
				<div class="container-fluid">
					<h3><a href="#">Gavejagten</a></h3>
					<ul class="nav">
						<li class="active"><a href="#">Adminpanel</a></li>
						<li><a href="#">Sponsors</a></li>
						<li><a href="#">Donations</a></li>
						<li><a href="#">Link</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">Dropdown</a>
							<ul class="dropdown-menu">
								<li><a href="#">Secondary link</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Another link</a></li>
							</ul>
						</li>
					</ul><!-- /nav -->
					<ul class="nav secondary-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">Dropdown</a>
							<ul class="dropdown-menu">
								<li><a href="#">Secondary link</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Another link</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /container-fluid -->
			</div><!-- /topbar-inner -->
		</div><!-- /topbar -->
	</div><!-- /topbar-wrapper -->
	
	
<!-- 
================================================== -->
	<div class="container toppadding">
		
		<div class="page-header">
			<h1>Opret sponsor <small>Small description</small></h1>
		</div>
		
		<ul class="breadcrumb">
			<li><a href="#">Panel</a> <span class="divider">/</span></li>
			<li><a href="#">Sponsorer</a> <span class="divider">/</span></li>
			<li class="active">Opret sponsor</li>
		</ul><!-- /breadcrumb -->

		<form action="#" method="post">
			<fieldset>
				
				<div class="clearfix <?php //echo form_error('spnsor_name')?'error':''?>">
					<label for="spnsor_name">Navn:</label>
					<div class="input">
						<input type="text" 
							   name="spnsor_name" 
							   id="spnsor_name" 
							   value="<?php //echo set_value('spnsor_name'); ?>"
							   class="xlarge" />
						<?php //echo form_error('spnsor_name');?>
					</div>
				</div>
				<div class="clearfix <?php //echo form_error('sponsor_url')?'error':''?>">
					<label for="sponsor_url">Hjemmeside:</label>
					<div class="input">
						<div class="input-prepend">
							<span class="add-on">http://</span>
							<input type="text" 
								   name="sponsor_url" 
								   id="sponsor_url" 
								   value="<?php //echo set_value('sponsor_url'); ?>"
								   class="xlarge-http" />
							<?php //echo form_error('sponsor_url'); ?>
						</div>
					</div>
				</div>

				<div class="clearfix <?php //echo form_error('sponsor_description')?'error':''?>">
					<label for="sponsor_description">Beskrivelse:</label>
					<div class="input">
						<textarea
							   name="sponsor_description"
							   id="sponsor_description"
							   rows="5"
							   class="xlarge">
							<?php //echo set_value('sponsor_description'); ?>
						</textarea>
						<?php //echo form_error('sponsor_description'); ?>
					</div>
				</div>
				<div class="clearfix <?php //echo form_error('sponsor_logo')?'error':''?>">
					<label for="sponsor_logo">Logo:</label>
					<div class="input">
						<input type="file"
							   name="sponsor_logo"
							   id="sponsor_logo"
							   class="input-file"
							   value="test" />
						<?php //echo form_error('sponsor_logo'); ?>
					</div>
				</div>

				<div class="actions">
					<button type="submit" name="login" class="btn primary">
						Opret sponsor
					</button>
				</div>
			</fieldset>
		</form>
		
	</div><!-- /container -->	
</body>

</html>
