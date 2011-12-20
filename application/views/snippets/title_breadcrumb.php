<!-- Header and Breadcrumb
================================================== -->
<div class="container toppadding">

	<div class="page-header">
		<h1><?php echo $headline ?> <small><?php echo $subheadline ?></small></h1>
	</div>

	<ul class="breadcrumb">
		<?php 
			$toEnd = count($breadcrumbs);
			foreach ($breadcrumbs as $key => $value) {
				if (--$toEnd) {
					echo "<li>" . anchor($value, $key) . " <span class='divider'>/</span></li>";
				} else {
					echo "<li class='active'>$key</li>";
				}

			}
		?>
	</ul><!-- /breadcrumb -->