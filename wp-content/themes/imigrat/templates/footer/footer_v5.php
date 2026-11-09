<?php
/**
 * Footer Template  File
 *
 * @package IMIGRAT
 * @author  Themexriver
 * @version 1.0
 */
$options = imigrat_WSH()->option();

?>

<footer id="imi-5-footer" class="main-footer style-two pt-100">
    <div class="container">
        <?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?>
        <div class="imi-4-footer-widget-wrapper widgets-section">
            <div class="row">
                <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
            </div>
        </div>
        <?php } ?>

        <?php if( $options->get( 'copyright_text5') ) :?>
        <div class="copyright">
            <p><?php echo wp_kses( $options->get( 'copyright_text5'), true ); ?></p>
        </div>
        <?php endif; ?>
    </div>
</footer>