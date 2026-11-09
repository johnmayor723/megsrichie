<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage IMIGRAT
 * @author     Themexriver
 * @version    1.0
 */

if ( class_exists( 'Imigrat_Resizer' ) ) {
	$img_obj = new Imigrat_Resizer();
} else {
	$img_obj = array();
}
$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>
	
    
    <div class="imi_2-blog-item">
        <?php if( has_post_thumbnail() ){?>
        <div class="blog-img position-relative">
            <?php the_post_thumbnail('full'); ?>
            <div class="imi_2-blog-author d-flex align-items-center position-absolute">
                <?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
                <span class="text-uppercase"><?php esc_html_e('BY:', 'imigrat'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"> <?php the_author(); ?></a></span>
            </div>
        </div>
        <?php };?>
        <div class="blog-meta-text headline pera-content">
            <div class="blog-meta">
                <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><i class="fal fa-calendar-alt"></i> <?php echo get_the_date( ); ?></a>
                <a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><i class="fal fa-comments"></i> <?php comments_number( wp_kses(__('0 Comments' , 'imigrat'), true), wp_kses(__('01 Comment' , 'imigrat'), true), wp_kses(__('0% Comments' , 'imigrat'), true)); ?></a>
            </div>
            <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
            <a class="read_more" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('Read More', 'imigrat'); ?> <i class="fal fa-long-arrow-right"></i></a>
        </div>
    </div>    

</div>