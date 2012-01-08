<?php echo form_open($action) ?>
	<fieldset>
		<?php echo form_hidden('id_event', $event_id) ?>
		<div class="clearfix <?php echo form_error('sponsor')?'error':''?>">
			<label for="sponsor">Vælg sponsor:</label>
			<div class="input">
				<select class="xlarge" size="10" name="sponsor" id="sponsor">
					<?php foreach($sponsors as $key): ?>
						<option value="<?php echo $key['id_sponsor'] ?>"><?php echo $key['name'] ?></option>
					<?php endforeach; ?>
				</select>
				<?php echo form_error('sponsor');?>
				<br /><?php echo anchor('admin/new_sponsor', 'Opret ny sponsor') ?>
			</div>
		</div><!-- /clearfix -->

		<div class="clearfix <?php echo form_error('donation_piece')?'error':''?>">
			<label for="donation_piece">Donation pr. scanning (kr.):</label>
			<div class="input">
				<input type="text" 
					   name="donation_piece" 
					   id="donation_piece" 
					   value="<?php echo set_value('donation_piece', $sponsor->donation_piece); ?>"
					   class="xlarge" />
				<?php echo form_error('donation_piece');?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('donation_max')?'error':''?>">
			<label for="donation_max">Donations loft (kr.):</label>
			<div class="input">
				<input type="text" 
					   name="donation_max" 
					   id="donation_max" 
					   value="<?php echo set_value('donation_max', $sponsor->donation_max); ?>"
					   class="xlarge" />
				<?php echo form_error('donation_max'); ?>
			</div>
		</div>
		<div class="actions">
			<?php echo form_button(array(
							'content' => $btn_action, 
							'class' => 'btn primary', 
							'type' => 'submit'
						)); ?>
		</div>
	</fieldset>
</form>