<?php
/**
 * Default Template Main File.
 *
 * @package IMIGRAT
 * @author  TheGenious
 * @version 1.0
 */

get_header();
$data  = \IMIGRAT\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if ( $layout == 'right') {
    $layout = 'right';
} else if( $layout == 'left') {
    $layout = 'left';
} else {
    $layout = 'full';
}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'imigrat_banner', $data );?>
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

                            <?php while ( have_posts() ): the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>

                            <div class="clearfix"></div>
                            <?php
                            $defaults = array(
                                'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'imigrat' ),
                                'after'  => '</div>',

                            );
                            wp_link_pages( $defaults );
                            ?>
                            <?php comments_template() ?>
                        </div>
                    </div>
                </div>
                <?php
                if ( $layout == 'right' ) {
                    $data->set('sidebar', 'default-sidebar');
                    do_action( 'imigrat_sidebar', $data );
                }
                ?>
        	</div>
    	</div>
    </div>
</section>
<?php get_footer(); ?>
