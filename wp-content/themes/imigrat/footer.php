<?php
/**
 * Footer Main File.
 *
 * @package IMIGRAT
 * @author  The Genious
 * @version 1.0
 */
global $wp_query;
$options = imigrat_WSH()->option(); 
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>
		
        
    <div class="clearfix"></div>
    <?php imigrat_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>
    
</div>
<!--End Page Wrapper-->

<?php wp_footer(); ?>
</body>
</html>
