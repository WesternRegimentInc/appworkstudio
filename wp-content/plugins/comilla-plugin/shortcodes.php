<?php

//Service Area
function comilla_service_area( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(
            'ser_title' => 'Our service',           
            'ser_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',           
            'ser_post_number' => '6',           

		), $atts )
    );
ob_start();

?>


	<!-- START SERVICE  -->
	<section id="service" class="our_service section-padding">
		<div class="container">
			<div class="row text-center">
				<div class="section-title wow zoomIn">
					<?php if($ser_title){ ?>
						<h2><?php echo esc_html($ser_title);?></h2>
					<?php } ?>
					<span></span>
					<?php if($ser_content){ ?>
						<p><?php echo comilla_wp_kses($ser_content); ?></p>
					<?php } ?>
				</div>
				

				<?php
					// WP_Query arguments
					$args = array(
						'post_type'              => array( 'service' ),
						'posts_per_page'         => $ser_post_number,
					);

					// The Query
					$comilla_service_query = new WP_Query( $args );

					// The Loop
					if ( $comilla_service_query->have_posts() ) {
						while ( $comilla_service_query->have_posts() ) {
							$comilla_service_query->the_post(); 
							$comilla_sev_icon = get_post_meta(get_the_ID(), '_comilla_serv_icon', true)
							
							?>
							
							<div class="col-md-4 col-sm-4 col-xs-12 no-padding wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
								<div class="single_service">
									<i class="<?php echo esc_attr($comilla_sev_icon);?>"></i>
									<h4><?php the_title();?></h4>
									<?php the_content();?>
								</div>
							</div><!--END COL -->	
							
					<?php	}
					} else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();
				?>				
		
	
			</div><!--END  ROW -->
		</div><!-- END CONTAINER -->
	</section>
	<!-- END SERVICE-->	
		
<?php 
  return ob_get_clean();
}
add_shortcode ('service_area', 'comilla_service_area' );

//Buy Now Area
function comilla_buy_now_area( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(
            'button_content' => 'Want to get start with Comilla?',           
            'button_text' => 'Contact now',           
            'button_link' => '#',           
      

		), $atts )
    );
ob_start();

?>


	<!-- PROMOTION -->
	<section class="buy_now">
		<div class="container text-center">
			<h3 class="buy_now_title"><?php echo comilla_wp_kses($button_content); ?> <a href="<?php echo esc_url($button_link); ?>" class="btn btn-default btn-promotion-bg"><?php echo esc_html($button_text); ?></a> </h3>
		</div><!--- END CONTAINER -->
	</section>
	<!-- END PROMOTION -->	
		
<?php 
  return ob_get_clean();
}
add_shortcode ('buy_now_area', 'comilla_buy_now_area' );

//Portfolios Area
function comilla_portfolios_area( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(
            'port_title' => 'Latest works',                   
            'port_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',                   
            'port_button_text' => 'See More Work',           
            'port_button_link' => '#',           
      

		), $atts )
    );
ob_start();

?>


		<!-- START PORTFOLIO -->	
		<section id="portfolio" class="works_area section-padding">	
			<div class="container-fluid">
				<div class="row text-center">
					<div class="section-title wow zoomIn">
						<?php if($port_title){ ?>
							<h2><?php echo esc_html($port_title);?></h2>
						<?php } ?>
						<span></span>
						<?php if($port_content){ ?>
							<p><?php echo comilla_wp_kses($port_content); ?></p>
						<?php } ?>
					</div>
					<div class="col-md-12">
						<div class="our_work_menu">

							
					<?php $terms = get_terms('port_cat');
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					?>
					<ul>
						<li class="filter wow fadeIn" data-wow-duration="1.5s" data-wow-delay=".25s" data-filter="all"><?php esc_html_e('All' , 'comilla');?></li>
						<?php foreach ( $terms as $term ) :?>
							<li class="filter" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_attr($term->name); ?></li>
						<?php endforeach;?>
					</ul>
					<?php }?>				
				
						</div>				
					</div><!--- END COL -->					
					<div class="work_all_item">

					<?php
					
					// WP_Query arguments
					$args = array(
						'post_type'              => array( 'portfolio' ),
						'posts_per_page'         => '-1',
					);

					// The Query
					$comilla_port_query = new WP_Query( $args );

					// The Loop
					if ( $comilla_port_query->have_posts() ) {
						while ( $comilla_port_query->have_posts() ) {
							$comilla_port_query->the_post(); 							
							$comilla_port_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'comilla_port_img'); 																		
							
							?>
							
						<?php 

							$portfolio_terms = get_the_terms(get_the_id(), 'port_cat');
							
							if ( ! empty( $portfolio_terms ) && ! is_wp_error( $portfolio_terms ) ):
								
								$portfolios_cat_slug = array();
								
								foreach($portfolio_terms as $portfolio_term){
									$portfolios_cat_slug[] = $portfolio_term->slug ;
								}
								
								$portfolios_cat_array = join(" ", $portfolios_cat_slug);
								$portfolios_class_array = join(" ", $portfolios_cat_slug);
							endif;
						?>	
						
							<div class="grid-item col-md-3 col-sm-6 col-xs-12 mix all <?php echo esc_attr($portfolios_class_array);?>">
									<div class="single_our_work">
										<div class="sing_work_photo">
											<figure>								
												<img src="<?php echo esc_url($comilla_port_img['0']);?>" alt="">
												<div class="sing_work_text_link">
													<div class="sing_work_content_wrap">
														<div class="sing_work_content">
															<div class="sing_link_img">
																<a href="<?php echo esc_url($comilla_port_img['0']);?>" class="lightbox search" data-gall="gall-work"><i class="fa fa-eye"></i></a>
																<a href="<?php the_permalink();?>" class="link"><i class="fa fa-link"></i></a>
															</div>	
															<h5><?php the_title();?></h5>	
															
															
																<?php

																$terms = get_the_terms(get_the_ID(), 'port_cat');
																 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
																	 echo '<p>';
																	 foreach ( $terms as $term ) {
																	   echo  esc_html($term->name);
																		
																	 }
																	 echo '</p>';
																 }
																?>															
														</div>
													</div>
												</div>	
											</figure>
										</div>				
									</div>
								</div><!--- END COL -->							
					<?php	}
					} else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();					
					?>
			
						
					</div><!--- END WORKS ALL ITEM -->			
				</div><!--- END ROW -->
				
				<?php if($port_button_link){ ?>
					<div class="portfolio_btn text-center">
						<a href="<?php echo esc_url($port_button_link);?>" class="btn-portfolio-bg"><?php echo esc_html($port_button_text);?></a>
					</div>	
				<?php } ?>
			</div><!--- END CONTAINER -->		
		</section>		
		<!-- END PORTFOLIO -->	

		
<?php 
  return ob_get_clean();
}
add_shortcode ('portfolios_area', 'comilla_portfolios_area' );

//Testimonials Area
function comilla_testimonials_area( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(
            'testi_bg_img' => '',                   
            'testi_title' => 'What clients say',                   
            'testi_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',                   

		), $atts )
    );
ob_start();
$testi_bg_img = wp_get_attachment_image_src($testi_bg_img,'');
?>

<!--- START TESTIMONIAL -->		
<section id="testimonial" class="testimonials section-padding" style="background-image: url(<?php echo esc_url($testi_bg_img[0]);?>); background-size:cover; background-position: center center;background-attachment:fixed">
	<div class="container">
		<div class="row">
			<div class="section-title text-center wow zoomIn">
				<?php if($testi_title){ ?>
					<h2 class="section-title-white"><?php echo esc_html($testi_title);?></h2>
				<?php } ?>
				<span class="section-title-white-span"></span>
				<?php if($testi_content){ ?>
					<p class="section-title-white"><?php echo comilla_wp_kses($testi_content); ?></p>
				<?php } ?>
				

			</div>
			<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
				<div class="flexslider testi-slider wow animated fadeInUp" data-wow-delay=".2s">
					<ul class="slides">
					
					<?php
						// WP_Query arguments
						$args = array(
							'post_type'              => array( 'testimonials' ),
							'posts_per_page'         => '-1',
						);

						// The Query
						$comilla_testimonials_query = new WP_Query( $args );

						// The Loop
						if ( $comilla_testimonials_query->have_posts() ) {
							while ( $comilla_testimonials_query->have_posts() ) {
								$comilla_testimonials_query->the_post(); 
								$comilla_testi_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'comilla_testi_img'); 						
								
								?>
								
								<li>
									<div class="testi-slider-item">
										 <?php the_content();?>
											<img src="<?php echo esc_url($comilla_testi_img[0]);?>" alt="">
										<h6><?php the_title();?></h6>
									</div>
								</li><!--SINGLE SLIDE-->
								
						<?php	}
						} else {
							// no posts found
						}

						// Restore original Post Data
						wp_reset_postdata();
					?>					

												
					</ul><!--- END SLIDES -->
				</div><!--- END FLEXSLIDER -->
			</div><!--- END CONTAINER -->
		</div><!--- END CONTAINER -->
	</div><!--- END CONTAINER -->		       
</section>
<!--- END TESTIMONIAL -->
		
<?php 
  return ob_get_clean();
}
add_shortcode ('testimonials_area', 'comilla_testimonials_area' );

//Team Area
function comilla_team_area( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(                 
            'team_title' => 'Our lovely team',                   
            'team_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',                   
            'team_number_post' => '4',                   

		), $atts )
    );
ob_start();

?>

<!-- START TEAM MEMBER DESIGN -->
<section id="team" class="section-padding">
	<div class="container">
	  <div class="row text-center">
		<div class="section-title wow zoomIn">
			
			<?php if($team_title){ ?>
				<h2><?php echo esc_html($team_title);?></h2>
			<?php } ?>
			<span></span>
			<?php if($team_content){ ?>
				<p><?php echo comilla_wp_kses($team_content); ?></p>
			<?php } ?>
					
		</div>

		<?php 
			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'team' ),
				'posts_per_page'         => $team_number_post, 
			);

			// The Query
			$comilla_team_query = new WP_Query( $args );

			// The Loop
			if ( $comilla_team_query->have_posts() ) {
				while ( $comilla_team_query->have_posts() ) {
					$comilla_team_query->the_post(); 
					$comilla_team_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'comilla_team_img'); 						
					$comilla_team_designation = get_post_meta(get_the_ID(), '_comilla_team_designation', true);
					$comilla_team_group_field_opt = get_post_meta(get_the_ID(), '_comilla_team_group_field_opt', true)
					
					?>
					
					<div class="col-md-3 col-sm-6 col-xs-12">
					  <div class="tema-member">
						<div class="team-thumbnail">
						  <img src="<?php echo esc_url($comilla_team_img[0]);?>" class="img-responsive" alt="">
						  <div class="overlay">
							<div class="social-media">
							
							<?php
						
								foreach ( (array) $comilla_team_group_field_opt as $key => $team_entry ) {

									
									
									$team_sm_icon = $team_sm_link = $team_sm_hbg = '';

									if ( isset( $team_entry['_comilla_team_sm_icon'] ) )
										$team_sm_icon = $team_entry['_comilla_team_sm_icon'];
									
									if ( isset( $team_entry['_comilla_team_sm_link'] ) )
										$team_sm_link = $team_entry['_comilla_team_sm_link'];	
									
									if ( isset( $team_entry['_comilla_team_sm_hbg_color'] ) )
											$team_sm_hbg = $team_entry['_comilla_team_sm_hbg_color'];	

									
									
									?>
									
										 <a href="<?php echo esc_url($team_sm_link);?>" onmouseout="this.style.background='transparent'" onmouseover="this.style.background='<?php if (isset($team_sm_hbg)) { echo esc_js($team_sm_hbg);}?>'; "><i class="<?php echo esc_attr($team_sm_icon);?>"></i></a>
									
								<?php 
									
								} ?>							
					
							 
							</div>
							<div class="info">
							  <?php the_title('<h4>' , '</h4>');?>
							  <p><?php echo esc_html($comilla_team_designation);?></p>
							</div>						
						  </div>
						</div>
					  </div>
					</div><!--- END COL -->
					
			<?php	}
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();

		?>		


		
	  </div><!--- END ROW -->
	</div><!--- END CONTAINER -->
</section>
<!-- END TEAM MEMBER DESIGN -->
<?php 
  return ob_get_clean();
}
add_shortcode ('team_area', 'comilla_team_area' );

//Partner Area
function comilla_partner_area( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(                 

		), $atts )
    );
ob_start();

?>

<!-- START COMPANY PARTNER LOGO  -->
<div class="partner-logo section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="partner  wow fadeInRight">
				<?php

						// WP_Query arguments
						$args = array(
							'post_type'              => array( 'partner' ),
							'posts_per_page'         => '-1',
						);

						// The Query
						$comilla_partner_query = new WP_Query( $args );

						// The Loop
						if ( $comilla_partner_query->have_posts() ) {
							while ( $comilla_partner_query->have_posts() ) {
								$comilla_partner_query->the_post(); 
								$comilla_partner_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'comilla_partner_img'); 						
								$comilla_partner_link = get_post_meta(get_the_ID(), '_comilla_partner_link', true);
								?>
								
								<a href="<?php echo esc_url($comilla_partner_link);?>"><img src="<?php echo esc_url($comilla_partner_img[0]);?>" alt=""></a>
						<?php	}
						} else {
							// no posts found
						}

						// Restore original Post Data
						wp_reset_postdata();
				?>				
					

				</div>
			</div><!-- END COL  -->
		</div><!--END  ROW  -->
	</div><!-- END CONTAINER  -->
</div>
<!-- END COMPANY PARTNER LOGO -->
		
<?php 
  return ob_get_clean();
}
add_shortcode ('partner_area', 'comilla_partner_area' );

//Contact Us Area
function comilla_contact_us_area( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(                 
            'contact_title' => 'Contact Us',                   
            'contact_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',                   
            'contact_form_shortcode_id' => '',                   

		), $atts )
    );
ob_start();

?>

<!-- START CONTACT FORM-->
<section id="contact" class="contact_area section-padding">
	<div class="container">
		<div class="row">
			<div class="section-title text-center wow zoomIn">
			
				<?php if($contact_title){ ?>
					<h2><?php echo esc_html($contact_title);?></h2>
				<?php } ?>
				<span></span>
				<?php if($contact_content){ ?>
					<p><?php echo comilla_wp_kses($contact_content); ?></p>
				<?php } ?>
			
			</div>					
			<div class="col-md-6">
				<div class="contact_address">								
					<?php echo do_shortcode($content);?>					
				</div>
			</div><!--- END COL -->
			<div class="col-md-6 col-sm-12 col-xs-12 wow fadeInRight">
				<div class="contact">
					<div id="contact-form">					
						<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($contact_form_shortcode_id).'"]');?>
					</div>					
				</div>
			</div><!-- END COL -->
		</div><!--- END ROW -->				
	</div><!--- END CONTAINER -->	
</section>
<!-- END CONTACT FORM -->
		
<?php 
  return ob_get_clean();
}
add_shortcode ('contact_us_area', 'comilla_contact_us_area' );

//Contact Us Info Area
function comilla_contact_us_info( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(                 
            'contact_info_icon' => 'fa fa-rocket',                                    
            'contact_info_title' => 'Our Location',                                    
            'contact_info_content' => '3481 Melrose Place, Beverly Hills <br> CA 90210',                                    

		), $atts )
    );
ob_start();

?>

<div class="single-address wow fadeInLeft">
	<i class="<?php echo esc_attr($contact_info_icon);?>"></i>
	<h4><?php echo esc_html($contact_info_title);?></h4>
	<p><?php echo comilla_wp_kses($contact_info_content); ?></p>
</div>

<?php 
  return ob_get_clean();
}
add_shortcode ('contact_us_info', 'comilla_contact_us_info' );

//Google Map Area
function comilla_google_map_area( $atts , $content = null ){
 // Attributes
    extract( shortcode_atts(
        array(                 
            'map_api_key' => 'AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU',                                    
            'map_latitude' => '40.7127837',                                    
            'map_longitude' => '-74.00594130000002',                                    
		), $atts )
    );
ob_start();

?>

	<!-- START MAP -->
	<div id="map"></div>
	<!-- END MAP -->
	
	<!-- map js -->
	<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_js($map_api_key);?>"></script>				
	<script>
		/*START GOOGLE MAP*/
		 function initialize() {
		  var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			center: new google.maps.LatLng(<?php echo esc_js($map_latitude);?>, <?php echo esc_js($map_longitude);?>)
		  };
		  var map = new google.maps.Map(document.getElementById('map'),
			  mapOptions);
		  var marker = new google.maps.Marker({
			position: map.getCenter(),
			icon: '<?php echo esc_url(get_template_directory_uri());?>/assets/img/map_pin.png',
			map: map
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize); 
		/*END GOOGLE MAP*/	
	</script>

<?php 
  return ob_get_clean();
}
add_shortcode ('google_map_area', 'comilla_google_map_area' );