<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin - Panel</title>
	
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
	
	
<!-- Header and Breadcrumb
================================================== -->
	<div class="container toppadding">
		
		<div class="page-header">
			<h1>Admin Panel <small>Small description</small></h1>
		</div>
		
		<ul class="breadcrumb">
			<li><a href="#">Panel</a> <span class="divider">/</span></li>
			<li><a href="#">Middle page</a> <span class="divider">/</span></li>
			<li><a href="#">Another one</a> <span class="divider">/</span></li>
			<li class="active">You are here</li>
		</ul><!-- /breadcrumb -->

		<div class="well">
			<ul class="toolbar">
				<li><a href="#" class="btn success"><img src="images/icons/add.png" height="16" width="16" /> Ny event</a></li>
			</ul><!-- /toolbar -->
		</div><!-- /well -->
		
		<ul class="contentlist" data-contentlist="contentlist">
			<li class="divider">
				<div>Aktive events</div>				    
			</li>
			<li class="green">
				<a href="#" class="contentlist-toogle">Gavejagten 2011<span class="pull-right">15-12-2011</span></a>
				<div>
					<div class="well">
						<ul class="toolbar">
							<li class="group">
								<ul>
									<li><a href="#" class="btn small">Vis sponsorer</a></li>
									<li><a href="#" class="btn small">Vis donationer</a></li>
									<li><a href="#" class="btn small">Vis rapport</a></li>
								</ul>
							</li><!-- /group -->
							<li class="group right">
								<ul>
									<li><a href="#" class="btn small info"><img src="images/icons/edit.png" height="16" width="16" /> Rediger event</a></li>
									<li><a href="#" class="btn small danger"><img src="images/icons/delete.png" height="16" width="16" /> Slet event</a></li>
								</ul>
							</li><!-- /group -->
						</ul><!-- /toolbar -->
					</div><!-- /well -->
					<div class="infolist">
						<div><span class="label">Placering:</span></div>
						<span>Bruun's Galleri - Århus</span>

						<div><span class="label">Arrangør:</span></div>
						<span>Bruun's Galleri - Århus</span>

						<div><span class="label">Beskrivelse:</span></div>
						<span>Dette er en beskrivelse af eventen.</span>
					</div>
					<div class="infolist">
						<div><span class="label">Event start:</span></div>
						<span>15-12-2011 10:00</span>

						<div><span class="label">Event slut:</span></div>
						<span>15-12-2011 20:00</span>
					</div>
					<div style="clear:both;"></div>
				</div>
			</li>
			<li class="green">
				<a href="#" class="contentlist-toogle">Skattejagt<span class="pull-right">13-12-2011 - 17-12-2011</span></a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="green">
				<a href="#" class="contentlist-toogle">Den store jagt<span class="pull-right">01-12-2011 - 24-12-2011</span></a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="divider">
				<div>Kommende events</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Find havenisserne<span class="pull-right">01-12-2011 - 24-12-2011</span></a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Gavejagten 2012<span class="pull-right">01-12-2011 - 24-12-2011</span></a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="divider">
				<div>Gamle events</div>				    
			</li>
			<li class="gray">
				<a href="#" class="contentlist-toogle">Gavejagten 2010<span class="pull-right">15-12-2010 - 15-12-2010</span></a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="gray">
				<a href="#" class="contentlist-toogle">Gavejagten 2009<span class="pull-right">15-12-2009 - 15-12-2009</span></a>
				<div>
					<p>Some content</p>
					<p>Some content</p>
					<p>Some content</p>
				</div>
			</li>
			<li class="gray">
				<a href="#" class="contentlist-toogle">Første test event<span class="pull-right">07-05-2008 - 07-05-2008</span></a>
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
