<div class="well">
	<ul class="toolbar">
		<li><?php echo anchor('admin/add_sponsor', '<img src="'. base_url() .'images/icons/add.png" height="16" width="16" /> Tilføj sponsor', array('class' => 'btn success')) ?></li>
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
							<li><?php echo anchor('admin/show_report', 'Vis rapport', array('class' => 'btn small')) ?></li>
						</ul>
					</li><!-- /group -->
					<li class="group right">
						<ul>
							<li><a href="#" class="btn small info"><img src="<?php echo base_url() ?>images/icons/edit.png" height="16" width="16" /> Rediger sponsors donation</a></li>
							<li><a href="#" class="btn small danger"><img src="<?php echo base_url() ?>images/icons/delete.png" height="16" width="16" /> Slet sponsor</a></li>
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