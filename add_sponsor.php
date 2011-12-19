<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin - Tilføj sponsor</title>
	
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
			<h1>Tilføj sponsor <small>Small description</small></h1>
		</div>
		
		<ul class="breadcrumb">
			<li><a href="#">Panel</a> <span class="divider">/</span></li>
			<li><a href="#">Gavejagten 2011</a> <span class="divider">/</span></li>
			<li class="active">Tilføj sponsor</li>
		</ul><!-- /breadcrumb -->

		<form action="#" method="post">
			<fieldset>
				<div class="clearfix <?php //echo form_error('sponsor')?'error':''?>">
					<label for="sponsor">Vælg sponsor:</label>
					<div class="input">
						<select class="xlarge" size="10" name="sponsor" id="sponsor">
							<option>3 Mobil</option>
							<option>Accessorize</option>
							<option>Alexandra Blomster</option>
							<option>Art Shop</option>
							<option>Bahne</option>
							<option>Bertoni</option>
							<option>Bianco Footwear</option>
							<option>Body Shop</option>
							<option>Bog & Idé</option>
							<option>Fætter BR</option>
							<option>Game Stop</option>
							<option>Kvikly</option>
							<option>Stereo Studio</option>
						</select>
						<?php //echo form_error('sponsor');?>
						<br /><a href="new_sponsor.php">Opret ny sponsor</a>
					</div>
				</div><!-- /clearfix -->
				
				<div class="clearfix <?php //echo form_error('donation_piece')?'error':''?>">
					<label for="donation_piece">Donation pr. scanning (kr.):</label>
					<div class="input">
						<input type="text" 
							   name="donation_piece" 
							   id="donation_piece" 
							   value="<?php //echo set_value('donation_piece'); ?>"
							   class="xlarge" />
						<?php //echo form_error('donation_piece');?>
					</div>
				</div>
				<div class="clearfix <?php //echo form_error('donation_max')?'error':''?>">
					<label for="donation_max">Donations loft (kr.):</label>
					<div class="input">
						<input type="text" 
							   name="donation_max" 
							   id="donation_max" 
							   value="<?php //echo set_value('donation_max'); ?>"
							   class="xlarge" />
						<?php //echo form_error('donation_max'); ?>
					</div>
				</div>
				<div class="actions">
					<button type="submit" name="login" class="btn primary">
						Tilføj til "Gavejagten 2011"
					</button>
				</div>
			</fieldset>
		</form>
		
	</div><!-- /container -->	
</body>

</html>
