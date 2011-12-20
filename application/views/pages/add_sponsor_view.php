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
				<br /><?php echo anchor('admin/new_sponsor', 'Opret ny sponsor') ?>
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
				Tilføj til "-event"
			</button>
		</div>
	</fieldset>
</form>