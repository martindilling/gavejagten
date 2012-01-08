<?php echo form_open_multipart($action) ?>
	<fieldset>
		<?php echo form_hidden('id_sponsor', $sponsor->id_sponsor) ?>
		<div class="clearfix <?php echo form_error('sponsor_name')?'error':''?>">
			<label for="sponsor_name">Navn:</label>
			<div class="input">
				<input type="text" 
					   name="sponsor_name" 
					   id="sponsor_name" 
					   value="<?php echo set_value('sponsor_name', $sponsor->name); ?>"
					   class="xlarge" />
				<?php echo form_error('sponsor_name');?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('sponsor_url')?'error':''?>">
			<label for="sponsor_url">Hjemmeside:</label>
			<div class="input">
				<div class="input-prepend">
					<span class="add-on">http://</span>
					<input type="text" 
						   name="sponsor_url" 
						   id="sponsor_url" 
						   value="<?php echo set_value('sponsor_url', $sponsor->url); ?>"
						   class="xlarge-http" />
					<?php echo form_error('sponsor_url'); ?>
				</div>
			</div>
		</div>

		<div class="clearfix <?php echo form_error('sponsor_description')?'error':''?>">
			<label for="sponsor_description">Beskrivelse:</label>
			<div class="input">
				<textarea name="sponsor_description"
					   id="sponsor_description"
					   rows="7"
					   maxlength="256"
					   class="xlarge"
					   style="resize: none;"><?php echo set_value('sponsor_description', $sponsor->description); ?></textarea>
				<?php echo form_error('sponsor_description'); ?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('sponsor_logo')?'error':''?>">
			<label for="sponsor_logo">Logo:</label>
			<div class="input">
				<?php echo form_upload($data = array(
										'name'	=> 'sponsor_logo',
										'id'	=> 'sponsor_logo',
										'size'	=> '100',
										'class'	=> 'input-file'
									)); ?>
				
				<?php echo form_error('sponsor_logo'); ?>
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