<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

$inviteShopClass = '';
if(is_active_sidebar('shop-sidebar')){
	$inviteShopClass = 'col-lg-8 mt-30';
}else{
	$inviteShopClass = 'col-lg-12 mt-30';
}
get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

$data  = \IMIGRAT\Includes\Classes\Common::instance()->data( 'archive' )->get();

?>

<section id="imi-breadcrumb" class="imi-breadcrumb-section position-relative" data-background="<?php echo esc_url( $data->get( 'banner' ) ); ?>">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="imi-breadcrumb-content position-relative headeline ul-li">
            <div class="breadcrumb-title text-center">
                <h2>
					<?php
						if ( is_product_category() ) {
							echo single_cat_title();
						} elseif ( is_product_tag() ) {
							echo single_tag_title();
						} elseif ( is_shop() ) {
							echo esc_html__( 'Shop', 'imigrat' );
						} elseif ( is_product_taxonomy() ) {
							echo single_term_title();
						} else {
							echo esc_html__( 'Shop', 'imigrat' );
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
<section class="shop pt-90 pb-110">
	<div class="container">
		<div class="row mt-none-30">
			<div class="<?php echo esc_attr($inviteShopClass);?>">
				<div class="woocommerce-content-wrap">
					<div class="woocommerce-toolbar-top ul_li_between mt-none-15">
						<?php woocommerce_result_count();?>
						<div class="woocommerce-toolbar-top-right ul_li">

							<!-- Filter -->
							<?php
								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );
							?>
						</div>
					</div>
					<div class="woocommerce-content-inner">
					<div class="products">
					<?php
							/**
							 * Hook: woocommerce_archive_description.
							 *
							 * @hooked woocommerce_taxonomy_archive_description - 10
							 * @hooked woocommerce_product_archive_description - 10
							 */
							do_action( 'woocommerce_archive_description' );
							?>
							<?php
							if ( woocommerce_product_loop() ) {



								woocommerce_product_loop_start();

								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();

										/**
										 * Hook: woocommerce_shop_loop.
										 */
										do_action( 'woocommerce_shop_loop' );

										wc_get_template_part( 'content', 'product' );
									}
								}

								woocommerce_product_loop_end();

								/**
								 * Hook: woocommerce_after_shop_loop.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								?>
								<div class="pagination_wrap pt-50">
									<?php imigrat_pagination();?>
								</div>
							<?php	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
								do_action( 'woocommerce_after_shop_loop' );
							} else {
								/**
								 * Hook: woocommerce_no_products_found.
								 *
								 * @hooked wc_no_products_found - 10
								 */
								do_action( 'woocommerce_no_products_found' );
							}

							/**
							 * Hook: woocommerce_after_main_content.
							 *
							 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
							 */
							do_action( 'woocommerce_after_main_content' );?>
					</div>
						<!-- pagination -->
					</div>
				</div>
			</div>
			<?php if(is_active_sidebar('shop-sidebar')){ ?>
			<div class="col-lg-4">
				<div class="shop-sidebar sidebar-area mt-none-30">
					<?php dynamic_sidebar('shop-sidebar') ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	</section>
<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
