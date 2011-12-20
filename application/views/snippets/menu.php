<!-- Top menu
================================================== -->
<div class="topbar-wrapper" style="z-index: 5;">
	<div class="topbar" data-dropdown="dropdown" >
		<div class="topbar-inner">
			<div class="container-fluid">
				<h3><a href="#">Gavejagten</a></h3>
				<ul class="nav">
					<li class="active"><?php echo anchor('admin/adminpanel', 'Panel') ?></li>
					<li><?php echo anchor('admin/new_event', 'Ny event') ?></li>
					<li><?php echo anchor('admin/show_sponsors', 'Vis sponsorer') ?></li>
					<li><?php echo anchor('admin/new_sponsor', 'Ny sponsor') ?></li>
					<li><?php echo anchor('admin/add_sponsor', 'Tilføj sponsor') ?></li>
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
					<li><?php echo anchor('admin/logout', 'Logout') ?></li>
				</ul>
			</div><!-- /container-fluid -->
		</div><!-- /topbar-inner -->
	</div><!-- /topbar -->
</div><!-- /topbar-wrapper -->