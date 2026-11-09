<?php get_header(); 
	$data = \IMIGRAT\Includes\Classes\Common::instance()->data( 'single-country' )->get(); 
	
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

<!-- Start of Service Details section
============================================= -->
<section id="imi_2-service-details" class="imi_2-service-details-section inner-page-padding">
    <div class="container">
        <div class="imi_2-service-details-content">
            <div class="row">
				<?php
                if ($data->get('layout') == 'left') {
                    do_action('imigrat_sidebar', $data);
                } ?>
                
                <?php 
                    while( have_posts() ) : the_post();
                    $imigrat_country_meta = get_post_meta( get_the_ID(), 'imigrat_meta_country', true );
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    <div class="imi_2-service-details-area headline pera-content">
                        
						<?php if( $imigrat_country_meta['country_detail_image']['id'] ):?>
                        <div class="imi_2-service-details-img">
                            <img src="<?php echo esc_url( wp_get_attachment_url( $imigrat_country_meta['country_detail_image']['id'], true ) );?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat'); ?>" />
                        </div>
                        <?php endif;?>
                        
                        <div class="imi_2-service-details-text">
                            
							<?php the_content();?>
                            
                            <?php if($imigrat_country_meta['show_country_feature_box']){ ?>
                            <div class="imi_2-service-details-feature">
                                <div class="row">
                                    <?php 						
                                        foreach($imigrat_country_meta['country_features'] as $key => $imigrat_set):                    
                                        $imigrat_country_meta = get_post_meta(get_the_ID(), 'imigrat_meta_country', true );											
                                    ?>
                                    <div class="col-md-6">
                                        <div class="imi_2-service-details-ft-item d-flex">
                                            <div class="feature-icon">
                                                <i class="fas <?php echo esc_attr( $imigrat_set['country_info_icon'], true );?>"></i>
                                            </div>
                                            <div class="feature-text">
                                                <h3><?php echo wp_kses($imigrat_set['country_feature_title'], true ); ?></h3>
                                                <p><?php echo wp_kses($imigrat_set['country_feature_description'], true ); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <?php echo wp_kses($imigrat_country_meta['country_sub_content'], true ); ?>
                            
							<?php if($imigrat_country_meta['show_country_step_box']){ ?>
                            <div class="imi_2-service-details-step-area">
                                <div class="row">
                                    <?php 						
                                        $i = 1;
										foreach($imigrat_country_meta['country_step_box'] as $key => $imigrat_set):                    
                                        $imigrat_country_meta = get_post_meta(get_the_ID(), 'imigrat_meta_country', true );											
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="imi_2-service-step-item text-center">
                                            <div class="step-serial d-flex justify-content-center align-items-center">
                                                <?php $i = sprintf('%02d', $i); echo esc_attr( $i ); ?>
                                            </div>
                                            <div class="step-text headline pera-content">
                                                <h3><?php echo wp_kses($imigrat_set['country_step_title'], true ); ?></h3>
                                                <p><?php echo wp_kses($imigrat_set['country_step_deacription'], true ); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; endforeach; ?>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <?php echo wp_kses($imigrat_country_meta['country_sub_deacription'], true ); ?>
                            
							<?php if($imigrat_country_meta['show_customer_benefits']){ ?>
                            <div class="imi_2-service-details-img-list-area">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="imi_2-service-list-img">
                                            <img src="<?php echo esc_url( wp_get_attachment_url( $imigrat_country_meta['customer_image']['id'], true ) );?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="imi_2-service-list-text ul-li-block">
                                            <h3><?php echo wp_kses($imigrat_country_meta['customer_benefits_title'], true ); ?></h3>
                                            <p><?php echo wp_kses($imigrat_country_meta['customer_benefits_text'], true ); ?></p>
                                            <?php 
                                                $features_list = $imigrat_country_meta['customer_feature_list'];
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