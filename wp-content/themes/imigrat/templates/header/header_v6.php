<?php
	$options = imigrat_WSH()->option();
	$allowed_html = wp_kses_allowed_html( 'post' );

	//Light Color Logo Settings
	$dark_image_logo = $options->get( 'dark_image_logo' );
    $light_image_logo = $options->get( 'light_image_logo' );
	$dark_logo_dimension = $options->get( 'dark_logo_dimension' );

	$logo_type = '';
	$logo_text = '';
	$logo_typography = '';

	$query_number = $options->get('query_number' );
	$query_orderby = $options->get('query_orderby' );
	$query_order = $options->get('query_order' );
	$query_category = $options->get('query_category' );
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => $query_number,
		'orderby'        => $query_orderby,
		'order'          => $query_order,
	);

	if( $query_category  ) $args['category_name'] = $query_category;
	$query = new \WP_Query( $args );
?>

<header class="header-style-four style-three">

    <!-- Header Top -->
    <div class="header-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <!-- Header Top Info -->
                <ul class="header-top_info">
                    <?php if( $options->get('show_email_address6') ):?>
                    <li>
                        <span class="icon far fa-envelope fa-fw"></span>
                        <a href="mailto:<?php echo wp_kses($options->get('email_address_v6'), true);?>"><?php echo wp_kses($options->get('email_address_v6'), true);?></a>
                    </li>
                    <?php endif; ?>
                    <?php if( $options->get('show_header_address_v6') ):?>
                    <li>
                        <span class="icon far fa-map fa-fw"></span>
                        <?php echo wp_kses($options->get('header_address_v6'), true);?>
                    </li>
                    <?php endif; ?>
                </ul>

                <!-- Social Box -->
                <?php if($options->get( 'show_social_media_v6' )) {
                    $icons = $options->get( 'social_media_v6' );
                    if ( ! empty( $icons ) ) { ?>
                <ul class="header-top_socials">
                    <?php foreach ( $icons as $h_icon ) {
                    $icon_class = explode( '-', imigrat_set( $h_icon, 'icon' ) ); ?>
                    <li><a href="<?php echo esc_url(imigrat_set( $h_icon, 'url' )); ?>" <?php if( imigrat_set( $h_icon, 'background' ) || imigrat_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(imigrat_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(imigrat_set( $h_icon, 'color' )); ?>"<?php endif;?> target="_blank" class="fab <?php echo esc_attr( imigrat_set( $h_icon, 'icon' ) ); ?>"></a></li>
                    <?php } ?>
                </ul>
                <?php } } ?>

            </div>
        </div>
    </div>

    <!-- Header Lower -->
    <div class="header-lower">
        <div class="container">
            <div class="inner-container d-flex align-items-center justify-content-between">

                <div class="brand-logo">
                    <?php echo imigrat_logo( $logo_type, $light_image_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                </div>

                <div class="nav-outer d-flex align-items-center">

                    <!-- Main Menu -->
                    <nav class="main-menu show navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul id="main-nav" class="navigation clearfix">
                                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                    'container_class'=>'',
                                    'menu_class'=>'',
                                    'fallback_cb'=>false,
                                    'items_wrap' => '%3$s',
                                    'container'=>false,
                                    'depth'=>'3',
                                    'walker'=> new Bootstrap_walker()
                                ) ); ?>
                            </ul>
                        </div>

                    </nav>
                    <!-- Main Menu End-->

                </div>

                <!-- Outer Box -->
                <div class="outer-box d-flex align-items-center">
                    <?php if( $options->get('show_btn_info_v6') ):?>
                    <!-- Button Box -->
                    <div class="button-box">
                        <a class="btn-style-seven theme-btn" href="<?php echo esc_url($options->get('btn_link_v6'));?>">
                            <div class="btn-wrap">
                                <span class="text-one"><?php echo wp_kses($options->get('btn_title_v6'), true);?> <i class="fal fa-angle-double-right fa-fw"></i></span>
                                <span class="text-two"><?php echo wp_kses($options->get('btn_title_v6'), true);?> <i class="fal fa-angle-double-right fa-fw"></i></span>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler">
                        <span class="icon"><img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/icon/menu-1.png" alt="" /></span>
                    </div>
                </div>
                <!-- End Outer Box -->

            </div>

        </div>
    </div>
    <!-- End Header Lower -->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo -->
                <div class="logo">
                    <?php echo imigrat_logo( $logo_type, $light_image_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                </div>

                <!-- Right Col -->
                <div class="right-box">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                    <!-- Main Menu End-->
                </div>

                <!-- Outer Box -->
                <div class="outer-box d-flex align-items-center">

                    <?php if( $options->get('show_btn_info_v6') ):?>
                    <!-- Button Box -->
                    <div class="button-box">
                        <a class="btn-style-one theme-btn" href="<?php echo esc_url($options->get('btn_link_v6'));?>">
                            <div class="btn-wrap">
                                <span class="text-one"><?php echo wp_kses($options->get('btn_title_v6'), true);?></span>
                                <span class="text-two"><?php echo wp_kses($options->get('btn_title_v6'), true);?></span>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>

                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler">
                        <span class="icon"><img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/icon/menu.png" alt="" /></span>
                    </div>

                </div>
                <!-- End Outer Box -->

            </div>
        </div>
    </div>
    <!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon far fa-times fa-fw"></span></div>
        <nav class="menu-box">
            <div class="nav-logo">
                <?php echo imigrat_logo( $logo_type, $light_image_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

</header>