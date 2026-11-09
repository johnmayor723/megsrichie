<?php get_header(); 
	$data = \IMIGRAT\Includes\Classes\Common::instance()->data( 'single-jobs' )->get(); 
	
	$layout = $data->get('layout');
    $sidebar = $data->get('sidebar');
    $layout = ($layout) ? $layout : 'right';
    $sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
    if (is_active_sidebar($sidebar)) {
        $layout = 'right';
    } else {
        $layout = 'full';
    }
    $class = (!$layout || $layout == 'full') ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
    $options = imigrat_WSH()->option();
    
    $allowed_tags = wp_kses_allowed_html('post');
?>

<section id="imi-breadcrumb" class="imi-breadcrumb-section position-relative" data-background="<?php echo esc_url( $data->get( 'banner' ) ); ?>">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="imi-breadcrumb-content position-relative headeline ul-li">
            <div class="breadcrumb-title text-center">
                <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
            </div>
            <div class="imi-breadcrumb-list position-absolute">
                <ul>
                    <?php echo imigrat_the_breadcrumb(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Start of job Details section
============================================= -->
<section id="imi-job-details" class="imi-job-details-section inner-page-padding">
    <div class="container">
        <div class="imi-job-details-content">
            <div class="row">
				<?php
                if ($data->get('layout') == 'left') {
                    do_action('imigrat_sidebar', $data);
                } ?>
                
                <?php 
                    while( have_posts() ) : the_post();
                    $imigrat_jobs_meta = get_post_meta( get_the_ID(), 'imigrat_meta_jobs', true );
					$term_list = wp_get_post_terms(get_the_id(), 'jobs_cat', array("fields" => "names"));
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    
                    <div class="imi-job-details-img-text-content">
                        <div class="imi-job-details-img position-relative">
                            <?php if( $imigrat_jobs_meta['jobs_detail_image']['id'] ):?>
                            <img src="<?php echo esc_url( wp_get_attachment_url( $imigrat_jobs_meta['jobs_detail_image']['id'], true ) );?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat'); ?>">
                            <?php endif;?>
                            
                            <div class="job-tag text-uppercase position-absolute">
                                <?php echo implode( ', ', (array)$term_list );?>
                            </div>
                            
                            <div class="job-icon position-absolute">
                                <img src="<?php echo wp_get_attachment_url($imigrat_jobs_meta['imigrat_social_icon_image']['id'], true);?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat');?>">
                            </div>
                            
                        </div>
                        <div class="imi-job-details-text headline pera-content ul-li-block">                            
                            
							<?php if($imigrat_jobs_meta['show_job_info']){ ?>
                            <div class="imi-job-details-info d-flex flex-wrap justify-content-between">
                                <?php 						
									foreach($imigrat_jobs_meta['jobs_features'] as $key => $imigrat_set):                    
									$imigrat_jobs_meta = get_post_meta(get_the_ID(), 'imigrat_meta_jobs', true );											
								?>
                                <div class="info-items-area pera-content">
                                    <div class="icon-title d-flex  align-items-center">
                                        <div class="inner-icon">
                                            <i class="fal <?php echo esc_attr( $imigrat_set['job_info_icon'], true );?>"></i>
                                        </div>
                                        <div class="inner-title">
                                            <?php echo wp_kses($imigrat_set['job_info_title'], true ); ?>
                                        </div>
                                    </div>
                                    <div class="inner-info">
                                        <?php echo wp_kses($imigrat_set['job_info_description'], true ); ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php } ?>
                            
                            <div class="imi-job-details-text-desc">
                                <div class="imi-job-desc-title-date flex-wrap d-flex justify-content-between">
                                    <h4><?php the_title(); ?></h4>
                                    <span><?php esc_html_e('Posted on:', 'imigrat'); ?> <?php echo get_the_date(); ?></span>
                                </div>
								
								<?php the_content(); ?>
                                
                                <?php if($imigrat_jobs_meta['show_apply_button']){ ?>
                                <div class="imi-btn-2 text-uppercase">
                                    <a href="<?php echo esc_url($imigrat_jobs_meta['job_btn_link']); ?>"><?php echo wp_kses($imigrat_jobs_meta['job_btn_title'], true ); ?> <i class="fal fa-long-arrow-right"></i></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>    
				<?php endwhile; ?>
                            
                <?php
                if ($data->get('layout') == 'right') {
                    do_action('imigrat_sidebar', $data);
                } ?>
        	</div>                
        </div><!-- /.row gutter-y-60 -->
    </div><!-- /.container -->
</section>
<!--  Service details end-->
<?php get_footer(); ?>