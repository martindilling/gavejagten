	<div class="well">
		<ul class="toolbar">
			<li><?php echo anchor('admin/new_event', '<img src="'. base_url() .'images/icons/add.png" height="16" width="16" /> Ny event', array('class' => 'btn success')) ?></li>
		</ul><!-- /toolbar -->
	</div><!-- /well -->

	<ul class="contentlist" data-contentlist="contentlist">
		<li class="divider">
			<div>Aktive events</div>				    
		</li>
		<?php foreach($events['active'] as $key): ?>

			<li class="green">
				<a href="#" class="contentlist-toogle"><?php echo $key['name'] ?><span class="pull-right"><?php echo $key['start_time'] ?> - <?php echo $key['end_time'] ?></span></a>
				<div>
					<div class="well">
						<ul class="toolbar">
							<li class="group">
								<ul>
									<li><?php echo anchor('admin/show_sponsors/'.$key['id_event'], 'Vis sponsorer', array('class' => 'btn small')) ?></li>
									<li><?php echo anchor('admin/show_report/'.$key['id_event'], 'Vis rapport', array('class' => 'btn small')) ?></li>
								</ul>
							</li><!-- /group -->
							<li class="group right">
								<ul>
									<li><?php echo anchor('admin/edit_event/'.$key['id_event'], '<img src="'. base_url() .'images/icons/edit.png" height="16" width="16" /> Rediger event', array('class' => 'btn small info')) ?></li>
									<li><?php echo anchor('admin/delete_event/'.$key['id_event'], '<img src="'. base_url() .'images/icons/delete.png" height="16" width="16" /> Slet event', array('class' => 'btn small danger')) ?></li>
								</ul>
							</li><!-- /group -->
						</ul><!-- /toolbar -->
					</div><!-- /well -->

					<p><span class="label">Placering:</span> <?php echo $key['place'] ?></p>
					<p><span class="label">Arrangør:</span> <?php echo $key['organizer'] ?></p>
					<p><span class="label">Beskrivelse:</span> <?php echo $key['description'] ?></p>
				</div>
			</li>
		
		<?php endforeach; ?>

		<li class="divider">
			<div>Kommende events</div>				    
		</li>
		<?php foreach($events['future'] as $key): ?>

			<li class="">
				<a href="#" class="contentlist-toogle"><?php echo $key['name'] ?><span class="pull-right"><?php echo $key['start_time'] ?> - <?php echo $key['end_time'] ?></span></a>
				<div>
					<div class="well">
						<ul class="toolbar">
							<li class="group">
								<ul>
									<li><?php echo anchor('admin/show_sponsors/'.$key['id_event'], 'Vis sponsorer', array('class' => 'btn small')) ?></li>
									<li><?php echo anchor('admin/show_report/'.$key['id_event'], 'Vis rapport', array('class' => 'btn small')) ?></li>
								</ul>
							</li><!-- /group -->
							<li class="group right">
								<ul>
									<li><?php echo anchor('admin/edit_event/'.$key['id_event'], '<img src="'. base_url() .'images/icons/edit.png" height="16" width="16" /> Rediger event', array('class' => 'btn small info')) ?></li>
									<li><?php echo anchor('admin/delete_event/'.$key['id_event'], '<img src="'. base_url() .'images/icons/delete.png" height="16" width="16" /> Slet event', array('class' => 'btn small danger')) ?></li>
								</ul>
							</li><!-- /group -->
						</ul><!-- /toolbar -->
					</div><!-- /well -->

					<p><span class="label">Placering:</span> <?php echo $key['place'] ?></p>
					<p><span class="label">Arrangør:</span> <?php echo $key['organizer'] ?></p>
					<p><span class="label">Beskrivelse:</span> <?php echo $key['description'] ?></p>
				</div>
			</li>
		
		<?php endforeach; ?>
		
		<li class="divider">
			<div>Gamle events</div>				    
		</li>
		<?php foreach($events['old'] as $key): ?>

			<li class="gray">
				<a href="#" class="contentlist-toogle"><?php echo $key['name'] ?><span class="pull-right"><?php echo $key['start_date'] ?> - <?php echo $key['end_date'] ?></span></a>
				<div>
					<div class="well">
						<ul class="toolbar">
							<li class="group">
								<ul>
									<li><?php echo anchor('admin/show_sponsors/'.$key['id_event'], 'Vis sponsorer', array('class' => 'btn small')) ?></li>
									<li><?php echo anchor('admin/show_report/'.$key['id_event'], 'Vis rapport', array('class' => 'btn small')) ?></li>
								</ul>
							</li><!-- /group -->
							<li class="group right">
								<ul>
									<li><?php echo anchor('admin/edit_event/'.$key['id_event'], '<img src="'. base_url() .'images/icons/edit.png" height="16" width="16" /> Rediger event', array('class' => 'btn small info')) ?></li>
									<li><?php echo anchor('admin/delete_event/'.$key['id_event'], '<img src="'. base_url() .'images/icons/delete.png" height="16" width="16" /> Slet event', array('class' => 'btn small danger')) ?></li>
								</ul>
							</li><!-- /group -->
						</ul><!-- /toolbar -->
					</div><!-- /well -->

					<p><span class="label">Placering:</span> <?php echo $key['place'] ?></p>
					<p><span class="label">Arrangør:</span> <?php echo $key['organizer'] ?></p>
					<p><span class="label">Beskrivelse:</span> <?php echo $key['description'] ?></p>
				</div>
			</li>
		
		<?php endforeach; ?>
	</ul><!-- /contentlist -->

</div><!-- /container -->	