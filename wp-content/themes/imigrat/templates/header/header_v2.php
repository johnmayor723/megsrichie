<?php
	$options = imigrat_WSH()->option();
	$allowed_html = wp_kses_allowed_html( 'post' );

	//Dark Color Logo Settings
	$dark_image_logo = $options->get( 'dark_image_logo' );
	$dark_logo_dimension = $options->get( 'dark_logo_dimension' );

	//Light Color Logo Settings
	$light_image_logo = $options->get( 'light_image_logo' );
	$light_logo_dimension = $options->get( 'light_logo_dimension' );

	$logo_type = '';
	$logo_text = '';
	$logo_typography = '';

?>

    <div class="imi_home_2">

		<?php if( $options->get( 'theme_preloader' ) ):?>
        <div id="preloader"></div>
        <?php endif; ?>

        <div class="scroll-up">
            <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
        </div>

        <!-- <div class="cursor"></div> -->
        <!-- Start of Header section
        ============================================= -->
        <header id="imi-header" class="imi-header-section header-style-two">
            <div class="imi-header-top-content d-flex justify-content-between">
                <div class="header-top-cta ul-li">
                    <ul>
                        <?php if( $options->get('show_header_address_v2') ):?>
                        <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/ic1.png" alt=""> <?php echo wp_kses($options->get('header_address_v2'), true);?></li>
                        <?php endif; ?>
                        <?php if( $options->get('show_phone_no2') ):?>
                        <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/ic2.png" alt=""> <?php echo wp_kses($options->get('phone_no_v2'), true);?></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="header-top-cta d-flex align-items-center ul-li">
                    <?php if( $options->get('show_email_address2') ):?>
                    <ul>
                        <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icon/ic3.png"> <?php echo wp_kses($options->get('email_address_v2'), true);?></li>
                    </ul>
                    <?php endif; ?>

                    <?php
                        if ($options->get('header_show_social_media_v2')) {
                            $icons = $options->get('header_social_media_v2');
                            if (!empty($icons)) {
                                ?>
                                <div class="header-top-social position-relative">
                                    <?php
                                    foreach ($icons as $h_icon) {
                                        $icon_class = explode('-', imigrat_set($h_icon, 'icon'));
                                        $background_color = esc_attr(imigrat_set($h_icon, 'background'));
                                        $text_color = esc_attr(imigrat_set($h_icon, 'color'));
                                        $url = esc_url(imigrat_set($h_icon, 'url'));
                                        ?>

                                        <a href="<?php echo $url; ?>" <?php if ($background_color || $text_color): ?>style="background-color:<?php echo $background_color; ?>; color: <?php echo $text_color; ?>"<?php endif; ?> target="_blank" class="fab <?php echo esc_attr(imigrat_set($h_icon, 'icon')); ?>"></a>
                                    <?php } ?>
                                </div>
                            <?php
                            }
                        }
                    ?>

                </div>
            </div>
            <div class="imi-header-logo-menu-content d-flex justify-content-between">
                <div class="imi-header-main-navigation d-flex align-items-center">
                    <div class="brand-logo ">
                        <?php echo imigrat_logo( $logo_type, $dark_image_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                    </div>
                    <div class="imi-header-menu">
                        <nav class="imi-main-navigation-area clearfix ul-li">
                            <ul id="main-nav" class="nav navbar-nav clearfix">
                                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                    'container_class'=>'navbar-collapse collapse navbar-right',
                                    'menu_class'=>'nav navbar-nav',
                                    'fallback_cb'=>false,
                                    'items_wrap' => '%3$s',
                                    'container'=>false,
                                    'depth'=>'3',
                                    'walker'=> new Bootstrap_walker()
                                ) ); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="imi-header-cta-btn-grp d-flex align-items-center">
                    <?php if( $options->get('show_search_icon_v2') ):?>
                    <div class="imi-header-search">
                        <button class="search-btn"><i class="far fa-search"></i></button>
                    </div>
                    <?php endif; ?>
                    <div class="imi-header-sidebar navSidebar-button">
                        <button><i class="fas fa-bars"></i></button>
                    </div>
                    <?php if( $options->get('show_btn_info_v2') ):?>
                    <div class="imi-cta-btn text-capitalize">
                        <a href="<?php echo esc_url($options->get('btn_link_v2'));?>"><?php echo wp_kses($options->get('btn_title_v2'), true);?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mobile_menu position-relative">
                <div class="mobile_menu_button open_mobile_menu">
                    <i class="fal fa-bars"></i>
                </div>
                <div class="mobile_menu_wrap">
                    <div class="mobile_menu_overlay open_mobile_menu"></div>
                    <div class="mobile_menu_content">
                        <div class="mobile_menu_close open_mobile_menu">
                            <i class="fal fa-times"></i>
                        </div>
                        <div class="m-brand-logo">
                            <?php echo imigrat_logo( $logo_type, $dark_image_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                        <nav class="mobile-main-navigation  clearfix ul-li">
                            <ul class="nav navbar-nav clearfix">
                                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                    'container_class'=>'navbar-collapse collapse navbar-right',
                                    'menu_class'=>'nav navbar-nav',
                                    'fallback_cb'=>false,
                                    'items_wrap' => '%3$s',
                                    'container'=>false,
                                    'depth'=>'3',
                                    'walker'=> new Bootstrap_walker()
                                ) ); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /Mobile-Menu -->
            </div>
        </header>
        <!-- search filed -->
        <?php if( $options->get('show_search_icon_v2') ):?>
        <div class="search-body">
            <div class="search-form">
                <?php get_template_part('searchform1')?>
                <div class="outer-close text-center search-btn">
                    <i class="far fa-times"></i>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- Sidebar sidebar Item -->
        <?php if( $options->get ('show_sidebar_icon_v2') ):?>
        <div class="xs-sidebar-group info-group">
            <div class="xs-overlay xs-bg-black">
                <div class="row loader-area">
                    <div class="col-3 preloader-wrap">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 preloader-wrap">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 preloader-wrap">
                        <div class="loader-bg"></div>
                    </div>
                    <div class="col-3 preloader-wrap">
                        <div class="loader-bg"></div>
                    </div>
                </div>
            </div>
            <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="#" class="close-side-widget">
                            <?php esc_html_e('X', 'imigrat'); ?>
                        </a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents headline pera-content">
                            <div class="content-inner">
                                <div class="logo">
                                    <?php echo imigrat_logo( $logo_type, $dark_image_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                                </div>
                                <div class="content-box">
                                    <h5><?php echo wp_kses($options->get('sidebar_title_v2'), true);?></h5>
                                    <p class="text"><?php echo wp_kses($options->get('sidebar_text_v2'), true);?></p>
                                </div>
                                <div class="gallery-box ul-li">
                                    <?php if( $options->get('sidebar_gallery_title') ):?>
                                    <h5><?php echo wp_kses($options->get('sidebar_gallery_title'), true);?></h5>
                                    <?php endif; ?>

                                    <!-- footer gallery -->
									<?php if( $options->get('show_gallery_v2') ){ ?>
                                    <ul class="zoom-gallery">
                                        <?php
											$gall_images = $options->get( 'gallery_imgs' );
											$gall_images = explode(',', $gall_images);
											if ($gall_images) :
											foreach ($gall_images as $gall) :
										?>
                                        <li><a href="<?php echo esc_url(wp_get_attachment_url($gall)); ?>" data-source="<?php echo esc_url(wp_get_attachment_url($gall)); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($gall)); ?>" alt="<?php esc_attr_e('Awesome Image', 'imigrat'); ?>"></a></li>
                                        <?php endforeach; endif; ?>
                                    </ul>
                                    <?php } ?>
                                </div>
                                <div class="content-box">
                                    <h5><?php echo wp_kses($options->get('sidebar_social_title_v2'), true);?></h5>
                                    <?php if($options->get( 'show_social_media_v2' )) {
                                    $icons = $options->get( 'social_media_v2' );
                                    if ( ! empty( $icons ) ) { ?>
                                    <ul class="social-box">
                                        <?php foreach ( $icons as $h_icon ) {
                                        $icon_class = explode( '-', imigrat_set( $h_icon, 'icon' ) ); ?>
                                        <li><a href="<?php echo esc_url(imigrat_set( $h_icon, 'url' )); ?>" <?php if( imigrat_set( $h_icon, 'background' ) || imigrat_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(imigrat_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(imigrat_set( $h_icon, 'color' )); ?>"<?php endif;?> target="_blank" class="fab <?php echo esc_attr( imigrat_set( $h_icon, 'icon' ) ); ?>"></a></li>
                                        <?php } ?>
                                    </ul>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- End of Header section
        ============================================= -->