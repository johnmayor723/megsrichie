<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Udayraj
 * @author     Udayraj
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}


?>
<?php if ( $data->get( 'enable_banner' ) ) :
?>

<!-- Start of Breadcrumb section -->
<section id="imi-breadcrumb" class="imi-breadcrumb-section position-relative" data-background="<?php echo esc_url( $data->get( 'banner' ) ); ?>">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="imi-breadcrumb-content position-relative headeline ul-li">
            <div class="breadcrumb-title text-center">
                <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
            </div>
            <div class="imi-breadcrumb-list position-absolute">
                <ul>
                    <?php echo imigrat_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End of Breadcrumb section -->

<?php endif; ?>