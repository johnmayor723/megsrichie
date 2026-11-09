<?php 
/* Template Name: Home Imigrat Page */ 
/**
 * @package IMIGRAT
 * @author  TheGenious
 * @version 1.0
 */
?>
<?php 
get_header();
?>
<?php while ( have_posts() ): the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
