<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$data  = \IMIGRAT\Includes\Classes\Common::instance()->data( 'archive' )->get();
get_header( 'shop' );
?>

<section id="imi-breadcrumb" class="imi-breadcrumb-section position-relative" data-background="<?php echo esc_url( $data->get( 'banner' ) ); ?>">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="imi-breadcrumb-content position-relative headeline ul-li">
            <div class="breadcrumb-title text-center">
                <h2>

					<!-- product details page title -->
					<?php
						if ( is_product_category() ) {
							echo single_cat_title();
						} elseif ( is_product_tag() ) {
							echo single_tag_title();
						} elseif ( is_shop() ) {
							echo esc_html__( 'Shop', 'imigrat' );
						} elseif ( is_product_taxonomy() ) {
							echo single_term_title();
						} else if(is_single()){
							echo the_title();
						} else {
							echo esc_html__( 'Shop Details', 'imigrat' );
						}
					?>

				</h2>
            </div>
            <div class="imi-breadcrumb-list position-absolute">
                <ul>
                    <?php echo imigrat_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="shop-single-section pt-120 pb-60">
    <div class="container">
		<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?>
	</div>
</section>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
