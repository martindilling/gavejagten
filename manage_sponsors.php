<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin - Sponsorer</title>
	
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
			<h1>Sponsorer <small>Small description</small></h1>
		</div>
		
		<ul class="breadcrumb">
			<li><a href="#">Panel</a> <span class="divider">/</span></li>
			<li><a href="#">Sponsorer</a> <span class="divider">/</span></li>
			<li><a href="#">Another one</a> <span class="divider">/</span></li>
			<li class="active">You are here</li>
		</ul><!-- /breadcrumb -->

		<div class="well">
			<ul class="toolbar">
				<li><a href="#" class="btn success"><img src="images/icons/add.png" height="16" width="16" /> Ny sponsor</a></li>
			</ul><!-- /toolbar -->
		</div><!-- /well -->
		
		<ul class="contentlist" data-contentlist="contentlist">
			<li class="divider">
				<div>#</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">3 Mobil<span class="pull-right">Donerer til 3 events</span></a>
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
							<ul class="contentlist" data-contentlist="contentlist">
								<li class="divider">
									<div>Events:</div>				    
								</li>
								<li class="green">
									<a href="#" class="contentlist-toogle">$db->events[1]-name<span class="pull-right">15-12-2011 - 15-12-2011</span></a>
									<div>
										<p><span class="label">Gaveværdi:</span> 10 kr</p>
										<p><span class="label">Antal gaver doneret:</span> 1000 stk</p>
										<p><span class="label">Donation ialt:</span> 10.000 kr</p>
									</div>
								</li>
								<li class="green">
									<a href="#" class="contentlist-toogle">$db->events[2]-name<span class="pull-right">13-12-2011 - 17-12-2011</span></a>
									<div>
										<p><a href="#">Gavejagten 2011</a></p>
										<p><a href="#">Skattejagt</a></p>
										<p><a href="#">Den store jagt</a></p>
									</div>
								</li>
								<li class="green">
									<a href="#" class="contentlist-toogle">$db->events[3]-name<span class="pull-right">01-12-2011 - 24-12-2011</span></a>
									<div>
										<p><a href="#">Gavejagten 2011</a></p>
										<p><a href="#">Skattejagt</a></p>
										<p><a href="#">Den store jagt</a></p>
									</div>
								</li>
							</ul><!-- /contentlist -->
						</div>
					</div><!-- row -->
				</div>
			</li>
			
			<li class="divider">
				<div>A</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Accessorize<span class="pull-right">Donerer til 4 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Alexandra Blomster<span class="pull-right">Donerer til 4 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Art Shop<span class="pull-right">Donerer til 4 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
			
			<li class="divider">
				<div>B</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Bahne<span class="pull-right">Donerer til 4 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Bertoni<span class="pull-right">Donerer til 4 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Bianco Footwear<span class="pull-right">Donere til 4 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Body Shop<span class="pull-right">Donerer til 4 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Bog & Idé<span class="pull-right">Donerer til 3 events</span></a>
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
							<p><span class="label">Link:</span> <a href="#" target="_blank">www.hjemmeside.com</a></p>
							<p><span class="label">Beskrivelse:</span> Beskrivelse</p>
						</div>
						<div class="span7 force-right">
							<ul class="contentlist" data-contentlist="contentlist">
								<li class="green">
									<a href="#" class="contentlist-toogle">Events</a>
									<div>
										<p><a href="#">Gavejagten 2011</a></p>
										<p><a href="#">Skattejagt</a></p>
									</div>
								</li>
							</ul><!-- /contentlist -->
						</div>
					</div><!-- row -->
				</div>
			</li>
			
			<li class="divider">
				<div>F</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Fætter BR<span class="pull-right">Donerer til 2 events</span></a>
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
							<p><span class="label">Link:</span> <a href="#" target="_blank">www.hjemmeside.com</a></p>
							<p><span class="label">Beskrivelse:</span> Beskrivelse</p>
						</div>
						<div class="span7 force-right">
							<ul class="contentlist" data-contentlist="contentlist">
								<li class="green">
									<a href="#" class="contentlist-toogle">Events</a>
									<div>
										<p><a href="#">Gavejagten 2011</a></p>
										<p><a href="#">Skattejagt</a></p>
									</div>
								</li>
							</ul><!-- /contentlist -->
						</div>
					</div><!-- row -->
				</div>
			</li>
			
			<li class="divider">
				<div>G</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Game Stop<span class="pull-right">Donerer til 3 events</span></a>
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
							<p><span class="label">Link:</span> <a href="#" target="_blank">www.hjemmeside.com</a></p>
							<p><span class="label">Beskrivelse:</span> Beskrivelse</p>
						</div>
						<div class="span7 force-right">
							<ul class="contentlist" data-contentlist="contentlist">
								<li class="green">
									<a href="#" class="contentlist-toogle">Events</a>
									<div>
										<p><a href="#">Gavejagten 2011</a></p>
										<p><a href="#">Skattejagt</a></p>
										<p><a href="#">Den store jagt</a></p>
									</div>
								</li>
							</ul><!-- /contentlist -->
						</div>
					</div><!-- row -->
				</div>
			</li>
			
			<li class="divider">
				<div>K</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Kvikly<span class="pull-right">Donerer til 4 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
			
			<li class="divider">
				<div>S</div>				    
			</li>
			<li class="">
				<a href="#" class="contentlist-toogle">Stereo Studio<span class="pull-right">Donerer til 1 events</span></a>
				<div>
					<p>Some content</p>
				</div>
			</li>
		</ul><!-- /contentlist -->
		
	</div><!-- /container -->	
</body>

</html>
