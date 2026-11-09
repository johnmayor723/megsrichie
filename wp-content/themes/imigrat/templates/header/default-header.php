<?php
$options = imigrat_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$light_image_logo = $options->get( 'light_image_logo' );
$light_logo_dimension = $options->get( 'light_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

	<div class="page-wrapper">

		<?php if( $options->get( 'theme_preloader' ) ):?>
        <div id="preloader">
            <div class="dot-spinner">
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
                <div class="dot-spinner__dot"></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="scroll-up">
            <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
        </div>

        <!-- Start of header section
        ============================================= -->
        <header id="imi-header" class="imi-header-section header-style-one">
            <div class="imi-header-content d-flex justify-content-between">
                <div class="imi-header-logo-main-navigation d-flex align-items-center">
                    <div class="brand-logo">
                        <?php echo imigrat_logo( $logo_type, $light_image_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                    </div>
                    <div class="imi-main-menu-navigation">
                        <nav class="imi-main-navigation clearfix ul-li">
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
                <div class="imi-header-search-cta-area d-flex align-items-center">
                    <?php if( $options->get('show_search_icon_v1') ):?>
                    <div class="header-search">
                        <button class="search-btn"><i class="fal fa-search"></i></button>
                    </div>
                    <?php endif; ?>
                    <?php if( $options->get('show_phone_no') ):?>
                    <div class="header-cta-area d-flex align-items-center">
                        <div class="inner-icon d-flex justify-content-center align-items-center">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="inner-text headline">
                            <span><?php echo wp_kses($options->get('phone_title_v1'), true);?></span>
                            <h3><?php echo wp_kses($options->get('phone_no_v1'), true);?></h3>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if( $options->get('show_btn_info_v1') ):?>
                    <div class="header-cta-btn text-uppercase">
                        <a href="<?php echo esc_url($options->get('btn_link_v1'));?>"><?php echo wp_kses($options->get('btn_title_v1'), true);?></a>
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
                            <?php echo imigrat_logo( $logo_type, $light_image_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                        <nav class="mobile-main-navigation  clearfix ul-li">
                            <ul  class="nav navbar-nav clearfix">
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
        <?php if( $options->get('show_search_icon_v1') ):?>
        <div class="search-body">
            <div class="search-form">
                <?php get_template_part('searchform1')?>
                <div class="outer-close text-center search-btn">
                    <i class="far fa-times"></i>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- End of header section
        ============================================= -->