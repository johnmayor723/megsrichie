<?php
/**
 * Footer Template  File
 *
 * @package IMIGRAT
 * @author  Themexriver
 * @version 1.0
 */
$options = imigrat_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<footer id="imi-footer" class="main-footer <?php if(empty( $options->get('footer_cta') )) echo 'pt-100';?>">
    <div class="container">

        <?php if(! empty( $options->get('footer_cta') )):?>
        <div class="upper-box">
            <div class="row clearfix">
                <?php foreach($options->get('footer_cta') as $key => $imigrat_set): ?>
                <div class="help-block_one col-lg-6 col-md-12 col-sm-12">
                    <div class="help-block_one-inner">
                        <div class="help-block_one-image" style="background-image: url(<?php echo wp_get_attachment_url($imigrat_set['footer_cta_img_v1']['id'], true);?>)"></div>
                        <div class="help-block_one-icon fas <?php echo esc_attr( $imigrat_set['footer_cta_icon'] ); ?>"></div>
                        <h4><?php echo wp_kses($imigrat_set['footer_cta_title'], true); ?></h4>
                        <a class="book_now" href="<?php echo esc_url($imigrat_set['footer_cta_btn_url']);?>">
                            <?php echo wp_kses($imigrat_set ['footer_cta_btn_title'], true); ?>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif;?>

        <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
        <div class="imi-footer-widget-area <?php if(empty( $options->get('footer_cta') )){echo 'pt-0';} else {echo 'pt-90';}  ?>">
            <div class="row">
                <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
            </div>
        </div>
        <?php } ?>

        <?php if( $options->get( 'copyright_text4') ) :?>
        <div class="copyright">
            <p><?php echo wp_kses( $options->get( 'copyright_text4'), true ); ?></p>
        </div>
        <?php endif; ?>

    </div>
</footer>
