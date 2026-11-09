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

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form-area">
    <input class="search-input" id="search" name="s" value="<?php echo get_search_query(); ?>" type="search" placeholder="<?php echo esc_attr__( 'Search Here', 'imigrat' ); ?>">
    <button type="submit" class="search-btn1">
        <i class="fas fa-search"></i>
    </button>	
</form>


