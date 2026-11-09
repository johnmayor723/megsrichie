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

    <footer id="imi-footer" class="imi-footer-section <?php if(empty( $options->get('footer_cta') )) echo 'pt-100';?>">
        <div class="container">
            <?php if(! empty( $options->get('footer_cta') )):?>
            <div class="imi-footer-cta-box-area">
                <div class="row">
                    <?php foreach($options->get('footer_cta') as $key => $imigrat_set): ?>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="imi-footer-cta-box  position-relative">
                            <div class="inner-icon position-absolute d-flex align-items-center justify-content-center">
                                <i class="fas <?php echo esc_attr( $imigrat_set['footer_cta_icon'] ); ?>"></i>
                            </div>
                            <div class="imi-footer-cta-box-item d-flex align-items-center position-relative" data-background="<?php echo wp_get_attachment_url($imigrat_set['footer_cta_img_v1']['id'], true);?>">
                                <div class="background_overlay"></div>
                                <div class="inner-text headline pera-content">
                                    <h3><?php echo wp_kses($imigrat_set['footer_cta_title'], true); ?></h3>
                                    <a class="text-uppercase" href="<?php echo esc_url($imigrat_set['footer_cta_btn_url']);?>"><?php echo wp_kses($imigrat_set ['footer_cta_btn_title'], true); ?> <i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif;?>
            
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
            <div class="imi-footer-widget-area">                
                <div class="row">
                <?php dynamic_sidebar( 'footer-sidebar' ); ?>	
                </div>                
            </div>
            <?php } ?>
            
			<?php if( $options->get( 'copyright_text1') ) :?>
            <div class="imi-footer-copyright pera-content text-center">
                <p><?php echo wp_kses( $options->get( 'copyright_text1'), true ); ?></p>
            </div>
            <?php endif; ?>
            
        </div>
    </footer>
