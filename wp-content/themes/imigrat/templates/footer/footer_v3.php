<?php
/**
 * Footer Template  File
 *
 * @package IMIGRAT
 * @author  Themexriver
 * @version 1.0
 */
$options = imigrat_WSH()->option();

$footer_logo_img_v3 = $options->get( 'footer_logo_img_v3' );
$footer_logo_img_v3 = imigrat_set( $footer_logo_img_v3, 'url' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>

        <footer id="imi-2-footer" class="imi-2-footer-section">
            <div class="container">
                <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
                <div class="imi-2-footer-widget-wrapper">
                    <div class="row">
                      <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>  
                    </div>
                </div>
                <?php } ?>
                
                <?php if($footer_logo_img_v3 || $options->get( 'copyright_text2' )) { ?>
                <div class="imi-2-footer-copyright d-flex justify-content-between align-items-center">
                    <?php if($footer_logo_img_v3){ ?>
                    <div class="copyright-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_logo_img_v3); ?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat'); ?>"></a>
                    </div>
                    <?php } ?>
                    
                    <?php if($options->get( 'copyright_text2' )){ ?>
                    <div class="copyright-text">
                        <?php echo wp_kses( $options->get( 'copyright_text2' ), true ); ?>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                
            </div>
        </footer>