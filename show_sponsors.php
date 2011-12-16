<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin - Vis sponsorer</title>
	
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
			<h1>Admin Panel <small>Small description</small></h1>
		</div>
		
		<ul class="breadcrumb">
			<li><a href="#">Panel</a> <span class="divider">/</span></li>
			<li><a href="#">Gavejagten 2011</a> <span class="divider">/</span></li>
			<li><a href="#">Vis sponsorer</a> <span class="divider">/</span></li>
			<li class="active">You are here</li>
		</ul><!-- /breadcrumb -->

		<div class="well">
			<ul class="toolbar">
				<li><a href="#" class="btn success"><img src="images/icons/add.png" height="16" width="16" /> Tilføj sponsor</a></li>
			</ul><!-- /toolbar -->
		</div><!-- /well -->
		
		<ul class="contentlist" data-contentlist="contentlist">
			<li class="divider">
				<div>Sponsorer</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">3 Mobil</a>
				<div>
					<div class="well">
						<ul class="toolbar">
							<li class="group">
								<ul>
									<li><a href="#" class="btn small">Vis rapport</a></li>
								</ul>
							</li><!-- /group -->
							<li class="group right">
								<ul>
									<li><a href="#" class="btn small info"><img src="images/icons/edit.png" height="16" width="16" /> Rediger sponsor</a></li>
									<li><a href="#" class="btn small danger"><img src="images/icons/delete.png" height="16" width="16" /> Slet sponsor</a></li>
								</ul>
							</li><!-- /group -->
						</ul><!-- /toolbar -->
					</div><!-- /well -->
					
					<div class="row">
						<div class="span8">
							<p><span class="label">Link:</span> <a href="#" target="_blank">$db->url</a></p>
							<p><span class="label">Beskrivelse:</span> $db->description</p>
						</div>
						<div class="span7 force-right">
							<p><span class="label">Donation pr. pakke:</span> 10 kr</p>
							<p><span class="label">Pakker doneret:</span> 1000 stk</p>
							<p><span class="label">Donation ialt:</span> 10.000 kr</p>
							<p><span class="label">Donations loft:</span> 10.000 kr</p>
							
						</div>
					</div><!-- row -->
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Accessorize</a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Alexandra Blomster</a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Art Shop</a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Bahne</a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
		</ul><!-- /contentlist -->
		
	</div><!-- /container -->	
</body>

</html>
