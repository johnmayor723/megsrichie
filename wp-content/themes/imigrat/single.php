<?php
/**
 * Blog Post Main File.
 *
 * @package IMIGRAT
 * @author  The Genious
 * @version 1.0
 */

get_header();
$data    = \IMIGRAT\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
$options = imigrat_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
	?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'imigrat_banner', $data );?>
<?php endif;?>

<!-- Start of Blog Details section
============================================= -->
<section id="imi_2-blog-details" class="imi_2-blog-details-section inner-page-padding">
    <div class="container">
        <div class="blog-details-content-area">
            <div class="row">
				<?php
                    if ( $data->get( 'layout' ) == 'left' ) {
                        do_action( 'imigrat_sidebar', $data );
                    }
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">            	
                    <?php while ( have_posts() ) : the_post(); ?>				
                    <div class="imigrat-blog-details">               	
                        <div class="thm-unit-test">    
                            <div class="blog-details-content">
                                <div class="blog-details-text-img-area headline pera-content">
                                    <div class="imi_2-blog-item">
                                        <?php if(has_post_thumbnail()){ ?>
                                        <div class="blog-img position-relative mb-30">
                                            <?php the_post_thumbnail('full'); ?>
                                            <?php if($options->get( 'single_post_author_box' ) ){ ?>
                                            <div class="imi_2-blog-author d-flex align-items-center position-absolute">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
                                                <span class="text-uppercase"><?php esc_html_e('BY:', 'imigrat'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"> <?php the_author(); ?></a></span>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if($options->get( 'single_post_date' ) || $options->get( 'single_post_comments' )){ ?>
                                        <div class="blog-meta-text headline pera-content">
                                            <div class="blog-meta">
                                                <?php if($options->get( 'single_post_date' ) ){ ?><a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><i class="fal fa-calendar-alt"></i> <?php echo get_the_date( ); ?></a><?php } ?>
                                                <?php if($options->get( 'single_post_comments' ) ){ ?><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><i class="fas fa-comments"></i> <?php comments_number( wp_kses(__('0 Comments' , 'imigrat'), true), wp_kses(__('01 Comment' , 'imigrat'), true), wp_kses(__('0% Comments' , 'imigrat'), true)); ?></a><?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="text"><?php the_content(); ?></div>
                                    <div class="clearfix"></div>
                                    <?php wp_link_pages(array('before'=>'<div class="paginate-links mt-30">'.esc_html__('Pages: ', 'imigrat'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                    
                                </div>
                                
                                <?php if(has_tag()){ ?>
                                <div class="imi_2-blog-share-tag d-flex justify-content-between ul-li align-items-center">
                                    <?php if(has_tag()){ ?>
                                    <div class="blog-hash-tag">
                                        <span><?php esc_html_e('Tags:', 'imigrat'); ?></span>
                                        <?php the_tags( '', '' ); ?>
                                    </div><!-- /.blog-details__tags -->
                                    <?php } ?>
                                    
                                    <?php if(function_exists('bunch_share_us_two')):?>
                                    <div class="blog-share d-flex align-items-center">
                                        <span><?php esc_html_e('Share', 'imigrat'); ?></span>
                                        <?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                                    </div><!-- /.blog-details__social -->
                                    <?php endif;?>
                                </div>
                                <?php } ?>
                                
                                <?php if( $options->get( 'single_post_author_box' ) ):?>
                                <div class="imi_2-blog-author d-flex flex-wrap align-items-center">
                                    <div class="inner-img">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 160); ?>
                                    </div>
                                    <div class="inner-text headline pera-content">
                                        <h4><?php the_author(); ?></h4>
                                        <p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?> </p>
                                        
										<?php $icons = $options->get( 'single_post_author_social_profile' );
											if ( ! empty( $icons ) ) :
										?>
                                        <div class="inner-social">
                                            <?php foreach ( $icons as $h_icon ) {            
												$icon_class = explode( '-', imigrat_set( $h_icon, 'icon' ) ); 
											?>
											<a href="<?php echo esc_url(imigrat_set( $h_icon, 'url' )); ?>" <?php if( imigrat_set( $h_icon, 'background' ) || imigrat_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(imigrat_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(imigrat_set( $h_icon, 'color' )); ?>"<?php endif;?> class="fab <?php echo esc_attr( imigrat_set( $h_icon, 'icon' ) ); ?>"></a>
											<?php } ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif;?>
                                
                                <?php if((get_previous_post()) || (get_next_post())): ?>
                                <div class="imi_2-project-next-prev-btn d-flex text-uppercase justify-content-between">
                                    <?php global $post; $prev_post = get_previous_post();
                                        if (!empty($prev_post)):
                                    ?>
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="far fa-long-arrow-left"></i> <?php esc_html_e('Previous Post' ,'imigrat'); ?></a>
                                    <?php endif ?>
                                    
                                    <?php global $post; $next_post = get_next_post();
                                        if (!empty($next_post)):
                                    ?>
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"> <?php esc_html_e('Next Post', 'imigrat'); ?> <i class="far fa-long-arrow-right"></i></a>
                                    <?php endif ?>
                                </div>
                                <?php endif ?>
                            </div>
                            
                            <!-- Comments Area -->
                            <?php comments_template(); ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    
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
