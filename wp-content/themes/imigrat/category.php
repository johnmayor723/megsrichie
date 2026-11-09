<?php
/**
 * Archive Main File.
 *
 * @package IMIGRAT
 * @author  The Genious
 * @version 1.0
 */
get_header();
global $wp_query;
$data  = \IMIGRAT\Includes\Classes\Common::instance()->data( 'category' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'imigrat_banner', $data );?>
<?php else:?>
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
<?php endif;?>
    
<!-- Sidebar Page Container -->
<section id="imi_2-blog-feed" class="imi_2-blog-feed-section inner-page-padding">
    <div class="container">
        <div class="imi_2-blog-feed-content">
            <div class="row">
				<?php
                    if ( $data->get( 'layout' ) == 'left' ) {
                        do_action( 'imigrat_sidebar', $data );
                    }
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    <div class="imi_2-blog-feed-area">
                        <div class="thm-unit-test">
                        
                            <?php
                                while ( have_posts() ) :
                                    the_post();
                                    imigrat_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        
                        </div>
                	</div>
                    <!--Pagination-->
                    <div class="styled-pagination">
                        <?php imigrat_the_pagination( $wp_query->max_num_pages );?>
                    </div>
                </div>
                
                <?php
                    if ( $data->get( 'layout' ) == 'right' ) {
                        do_action( 'imigrat_sidebar', $data );
                    }
                ?>
            </div>
    	</div>
    </div>
</section>
<!--End blog area--> 
	<?php
}
get_footer();
