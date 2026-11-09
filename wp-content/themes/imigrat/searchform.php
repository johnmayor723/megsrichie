<?php
/**
 * Search Form template
 *
 * @package IMIGRAT
 * @author The Genious
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="search-widget">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search here...', 'imigrat' ); ?>">
        <button><i class="fal fa-search"></i></button>
    </form>
</div>
