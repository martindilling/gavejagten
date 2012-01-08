<div class="well">
	<ul class="toolbar">
		<li><?php echo anchor($addnew_action, '<img src="'. base_url() .'images/icons/add.png" height="16" width="16" /> '.$addnew_text, array('class' => 'btn success')) ?></li>
	</ul><!-- /toolbar -->
</div><!-- /well -->

<ul class="contentlist" data-contentlist="contentlist">
	<li class="divider">
		<div>Sponsorer</div>				    
	</li>
	
	<?php foreach($sponsors as $key): ?>
	
	<li class="">
		<a href="#" class="contentlist-toogle"><?php echo $key['name'] ?></a>
		<div>
			<div class="well">
				<ul class="toolbar">
					<li class="group">
						<ul>
							<li><?php echo anchor('admin/show_report/'.$key['id_sponsor'], 'Vis rapport', array('class' => 'btn small')) ?></li>
						</ul>
					</li><!-- /group -->
					<li class="group right">
						<ul>
							<li><?php echo anchor($edit_action . $key['id_sponsor'], '<img src="'. base_url() .'images/icons/edit.png" height="16" width="16" /> ' . $edit_text, array('class' => 'btn small info')) ?></li>
									<li><?php echo anchor($delrem_action . $key['id_sponsor'], '<img src="'. base_url() .'images/icons/delete.png" height="16" width="16" /> ' . $delrem_text, array('class' => 'btn small danger')) ?></li>
						</ul>
					</li><!-- /group -->
				</ul><!-- /toolbar -->
			</div><!-- /well -->

			<div class="infolist">
				<div><span class="label">Link:</span></div>
				<span><?php echo anchor('http://'.$key['url'], $key['url'], array('target' => '_blank')) ?></span>
				
				<div><span class="label">Billede:</span></div>
				<span><?php echo anchor(base_url() . 'images/sponsors/'.$key['img_link'], 'Vis billede', array('target' => '_blank')) ?></span>

				<div><span class="label">Beskrivelse:</span></div>
				<span><?php echo $key['description'] ?></span>
			</div>
			
			<?php if (isset($key['value'])): ?>
				<div class="infolist">
					<div><span class="label">Donation pr. pakke:</span></div>
					<span><?php echo $key['value'] ?> kr</span>

					<div><span class="label">Pakker doneret:</span></div>
					<span><?php //echo $key['donation_count'] ?> stk</span>

					<div><span class="label">Donation ialt:</span></div>
					<span><?php //echo $key['donation_sum'] ?> kr</span>

					<div><span class="label">Donations loft:</span></div>
					<span><?php echo $key['maxvalue'] ?> kr</span>
				</div>
			<?php endif; ?>
			
			<div style="clear:both;"></div>
			
		</div>
	</li>
	
	<?php endforeach; ?>
	
</ul><!-- /contentlist -->