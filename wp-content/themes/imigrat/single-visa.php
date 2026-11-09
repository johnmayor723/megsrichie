<?php get_header(); 
	$data = \IMIGRAT\Includes\Classes\Common::instance()->data( 'single-visa' )->get(); 
	
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

<!-- Start of Visa Details section
============================================= -->
<section id="visa-details" class="visa-details-section inner-page-padding">
    <div class="container">
        <div class="visa-details-content">
            <div class="row">
				<?php
                if ($data->get('layout') == 'left') {
                    do_action('imigrat_sidebar', $data);
                } ?>
                
                <?php 
                    while( have_posts() ) : the_post();
                    $imigrat_visa_meta = get_post_meta( get_the_ID(), 'imigrat_meta_visa', true );
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    <div class="imi-visa-details-text-img-area">
                        <div class="imi-service-details-text-area headline pera-content">
                            <?php if( $imigrat_visa_meta['visa_detail_image']['id'] ):?>
                            <div class="imi-service-details-thumb-img">
                                <img src="<?php echo esc_url( wp_get_attachment_url( $imigrat_visa_meta['visa_detail_image']['id'], true ) );?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat'); ?>" />
                            </div>
                            <?php endif;?>
                            
                            <?php the_content();?>
                            
                            <?php if($imigrat_visa_meta['show_visa_feature_box']){ ?>
                            <div class="imi-service-details-feature-area">
                                <div class="row">
                                    <?php 						
                                        foreach($imigrat_visa_meta['visa_features'] as $key => $imigrat_set):                    
                                        $imigrat_visa_meta = get_post_meta(get_the_ID(), 'imigrat_meta_visa', true );											
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="imi-service-details-feature headline pera-content d-flex align-items-center">
                                            <div class="inner-img">
                                                <img src="<?php echo wp_get_attachment_url($imigrat_set['visa_feature_image']['id'], true);?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat');?>">
                                            </div>
                                            <div class="inner-text">
                                                <h4><?php echo wp_kses($imigrat_set['visa_feature_title'], true ); ?></h4>
                                                <p><?php echo wp_kses($imigrat_set['visa_feature_description'], true ); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <?php echo wp_kses($imigrat_visa_meta['visa_sub_content'], true ); ?>
                            
                            <?php if($imigrat_visa_meta['show_visa_video_box']){ ?>
                            <div class="imi-service-details-video-play-list">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <div class="imi-service-video-play position-relative">
                                            <div class="inner-img">
                                                <img src="<?php echo esc_url( wp_get_attachment_url( $imigrat_visa_meta['visa_video_image']['id'], true ) );?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat');?>">
                                            </div>
                                            <div class="imi-play-btn position-absolute d-flex justify-content-center align-items-center">
                                                <a class="video_box" href="<?php echo esc_url($imigrat_visa_meta['visa_video_link']); ?>"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="imi-service-video-list ul-li-block">
                                            <h3><?php echo wp_kses($imigrat_visa_meta['visa_feature_list_title'], true ); ?></h3>
                                            <p><?php echo wp_kses($imigrat_visa_meta['visa_feature_list_description'], true ); ?></p>
                                            <?php 
                                                $features_list = $imigrat_visa_meta['visa_feature_list'];
                                                if(!empty($features_list)){
                                                $features_list = explode("\n", ($features_list)); 
                                            ?>
                                            <ul>
                                                <?php foreach($features_list as $features): ?>
                                                <li><?php echo wp_kses($features, true); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <h3><?php echo wp_kses($imigrat_visa_meta['visa_sub_heading'], true ); ?></h3>
                            <p><?php echo wp_kses($imigrat_visa_meta['visa_sub_deacription'], true ); ?></p>
                            
                            <?php if($imigrat_visa_meta['show_visa_accordion_box']){ ?>
                            <div class="imi-faq-feed-accordion">
                                <div class="accordion" id="accordionExample3">
                                    <?php 
                                        $count = 1;						
                                        foreach($imigrat_visa_meta['visa_accordion_box'] as $key => $imigrat_set):                    
                                        $imigrat_visa_meta = get_post_meta(get_the_ID(), 'imigrat_meta_visa', true );											
                                    ?>
                                    <div class="accordion-item headline <?php if($count == 1) echo 'faq_bg';?> pera-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <h2 class="accordion-header" id="headingOne3<?php echo esc_attr($count); ?>">
                                            <button class="accordion-button <?php if($count == 1) echo ''; else echo 'collapsed' ?>"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3<?php echo esc_attr($count); ?>" aria-expanded="<?php if($count == 1) echo 'true'; else echo 'false' ?>">
                                                <?php echo wp_kses($imigrat_set['visa_accordion_title'], true ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseOne3<?php echo esc_attr($count); ?>" class="accordion-collapse collapse <?php if($count == 1) echo 'show'; ?>" aria-labelledby="headingOne3<?php echo esc_attr($count); ?>" data-bs-parent="#accordionExample3">
                                            <div class="accordion-body">
                                                <?php echo wp_kses($imigrat_set['visa_accordion_description'], true ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count++; endforeach; ?> 
                                </div>
                            </div>
                            <?php } ?>
                            
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