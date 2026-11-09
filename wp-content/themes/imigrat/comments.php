<?php
/**
 * Comments Main File.
 *
 * @package IMIGRAT
 * @author  The Genious
 * @version 1.0
 */
?>

<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $count = wp_count_comments(get_the_ID()); ?>

<div class="imi_2-commet-box-area">
	<div class="blog_comment_box headline">
		<?php if ( have_comments() ) : ?>
            
        <div class="post-comments mt-70" id="comments">
            <h3 class="m-title"><?php $comments_number = get_comments_number();
                if ( '1' === $comments_number ) {
                    /* translators: %s: post title */
                    printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'imigrat' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s Reply to &ldquo;%2$s&rdquo;',
                            '%1$s Replies to &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'imigrat'
                        ),
                        number_format_i18n( $comments_number ),
                        get_the_title()
                    );
                } ?>
            </h3>
            <div class="comment_box_area ul-li-block">
                <ul class="comment_itemlist">
                    <li>
					<?php
                        wp_list_comments( array(
                            'style'       => 'div',
                            'short_ping'  => true,
                            'avatar_size' => 100,
                            'callback'    => 'imigrat_list_comments',
                        ) );
                    ?>
                    </li>
                </ul>
           </div>  
        
           <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
           <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading">
                    <?php esc_html_e( 'Comment navigation', 'imigrat' ); ?>
                </h1>
                <div class="nav-previous">
                    <?php previous_comments_link( esc_html__( '&larr; Older Comments', 'imigrat' ) ); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'imigrat' ) ); ?>
                </div>
            </nav><!-- .comment-navigation -->
            <?php endif; ?>
            
            <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments">
                <?php esc_html_e( 'Comments are closed.', 'imigrat' ); ?>
            </p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
		<?php imigrat_comment_form(); ?>
	
	</div>
</div>