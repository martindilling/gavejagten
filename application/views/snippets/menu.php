<!-- Top menu
================================================== -->
<div class="topbar-wrapper" style="z-index: 5;">
	<div class="topbar" data-dropdown="dropdown" >
		<div class="topbar-inner">
			<div class="container-fluid">
				<h3><?php echo anchor('', 'EventAdmin') ?></h3>
				<ul class="nav">
					<li<?php echo ($activep == 'adminpanel' ? ' class="active"' : ''); ?>><?php echo anchor('admin/adminpanel', 'Adminpanel') ?></li>
					<li<?php echo ($activep == 'new_event' ? ' class="active"' : ''); ?>><?php echo anchor('admin/new_event', 'Ny event') ?></li>
					<li<?php echo ($activep == 'show_sponsors' ? ' class="active"' : ''); ?>><?php echo anchor('admin/show_sponsors', 'Vis sponsorer') ?></li>
					<li<?php echo ($activep == 'new_sponsor' ? ' class="active"' : ''); ?>><?php echo anchor('admin/new_sponsor', 'Opret sponsor') ?></li>
				</ul><!-- /nav -->
				<ul class="nav secondary-nav">
					<li><?php echo anchor('admin/logout', 'Logout') ?></li>
				</ul>
			</div><!-- /container-fluid -->
		</div><!-- /topbar-inner -->
	</div><!-- /topbar -->
</div><!-- /topbar-wrapper -->