<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- header start  -->
	<header class="header">
		<div class="container">
			<div class="header-main">
				<div class="logo">
					<?php
					if (has_custom_logo()) {
						the_custom_logo();
					} else {
						echo "<a href=' " . home_url('/') . " '>" . "<img src=' " . get_template_directory_uri() . "/assets/images/eventproweb2logo1.png" . " '></a> ";
					}
					;
					?>
				</div>

				<?php echo get_template_part('template-parts/navigation'); ?>
			</div>
		</div>
	</header>
	<!-- header end  -->