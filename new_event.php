<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin - Opret event</title>
	
	<!-- HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		
	<link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap-extend/bootstrap-extend.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/datepicker.css" />

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
	<script src="js/datepicker.js"></script>
	<script src="js/script.js"></script>
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
			<h1>Opret event <small>Small description</small></h1>
		</div>
		
		<ul class="breadcrumb">
			<li><a href="#">Panel</a> <span class="divider">/</span></li>
			<li><a href="#">Events</a> <span class="divider">/</span></li>
			<li class="active">Opret event</li>
		</ul><!-- /breadcrumb -->

		<form action="#" method="post">
			<fieldset>
				
				<div class="clearfix <?php //echo form_error('event_name')?'error':''?>">
					<label for="event_name">Navn:</label>
					<div class="input">
						<input type="text" 
							   name="event_name" 
							   id="event_name" 
							   value="<?php //echo set_value('event_name'); ?>"
							   class="xlarge" />
						<?php //echo form_error('event_name');?>
					</div>
				</div>
				<div class="clearfix <?php //echo form_error('event_startdate')?'error':''?>">
					<label for="event_startdate">Start dato / tid:</label>
					<div class="input">
						<input type="text" 
							   name="event_startdate" 
							   id="event_startdate"
							   value="<?php //echo set_value('event_startdate'); ?>"
							   maxlength="10"
							   readonly="readonly"
							   class="small-date" />
						<?php //echo form_error('event_startdate');?>

						<select class="mini" name="event_start-hour" id="event_start-hour">
							<option>00</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
						</select>
						<span>:</span>
						<select class="mini" name="event_start-min" id="event_start-min">
							<option>00</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
							<option>32</option>
							<option>33</option>
							<option>34</option>
							<option>35</option>
							<option>36</option>
							<option>37</option>
							<option>38</option>
							<option>39</option>
							<option>40</option>
							<option>41</option>
							<option>42</option>
							<option>43</option>
							<option>44</option>
							<option>45</option>
							<option>46</option>
							<option>47</option>
							<option>48</option>
							<option>49</option>
							<option>50</option>
							<option>51</option>
							<option>52</option>
							<option>53</option>
							<option>54</option>
							<option>55</option>
							<option>56</option>
							<option>57</option>
							<option>58</option>
							<option>59</option>
						</select>
					</div>
				</div>
				<div class="clearfix <?php //echo form_error('event_enddate')?'error':''?>">
					<label for="event_enddate">Slut dato / tid:</label>
					<div class="input">
						<input type="text" 
							   name="event_enddate" 
							   id="event_enddate"
							   value="<?php //echo set_value('event_enddate'); ?>"
							   maxlength="10"
							   readonly="readonly"
							   class="small-date" />
						<?php //echo form_error('event_enddate');?>

						<select class="mini" name="event_start-hour" id="event_end-hour">
							<option>00</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
						</select>
						<span>:</span>
						<select class="mini" name="event_start-min" id="event_start-min">
							<option>00</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
							<option>32</option>
							<option>33</option>
							<option>34</option>
							<option>35</option>
							<option>36</option>
							<option>37</option>
							<option>38</option>
							<option>39</option>
							<option>40</option>
							<option>41</option>
							<option>42</option>
							<option>43</option>
							<option>44</option>
							<option>45</option>
							<option>46</option>
							<option>47</option>
							<option>48</option>
							<option>49</option>
							<option>50</option>
							<option>51</option>
							<option>52</option>
							<option>53</option>
							<option>54</option>
							<option>55</option>
							<option>56</option>
							<option>57</option>
							<option>58</option>
							<option>59</option>
						</select>
					</div>
				</div>
				<div class="clearfix <?php //echo form_error('event_place')?'error':''?>">
					<label for="event_place">Sted:</label>
					<div class="input">
						<input type="text" 
							   name="event_place" 
							   id="event_place" 
							   value="<?php //echo set_value('event_place'); ?>"
							   class="xlarge" />
						<?php //echo form_error('event_place');?>
					</div>
				</div>
				<div class="clearfix <?php //echo form_error('event_organizer')?'error':''?>">
					<label for="event_organizer">Arrangør:</label>
					<div class="input">
						<input type="text" 
							   name="event_organizer" 
							   id="event_organizer" 
							   value="<?php //echo set_value('event_organizer'); ?>"
							   class="xlarge" />
						<?php //echo form_error('event_organizer');?>
					</div>
				</div>
				<div class="clearfix <?php //echo form_error('event_description')?'error':''?>">
					<label for="event_description">Beskrivelse:</label>
					<div class="input">
						<textarea name="event_description"
							   id="event_description"
							   rows="7"
							   maxlength="256"
							   class="xlarge"
							   style="resize: none;"><?php //echo set_value('event_description'); ?></textarea>
						<?php //echo form_error('event_description'); ?>
					</div>
				</div>

				<div class="actions">
					<button type="submit" name="submit" class="btn primary">
						Opret event
					</button>
				</div>
			</fieldset>
		</form>
		
	</div><!-- /container -->	
</body>

</html>
