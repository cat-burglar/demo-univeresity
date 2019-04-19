<?php 
	/*
	Template Name: System Template
	*/
	get_header();

	while(have_posts()) {
		the_post(); ?>

		<div class="page-banner">
		    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
		    <div class="page-banner__content container container--narrow">
		      <h1 class="page-banner__title"><?php the_title(); ?></h1>
		      </div>
		    </div>  
	 	</div>

		<div class="container container--narrow page-section">

		<?php 
			$getParentID = wp_get_post_parent_id(get_the_ID());
			if ($getParentID) { ?>
				<div class="metabox metabox--position-up metabox--with-home-link">
					<p><a class="metabox__blog-home-link" href="<?php echo get_permalink($parentID)?>"><i class="fa fa-home" aria-hidden="true"></i> 
		  				Back to <?php echo get_the_title($getParentID)?>
					</a><span class="metabox__main"><?php the_title(); ?></span></p>
				</div>
			<?php }
		?>
		
		<?php
			$getChildren = get_pages(array(
				'child_of' => get_the_ID()
			));

			if($getParentID || $getChildren) { ?>
				<div class="page-links">
				  <h2 class="page-links__title">
				  	<a href="<?php echo get_permalink($parentID)?>">
				  		<?php echo get_the_title($getParentID) ?>	
				  	</a>
				  </h2>

				  <ul class="min-list">
				    <?php 
				    	if ($getParentID) {
				    		$sidebarParentID = $getParentID; 
				    	} else {
				    		$sidebarParentID = get_the_ID();
				    	}
				    	wp_list_pages(array(
				    		'title_li' => NULL,
				    		'child_of' => $sidebarParentID
				    	));
				    ?>
				  </ul>
				</div>
			<?php }
		?>
		<div class="generic-content">
		 	<p><?php the_content() ?></p>
		  	<div class ="newCustom">
				THIS IS TRIAL FOR DATABASE
				<?php 
					$pets = $wpdb->get_results( "SELECT id, name FROM {$wpdb->prefix}pet" );
					foreach ( $pets as $pet ) {
					echo $pet->name;
					}
				?>
			</div>
		</div>
	<?php } ?>
	<?php get_footer(); ?>
