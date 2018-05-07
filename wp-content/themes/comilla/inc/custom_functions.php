<?php

function comilla_header(){
	global $comilla;
	$comilla_preloader_text = $comilla['comilla_preloader_text'];	
	$comilla_preloader_imge = $comilla['comilla_preloader_imge']['url'];	
	$comilla_preloader_bg_color = $comilla['comilla_preloader_bg_color'];	
	$comilla_preloader_opt = $comilla['comilla_preloader_opt'];
	$comilla_homepage_opt = $comilla['comilla_homepage_opt'];
	$comilla_default_preloader_imge = esc_url(get_template_directory_uri()) . '/assets/img/status.gif';
	$comilla_default_logo = get_template_directory_uri() . '/assets/img/logo.png' ;
?>

	<?php if($comilla_preloader_opt == '1' && !$comilla_homepage_opt == '1') { ?>
		
		<!-- START PRELOADER -->
		<div class="preloader" style="background: <?php echo esc_attr($comilla_preloader_bg_color);?>;">
			<div class="status" style="background-image: url(<?php if($comilla_preloader_imge){ echo esc_url($comilla_preloader_imge);}else{ echo esc_url($comilla_default_preloader_imge);}?>); background-position: center; background-repeat: no-repeat;">
				<div class="status-mes" ><h4><?php if($comilla_preloader_text){ echo esc_html($comilla_preloader_text);}?></h4></div>
			</div>
		</div>
		<!-- END PRELOADER -->
	
	<?php }elseif($comilla_preloader_opt == '1' && $comilla_homepage_opt == '1'){ ?>	

	<?php if(is_front_page()) {?>
		<!-- START PRELOADER -->
		<div class="preloader" style="background: <?php echo esc_attr($comilla_preloader_bg_color);?>;">
			<div class="status" style="background-image: url(<?php if($comilla_preloader_imge){ echo esc_url($comilla_preloader_imge);}else{ echo esc_url($comilla_default_preloader_imge);}?>); background-position: center; background-repeat: no-repeat;">
				<div class="status-mes" ><h4><?php if($comilla_preloader_text){ echo esc_html($comilla_preloader_text);}?></h4></div>
			</div>
		</div>
		<!-- END PRELOADER -->
	<?php } } ?>
	
	
	<!-- START NAVBAR -->
	<div class="navbar navbar-default navbar-fixed-top menu-top <?php if(is_user_logged_in()){ echo esc_attr('user_admin_menu');}?>">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"><?php esc_html_e('Toggle navigation' , 'comilla');?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo esc_url(home_url("/"));?>" class="navbar-brand">			
					<?php if(get_custom_logo()){
						 the_custom_logo();
					}else { ?>
					  <img src="<?php echo esc_url($comilla_default_logo);?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-responsive">
					<?php } ?>
				</a>
			</div>
			<div class="navbar-collapse collapse">
				<nav id="nav">
					<?php comilla_main_menu();?>
				</nav>
			</div> 
		</div><!--- END CONTAINER -->
	</div> 
	<!-- END NAVBAR -->	
<?php }

function comilla_blog_banner(){ 
global $comilla;

$comilla_theme_opt_img = $comilla['comilla_home_banner_img']['url'];	
$comilla_default_banner_img = get_template_directory_uri() . '/assets/img/bg/section-top-bg.jpg';

?>

	<!-- START  HOME DESIGN -->
	<section class="section-top" style="background: url(<?php if($comilla_theme_opt_img){ echo esc_url($comilla_theme_opt_img); }else{ echo esc_url($comilla_default_banner_img);} ?>)no-repeat;background-size:cover; background-position: center center;background-attachment:fixed">
		<div class="overlay">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
					<div class="section-top-title" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h2><?php esc_html_e('Blog' , 'comilla');?></h2>
						<ol class="breadcrumb">
						  <li><a href="<?php echo esc_url('/');?>"><?php esc_html_e('Home' , 'comilla');?></a></li>
						  <li class="active"><?php esc_html_e('Blog' , 'comilla');?></li>
						</ol>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</div><!--- END HOME OVERLAY -->
	</section>	
	<!-- END  HOME DESIGN -->	
	
<?php }

function comilla_shop_archive_banner(){ 
global $comilla;

$comilla_theme_opt_img = $comilla['comilla_home_banner_img']['url'];	
$comilla_default_banner_img = get_template_directory_uri() . '/assets/img/bg/section-top-bg.jpg';

?>

	<!-- START  HOME DESIGN -->
	<section class="section-top" style="background: url(<?php if($comilla_theme_opt_img){ echo esc_url($comilla_theme_opt_img); }else{ echo esc_url($comilla_default_banner_img);} ?>)no-repeat;background-size:cover; background-position: center center;background-attachment:fixed">
		<div class="overlay">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
					<div class="section-top-title" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h2><?php esc_html_e('Shop' , 'comilla');?></h2>
						<ol class="breadcrumb">
						  <li><a href="<?php echo esc_url('/');?>"><?php esc_html_e('Home' , 'comilla');?></a></li>
						  <li class="active"><?php esc_html_e('Shop' , 'comilla');?></li>
						</ol>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</div><!--- END HOME OVERLAY -->
	</section>	
	<!-- END  HOME DESIGN -->	
	
<?php }

function comilla_single_post_banner(){ 
global $comilla;

$comilla_theme_opt_img = $comilla['comilla_home_banner_img']['url'];	
$comilla_meta_banner_img = get_post_meta(get_the_ID(), '_comilla_upload_banner_image', true);
$comilla_default_banner_img = get_template_directory_uri() . '/assets/img/bg/section-top-bg.jpg';

?>

	<!-- START  HOME DESIGN -->
	<section class="section-top" style="background: url(<?php if($comilla_meta_banner_img){ echo esc_url($comilla_meta_banner_img);}elseif($comilla_theme_opt_img){ echo esc_url($comilla_theme_opt_img);}else{ echo esc_url($comilla_default_banner_img);}?>)no-repeat;background-size:cover; background-position: center center;background-attachment:fixed">
		<div class="overlay">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
					<div class="section-top-title" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h2><?php the_title();?></h2>
						<ol class="breadcrumb">
						  <li><a href="<?php echo esc_url('/');?>"><?php esc_html_e('Home' , 'comilla');?></a></li>
						  <li class="active"><?php the_title();?></li>
						</ol>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</div><!--- END HOME OVERLAY -->
	</section>	
	<!-- END  HOME DESIGN -->
	
<?php }

function comilla_archive_banner(){ 
global $comilla;

$comilla_theme_opt_img = $comilla['comilla_home_banner_img']['url'];	
$comilla_default_banner_img = get_template_directory_uri() . '/assets/img/bg/section-top-bg.jpg';

?>

	<!-- START  HOME DESIGN -->
	<section class="section-top" style="background: url(<?php if($comilla_theme_opt_img){ echo esc_url($comilla_theme_opt_img); }else{ echo esc_url($comilla_default_banner_img);} ?>)no-repeat;background-size:cover; background-position: center center;background-attachment:fixed">
		<div class="overlay">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
					<div class="section-top-title" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h2><?php esc_html_e('Archive' , 'comilla');?></h2>
						<ol class="breadcrumb">
						  <li><a href="<?php echo esc_url('/');?>"><?php esc_html_e('Home' , 'comilla');?></a></li>
						  <li class="active"><?php the_archive_title();?></li>
						</ol>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</div><!--- END HOME OVERLAY -->
	</section>	
	<!-- END  HOME DESIGN -->	
	
<?php }

function comilla_search_banner(){ 
global $comilla;

$comilla_theme_opt_img = $comilla['comilla_home_banner_img']['url'];	
$comilla_default_banner_img = get_template_directory_uri() . '/assets/img/bg/section-top-bg.jpg';

?>

	<!-- START  HOME DESIGN -->
	<section class="section-top" style="background: url(<?php if($comilla_theme_opt_img){ echo esc_url($comilla_theme_opt_img); }else{ echo esc_url($comilla_default_banner_img);} ?>)no-repeat;background-size:cover; background-position: center center;background-attachment:fixed">
		<div class="overlay">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
					<div class="section-top-title" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h2><?php esc_html_e('Search' , 'comilla');?></h2>
						<ol class="breadcrumb">
						  <li><a href="<?php echo esc_url('/');?>"><?php esc_html_e('Home' , 'comilla');?></a></li>
						  <li class="active"><?php printf( esc_html__( 'Search Results for: %s', 'comilla' ), '<span>' . get_search_query() . '</span>' ); ?></li>
						</ol>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</div><!--- END HOME OVERLAY -->
	</section>	
	<!-- END  HOME DESIGN -->	
	
<?php }

function comilla_404_banner(){ 
global $comilla;

$comilla_theme_opt_img = $comilla['comilla_home_banner_img']['url'];	
$comilla_default_banner_img = get_template_directory_uri() . '/assets/img/bg/section-top-bg.jpg';

?>

	<!-- START  HOME DESIGN -->
	<section class="section-top" style="background: url(<?php if($comilla_theme_opt_img){ echo esc_url($comilla_theme_opt_img); }else{ echo esc_url($comilla_default_banner_img);} ?>)no-repeat;background-size:cover; background-position: center center;background-attachment:fixed">
		<div class="overlay">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
					<div class="section-top-title" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
						<h2><?php esc_html_e('404' , 'comilla');?></h2>
						<ol class="breadcrumb">
						  <li><a href="<?php echo esc_url('/');?>"><?php esc_html_e('Home' , 'comilla');?></a></li>
						  <li class="active"><?php esc_html_e('404' , 'comilla');?></li>
						</ol>
					</div><!-- //.HERO-TEXT -->
				</div><!--- END COL -->
			</div><!--- END CONTAINER -->
		</div><!--- END HOME OVERLAY -->
	</section>	
	<!-- END  HOME DESIGN -->	
	
<?php }

function comilla_footer(){ 
global $comilla;

$comilla_copywrite_text = $comilla['comilla_copywrite_text'];	
$comilla_footer_fb_link = $comilla['comilla_footer_fb_link'];	
$comilla_footer_tw_link = $comilla['comilla_footer_tw_link'];	
$comilla_footer_gplus_link = $comilla['comilla_footer_gplus_link'];	
$comilla_footer_linkedin_link = $comilla['comilla_footer_linkedin_link'];	
$comilla_footer_youtube_link = $comilla['comilla_footer_youtube_link'];	
$comilla_footer_skype_link = $comilla['comilla_footer_skype_link'];

?>

<!-- START FOOTER BOTTOM -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 wow zoomIn">
				<p class="footer_copyright pull-left"><?php echo comilla_wp_kses($comilla_copywrite_text);?></p>						
			</div><!--- END COL -->
			<div class="col-md-6 col-sm-6 col-xs-12 wow zoomIn">
				<div class="footer_social pull-right">
					<ul>
							<?php if($comilla_footer_fb_link){ ?>
								<li><a class="f_facebook  wow bounceInDown" href="<?php echo esc_url($comilla_footer_fb_link);?>"><i class="fa fa-facebook"></i></a></li>
							<?php } if($comilla_footer_tw_link){?>
								<li><a class="f_twitter wow bounceInDown" data-wow-delay=".1s" href="<?php echo esc_url($comilla_footer_tw_link);?>"><i class="fa fa-twitter"></i></a></li>
							<?php } if($comilla_footer_gplus_link){?>
								<li><a class="f_google wow bounceInDown" data-wow-delay=".2s" href="<?php echo esc_url($comilla_footer_gplus_link);?>"><i class="fa fa-google-plus"></i></a></li>
							<?php } if($comilla_footer_linkedin_link){?>
								<li><a class="f_linkedin wow bounceInDown" data-wow-delay=".3s" href="<?php echo esc_url($comilla_footer_linkedin_link);?>"><i class="fa fa-linkedin"></i></a></li>
							<?php } if($comilla_footer_youtube_link){?>
								<li><a class="f_youtube wow bounceInDown" data-wow-delay=".4s" href="<?php echo esc_url($comilla_footer_youtube_link);?>"><i class="fa fa-youtube"></i></a></li>
							<?php } if($comilla_footer_skype_link){?>
								<li><a class="f_skype wow bounceInDown" data-wow-delay=".5s" href="<?php echo esc_url($comilla_footer_skype_link);?>"><i class="fa fa-skype"></i></a></li>
							<?php } ?>				
					</ul>
				</div>					
			</div><!--- END COL -->
		</div><!--- END ROW -->
	</div><!--- END CONTAINER -->
</footer>
<!-- END FOOTER BOTTOM-->	
	
<?php }