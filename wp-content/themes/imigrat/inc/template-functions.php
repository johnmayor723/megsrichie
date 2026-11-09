<?php

function imigrat_pagination() {
    global $wp_query;
    $links = paginate_links( array(
    'current'   => max( 1, get_query_var( 'paged' ) ),
    'total'     => $wp_query->max_num_pages,
    'type'      => 'list',
    'mid_size'  => 3,
    'prev_text' => '<i class="fal fa-angle-double-left"></i>',
    'next_text' => '<i class="fal fa-angle-double-right"></i>',
    ) );

    echo wp_kses_post( $links );
}