<?php echo form_open($action) ?>
	<fieldset>
		<?php echo form_hidden('id_event', $event->id_event) ?>
		<div class="clearfix <?php echo form_error('event_name')?'error':''?>">
			<label for="event_name">Navn:</label>
			<div class="input">
				<input type="text" 
					   name="event_name" 
					   id="event_name" 
					   value="<?php echo set_value('event_name', $event->name) ?>"
					   class="xlarge" />
				<?php echo form_error('event_name');?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('event_startdate')?'error':''?>">
			<label for="event_startdate">Start dato / tid:</label>
			<div class="input">
				<input type="text" 
					   name="event_startdate" 
					   id="event_startdate"
					   value="<?php echo set_value('event_startdate', $event->startdate) ?>"
					   maxlength="10"
					   readonly="readonly"
					   class="small-date" />				

				<select class="mini" name="event_start_hour" id="event_start_hour">
					<?php
						//looping 24 times, echoing <option> or selected option
						for ($i = 0; $i < 24; $i++) {
							if ($event->start_hour) {
								if (sprintf('%02d', $i) == $event->start_hour) {
									echo "<option selected='selected'>".sprintf('%02d', $i)."</option>";
								} else {
									echo "<option>".sprintf('%02d', $i)."</option>";
								}
							} else {
								echo "<option>".sprintf('%02d', $i)."</option>";
							}
						}
					?>
				</select>
				<span>:</span>
				<select class="mini" name="event_start_min" id="event_start_min">
					<?php
						//looping 60 times, echoing <option> or selected option
						for ($i = 0; $i < 60; $i++) {
							if (sprintf('%02d', $i) == $event->start_min) {
								echo "<option selected='selected'>".sprintf('%02d', $i)."</option>";
							} else {
								echo "<option>".sprintf('%02d', $i)."</option>";
							}
						}
					?>
				</select>
				
				<?php echo form_error('event_startdate');?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('event_enddate')?'error':''?>">
			<label for="event_enddate">Slut dato / tid:</label>
			<div class="input">
				<input type="text" 
					   name="event_enddate" 
					   id="event_enddate"
					   value="<?php echo set_value('event_enddate', $event->enddate); ?>"
					   maxlength="10"
					   readonly="readonly"
					   class="small-date" />

				<select class="mini" name="event_end_hour" id="event_end_hour">
					<?php
						//looping 24 times, echoing <option> or selected option
						for ($i = 0; $i < 24; $i++) {
							if (sprintf('%02d', $i) == $event->end_hour) {
								echo "<option selected='selected'>".sprintf('%02d', $i)."</option>";
							} else {
								echo "<option>".sprintf('%02d', $i)."</option>";
							}
						}
					?>
				</select>
				<span>:</span>
				<select class="mini" name="event_end_min" id="event_end_min">
					<?php
						//looping 60 times, echoing <option> or selected option
						for ($i = 0; $i < 60; $i++) {
							if (sprintf('%02d', $i) == $event->end_min) {
								echo "<option selected='selected'>".sprintf('%02d', $i)."</option>";
							} else {
								echo "<option>".sprintf('%02d', $i)."</option>";
							}
						}
					?>
				</select>
				
				<?php echo form_error('event_enddate');?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('event_place')?'error':''?>">
			<label for="event_place">Sted:</label>
			<div class="input">
				<input type="text" 
					   name="event_place" 
					   id="event_place" 
					   value="<?php echo set_value('event_place', $event->place); ?>"
					   class="xlarge" />
				<?php echo form_error('event_place');?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('event_organizer')?'error':''?>">
			<label for="event_organizer">Arrangør:</label>
			<div class="input">
				<input type="text" 
					   name="event_organizer" 
					   id="event_organizer" 
					   value="<?php echo set_value('event_organizer', $event->organizer); ?>"
					   class="xlarge" />
				<?php echo form_error('event_organizer');?>
			</div>
		</div>
		<div class="clearfix <?php echo form_error('event_description')?'error':''?>">
			<label for="event_description">Beskrivelse:</label>
			<div class="input">
				<textarea name="event_description"
					   id="event_description"
					   rows="7"
					   maxlength="256"
					   class="xlarge"
					   style="resize: none;"><?php echo set_value('event_description', $event->description); ?></textarea>
				<?php echo form_error('event_description'); ?>
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