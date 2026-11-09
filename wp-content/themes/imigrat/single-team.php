<?php get_header(); 
$data = \IMIGRAT\Includes\Classes\Common::instance()->data( 'single-team' )->get(); 

$show_skills_area = get_post_meta(get_the_ID(), 'show_skills_area', true);
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


<?php 
	while( have_posts() ) : the_post(); 
	$imigrat_team_meta = get_post_meta(get_the_ID(), 'imigrat_meta_team', true );
?>
<!-- Start of Team Details section
	============================================= -->
	<section id="imi-team-details" class="imi-team-details-section inner-page-padding">
		<div class="container">
			<div class="imi-team-details-content pera-content">
				<div class="row">
					<?php if(has_post_thumbnail()){ ?>
                    <div class="col-lg-6">
						<div class="imi-team-details-img">
							<?php the_post_thumbnail('imigrat_659x720'); ?>
						</div>
					</div>
                    <?php } ?>
					<div class="col-lg-6">
						<div class="imi-team-details-info-text">
							
                            <div class="team-details-title-designation headline">
								<h3><?php the_title(); ?></h3>
								<span><?php echo wp_kses($imigrat_team_meta['designation'], true ); ?></span>
							</div>
							
                            <div class="team-details-desc">
								<?php the_content(); ?>
							</div>
                            
							<div class="imi-team-details-cta-info">
								
								<?php 						
									foreach($imigrat_team_meta['team_info'] as $key => $imigrat_set):                    
									if(!empty($imigrat_team_meta['team_info']));
									$imigrat_team_meta = get_post_meta(get_the_ID(), 'imigrat_meta_team', true );											
								?>
                                <div class="imi-team-details-cta-item d-flex">
									<div class="cta-icon">
										<i class="fal <?php echo wp_kses( $imigrat_set['team_info_icon'], true );?>"></i>
									</div>
									<div class="cta-text headline pera-content">
										<h3><?php echo wp_kses( $imigrat_set['team_info_title'], true );?></h3>
										<?php echo wp_kses( $imigrat_set['team_info_description'], true );?>
									</div>
								</div>
								<?php endforeach; ?>
                                
                                <?php
									$icons = $imigrat_team_meta['social_profile'];
									if ( ! empty( $icons ) ) :								
								?>
								<div class="imi-team-details-social headline">
									<h3><?php echo wp_kses( $imigrat_team_meta['team_social_heading'], true );?></h3>
									<?php foreach ( $icons as $h_icon ) {            
										$icon_class = explode( '-', imigrat_set( $h_icon, 'icon' ) ); 
									?>
									<a href="<?php echo esc_url(imigrat_set( $h_icon, 'url' )); ?>" <?php if( imigrat_set( $h_icon, 'background' ) || imigrat_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(imigrat_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(imigrat_set( $h_icon, 'color' )); ?>"<?php endif;?> class="fab <?php echo esc_attr( imigrat_set( $h_icon, 'icon' ) ); ?>"></a>
									<?php } ?>
								</div>
                                <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php if($imigrat_team_meta['show_about_area']){ ?>
            <div class="imi-team-details-text-desc headline pera-content">
				<h3><?php echo wp_kses( $imigrat_team_meta['team_about_heading'], true );?></h3>
				<?php echo wp_kses( $imigrat_team_meta['team_about_description'], true );?>
			</div>
            <?php } ?>
            
			<div class="imi-team-details-text-desc headline pera-content">
				<div class="row">
					
					<?php if($imigrat_team_meta['show_skills_area']){ ?>
                    <div class="col-lg-6">
						<h3><?php echo wp_kses($imigrat_team_meta['team_skills_title'], true ); ?></h3>
						<p><?php echo wp_kses($imigrat_team_meta['team_skills_description'], true ); ?></p>
						<div class="imi-team-details-skill">
							<?php 						
								foreach($imigrat_team_meta['team_skills'] as $key => $imigrat_set):                    
								$imigrat_team_meta = get_post_meta(get_the_ID(), 'imigrat_meta_team', true );											
							?>
                            <div class="imi-team-skill-progess headline">
								<h4><?php echo wp_kses( $imigrat_set['team_skills_title1'], true );?></h4>
								<div class="progress">
									<div class="progress-bar" data-percent="<?php echo esc_attr( $imigrat_set['team_skills_counter_value'], true );?>"></div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
                    <?php } ?>
                    
                    <?php if($imigrat_team_meta['show_contact_form_area']){ ?>
					<div class="col-lg-6">
						<div class="imi-team-details-form">
							<h3><?php echo wp_kses($imigrat_team_meta['team_contact_form_title'], true ); ?> </h3>
							
                            <?php echo do_shortcode( $imigrat_team_meta['team_form_url'] );?>
						</div>
					</div>
                    <?php } ?>
                    
				</div>
			</div>
		</div>
	</section>
	<!-- End of Team Details  section
	============================================= -->
<?php endwhile; ?>
<?php get_footer(); ?>