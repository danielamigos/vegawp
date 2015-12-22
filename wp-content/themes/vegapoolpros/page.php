<?php get_header(); ?>

	<main role="main">
		<div class="row">
			<div class="col-sm-4 roundcorner-wrapper"  >
				<div class="page-logo">
					<?php if ( get_theme_mod( 'vega_logo' )): ?>
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr(get_bloginfo( 'name','display')); ?>' rel='home'>
						<img src='<?php echo esc_url( get_theme_mod( 'vega_logo' ) ); ?>' alt='<?php echo esc_attr(get_bloginfo('name','display')); ?>'>
					</a>
					<?php endif; ?>				
				</div>
				
				<div class="page-secondary-slideshow">
					<?php if( have_rows('secondary_slide_show_images') ): ?> 
                    <div class="danielvalenzuela-slideshow" id="secondary-slideshow" data-auto-play="true" data-speed="10000">
                        <div class="danielvalenzuela-slideshow-wrapper">                            
                            <div class="secondary-slideshow-controls-wrapper">
                                <div class="secondary-slideshow-controls">
                                    <a href="#" class="previous-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/Previous.png" alt="Previous" /></a>
                                    <a href="#" class="pause-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/pause.png" alt="Pause" /></a>
                                    <a href="#" class="next-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/Next.png" alt="Next" /></a>
                                </div>
                            </div> 
                            <?php while ( have_rows('secondary_slide_show_images') ) : the_row(); $image = get_sub_field('image'); ?>                            
                                <div class="danielvalenzuela-slide"  >
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php endif;?>
				</div>
                <?php vegapoolpros_secondary(); ?>				
			</div>
			<div class="col-sm-8 roundcorner-wrapper">
				<div class="page-main-slideshow">
                    <?php $images = get_field('main_slide_show_images'); if( $images ): ?>							
                    <div class="danielvalenzuela-slideshow" id="main-slideshow" data-auto-play="true">
                        <div class="danielvalenzuela-slideshow-wrapper">                            
                            <div class="page-title">
                                <h1><?php the_title(); ?></h1>
                                <div class="main-slide-controls">
                                    <a href="#" class="previous-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/Previous.png" alt="Previous" /></a>
                                    <a href="#" class="pause-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/pause.png" alt="Pause" /></a>
                                    <a href="#" class="next-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/Next.png" alt="Next" /></a>
                                </div>
                            </div> 
                            <?php foreach( $images as $image ): ?> 
                            <div class="danielvalenzuela-slide"  >
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
				</div>
				
				<div class="page-main-content">								
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content(); ?>					
							<?php //comments_template( '', true ); // Remove if you don't want comments ?>					
							<br class="clear">					
							<?php edit_post_link(); ?>					
						</article><!-- /article -->					
					<?php endwhile; ?>					
					<?php else: ?>
						<article>					
							<h2><?php _e( 'Sorry, nothing to display.', 'vegapoolpros' ); ?></h2>					
						</article><!-- /article -->					
					<?php endif; ?>
				</div>
			</div>
		</div>
		
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
