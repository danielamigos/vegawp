<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">		
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/icons/manifest.json">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico">
		<meta name="msapplication-TileColor" content="#b91d47">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/icons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/img/icons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="container">

			<!-- header -->
			<header class="header clear" role="banner">
				<?PHP if(is_front_page()): ?>
					<div class="row">
						<div class="col-sm-4 roundcorner-wrapper"  >
							<div class="frontpage-logo">
							<?php if ( get_theme_mod( 'vega_logo' )): ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr(get_bloginfo( 'name','display')); ?>' rel='home'>
								<img src='<?php echo esc_url( get_theme_mod( 'vega_logo' ) ); ?>' alt='<?php echo esc_attr(get_bloginfo('name','display')); ?>'>
							</a>
							<?php endif; ?>
							
							<?PHP if (get_field('use_rollover_logo_image')): ?>
								<?php $image = get_field('rollover_logo_image');
								if( !empty($image) ): ?>					
								<div class="logo-rollover">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"  />		
									<?php if (get_field('logo_rollover_link') != ""): ?><a href="<?php the_field('logo_rollover_link'); ?>" target="<?PHP if (get_field('logo_rollover_link_target')=='Same Page') : echo '_self'; else: echo '_blank'; endif; ?>"><?php endif;?>
									<h2 class="logo-rollover-text"><?PHP the_field('logo_rollover_text'); ?></h1>
									<?php if (get_field('logo_rollover_link') != ""): ?></a><?php endif;?>
								</div>										
								<?php endif; ?>								
							<?php endif; ?>	
									
								
							
							</div>
						</div>
						<div class="col-sm-8 roundcorner-wrapper">
							<div class="frontpage-heading">								
								<?PHP if (get_field('use_header_rollover_image')): ?>	
									<?php $image = get_field('header_rollover_image'); if( !empty($image) ): ?>	
									<img src="<?PHP echo $image['url']; ?>" alt="Header Image" style="opacity:0;"/>
									<?PHP endif; ?>
								<?PHP endif; ?>
								
								<h1><?PHP the_field('header_text'); ?></h1>	
								
								<?PHP if (get_field('use_header_rollover_image')): ?>
									<?php if( !empty($image) ): ?>
										<?php if (get_field('header_rollover_image_link')!=''): ?><a href="<?php the_field('header_rollover_image_link'); ?>"  target="<?PHP if (get_field('header_rollover_image_link_target')=='Same Page') : echo '_self'; else: echo '_blank'; endif; ?>"><?php endif;?>
										<img class="frontpage-heading-image" src="<?PHP echo $image['url']; ?>" alt="Header Image"/>
										<?php if (get_field('add_link_to_header_rollover_image')): ?></a><?PHP endif;?>
									<?PHP endif; ?>
								<?PHP endif; ?>
							</div>
						</div>
					</div>
				<?PHP else: ?>
					<!-- logo -->
					<div class="logo">
						<?php if ( get_theme_mod( 'vega_logo' )): ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr(get_bloginfo( 'name','display')); ?>' rel='home'>
								<img src='<?php echo esc_url( get_theme_mod( 'vega_logo' ) ); ?>' alt='<?php echo esc_attr(get_bloginfo('name','display')); ?>'>
							</a>
						<?php else: ?>
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>						
						<?php endif; ?>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php vegapoolpros_nav(); ?>
					</nav>
					<!-- /nav -->
				<?PHP endif; ?>
			</header>
			<!-- /header -->
