<?php
/**
 * Sidebar Template
 *
 * @package    WordPress
 * @subpackage IMIGRAT
 * @author     TheGenious
 * @version    1.0
 */
 
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'sidebar_type' ) == 'e' AND $data->get( 'sidebar_elementor' ) ) {
?>
	<div class="col-lg-4">
		<div class="imi-blog-sidebar-widget-area">
			<?php
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'sidebar_elementor' ) );
			?>
		</div>
	</div>
	<?php
	return false;
} else {
	$options = $data->get( 'sidebar' );
}

?>

<?php if ( is_active_sidebar( $options ) ) : ?>
	<div class="col-lg-4">
		<div class="imi-service-details-sidebar-widget">
			<?php dynamic_sidebar( $options ); ?>
		</div>
	</div>
<?php endif; ?>
