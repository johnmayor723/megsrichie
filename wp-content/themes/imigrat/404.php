<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Imigrat
 * @author     The Genious <admin@thegenious.com>
 * @version    1.0
 */
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<?php get_header();
$data = \IMIGRAT\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'imigrat_banner', $data );
$options = imigrat_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <!-- Error Section -->
    <section class="error-section">
    	<div class="auto-container">
        	<div class="content">
            	<h1>
                	<?php 
						if( $options->get( '404-page_title' ) ){
							echo wp_kses( $options->get( '404-page_title' ), true );
						}else{
							esc_html_e( '404', 'imigrat' );
						}
					?>
                </h1>
                <h2>
                	<?php 
						if( $options->get( '404_page_sub_title' ) ){
							echo wp_kses( $options->get( '404_page_sub_title' ), true );
						}else{
							esc_html_e( 'Oops! That page can’t be found', 'imigrat' );
						}
					?>
                </h2>
                <div class="text">
                	<?php 
						if( $options->get( '404-page-text' ) ){
							echo wp_kses( $options->get( '404-page-text' ), true );
						}else{
							esc_html_e( 'Sorry, but the page you are looking for does not existing', 'imigrat' );
						}
					?>
                </div>
                
				<?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                <div class="imi-btn-1 text-uppercase">
                    <a href="<?php echo( home_url( '/' ) ); ?>">
                    <?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Go To Home', 'imigrat' ); ?>
                    </a>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </section>
    <!-- End Error Section -->
         
<?php
}
get_footer(); ?>
