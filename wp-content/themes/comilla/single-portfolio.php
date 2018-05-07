<?php get_header();
comilla_single_post_banner();
?>
	

		<!-- START PORTFOLIO SINGLE PROJECT -->
		<section class="single_project">	
			<div class="container">
				<div class="row section-padding">
			
				
				<?php while(have_posts()) : the_post() ;
				
					$comilla_port_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'comilla_port_img');
					$client_label_label = get_post_meta(get_the_ID(), '_comilla_port_client_label', true);
					$port_client_name = get_post_meta(get_the_ID(), '_comilla_port_client_name', true);
					$port_date_label = get_post_meta(get_the_ID(), '_comilla_port_date_label', true);
					$port_date = get_post_meta(get_the_ID(), '_comilla_port_date', true);
					$port_project_url_label = get_post_meta(get_the_ID(), '_comilla_port_project_url_label', true);
					$port_pro_url = get_post_meta(get_the_ID(), '_comilla_port_pro_url', true);
					?>
					
					<div class="section-title text-center wow zoomIn">
						<h2><?php esc_html_e('Single Project' , 'comilla');?></h2>
						<span></span>
					
					</div>	
					<div class="col-md-5">
						<div class="project_details">
							<div class="about_project">
								<h4><?php esc_html_e('About Project' , 'comilla');?></h4>
								<?php the_content();?>
							</div>
							<div class="about_project_details">
								<h4><?php esc_html_e('Project Details' , 'comilla');?></h4>

								<ul>
									<?php if($client_label_label) { ?>
										<li><i class="fa fa-user"></i> <b><?php echo esc_html($client_label_label);?>: </b><?php echo esc_html($port_client_name);?></li>
									<?php }?>
									
									<?php if($port_date_label) { ?>
										<li><i class="fa fa-clock-o"></i> <b><?php echo esc_html($port_date_label);?>: </b><?php echo esc_html($port_date);?></li>
									<?php }?>
									<li><i class="fa fa-folder"></i> <b><?php echo esc_html_e('Category:' , 'comilla');?> </b>
																
										<?php 
											$port_category = get_the_terms(get_the_ID(), 'port_cat');
											 foreach ( $port_category as $pcat ) { ?>
												<span class="cat_name"><?php echo esc_html($pcat->name); echo ', ';?></span>
										<?php } ?> 
											
									</li>
									<?php if($port_project_url_label) { ?>
										<li><i class="fa fa-link"></i> <b><?php echo esc_html($port_project_url_label);?>: </b><a href="<?php echo esc_url($port_pro_url);?>" target="_blank"><?php echo esc_html($port_pro_url);?></a></li>
									<?php }?>
								</ul>								
							</div>

							<?php if($port_pro_url) {?>
								<a class="btn-portfolio-bg" href="<?php echo esc_url($port_pro_url);?>" target="_blank"><?php echo esc_html_e('See Live Project' , 'comilla');?></a>
							<?php }?>							
						</div>
					</div><!--- END COL -->
					
					<div class="col-md-7">
						<div class="project_dec">
							<img src="<?php echo esc_url($comilla_port_image['0']);?>" class="img-responsive" alt="" />	
						 </div>
					</div><!--- END COL -->		
					

					
				<?php endwhile;?>	
				
					</div>


				<div class="row related_porject">
					<div class="section-title text-center wow zoomIn">
						<h2><?php esc_html_e('Related Project' , 'comilla');?></h2>
						<span></span>
						
					</div>	

							<?php // WP_Query arguments
								$args = array (
									'post_type'              => array( 'portfolio' ),
									'post__not_in' => array($post->ID),
									'posts_per_page'=> 3
								);

								// The Query
								$related_port_query = new WP_Query( $args );

								// The Loop
								if ( $related_port_query->have_posts() ) {
									while ( $related_port_query->have_posts() ) {
										$related_port_query->the_post(); 
										$comilla_port_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'comilla_port_img'); 																		
							
										?>

										<div class="grid-item col-md-4 col-sm-6 col-xs-12">
											<div class="single_our_work">
												<div class="sing_work_photo">
													<figure>
														<img src="<?php echo esc_url($comilla_port_img['0']);?>">
														<div class="sing_work_text_link">
															<div class="sing_work_content_wrap">
																<div class="sing_work_content">
																	<div class="sing_link_img">
																		<a href="<?php echo esc_url($comilla_port_img['0']);?>" class="lightbox search" data-gall="gall-work"><i class="fa fa-eye"></i></a>
																		<a href="<?php the_permalink();?>" class="link"><i class="fa fa-link"></i></a>
																	</div>	
																	<h5><?php the_title();?></h5>													
																	<p>														<?php 
																		$terms1 = get_the_terms(get_the_ID(), 'port_cat');
																		 foreach ( $terms1 as $term ) { ?>
																			<span class="cat_name"><?php echo esc_html($term->name); echo ', ';?></span>
																		<?php } ?> 
																	</p>
																</div>
															</div>									
														</div>																	
													</figure>
												</div>			
											</div>
										</div>	<!-- END item  -->	
					
								<?php	}
								} else {
									// no posts found
								}

								// Restore original Post Data
								wp_reset_postdata();?>	
								
					</div><!-- END ROW  -->
				
													
			</div><!--- END CONTAINER -->
		</section>	
		<!-- END PORTFOLIO SINGLE PROJECT -->
		
<?php get_footer();?>
