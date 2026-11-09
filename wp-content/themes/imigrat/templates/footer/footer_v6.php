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

<footer id="imi-5-footer" class="main-footer style-three pt-100">
    <div class="container">
        <?php if ( is_active_sidebar( 'footer-sidebar-5' ) ) { ?>
        <div class="imi-5-footer-widget-wrapper widgets-section">
            <div class="row">
                <?php dynamic_sidebar( 'footer-sidebar-5' ); ?>
            </div>
        </div>
        <?php } ?>

        <?php if( $options->get( 'copyright_text6') ) :?>
        <div class="copyright">
            <p><?php echo wp_kses( $options->get( 'copyright_text6'), true ); ?></p>
        </div>
        <?php endif; ?>
    </div>
</footer>