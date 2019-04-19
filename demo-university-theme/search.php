
<?php
/*
Template Name: Search Pages Template
*/
?>

<?php get_header();?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">Search Results</h1>
      <div class="page-banner__intro">
      </div>
    </div>  
</div>

<div class="container container--narrow page-section">
	<p> Keyword: <?php the_search_query()?> </p>

	

	<div class="generic-content">
		<?php 
			if ( have_posts() ) {
		    	echo '<ul>';
			    while ( have_posts() ) {
			        the_post();
			        echo '<li> <a href="'. get_the_permalink().'">' . get_the_title() . '</a> - '.  get_the_time('F j, Y'). '</li>';
			        the_excerpt();
			    }
		    	echo '</ul>';
			} ?>
	</div>
<?php get_footer(); ?>