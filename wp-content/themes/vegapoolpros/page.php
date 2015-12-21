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
				
				<div class="page-main-slideshow" style="margin-top:10px;">
					
				</div>
				<div class="secondary-menu">
					<div class="col-sm-6" style="padding: 10px 5px 0 5px">
						<div class="menu-item"><a href="#">About Us</a></div>
					</div>
					<div class="col-sm-6" style="padding: 10px 5px 0 5px">
						<div class="menu-item"><a href="#">Locations</a></div>
					</div>
					<div class="col-sm-6" style="padding: 10px 5px 0 5px">
						<div class="menu-item"><a href="#">Contact Us</a></div>
					</div>
				</div>
				
			</div>
			<div class="col-sm-8 roundcorner-wrapper">
				<div class="page-main-slideshow">
                    <?php $images = get_field('main_slide_show_images'); if( $images ): ?>							
                    <div class="danielvalenzuela-slideshow" id="product-slideshow" data-auto-play="false">
                        <div class="danielvalenzuela-slideshow-wrapper" style="">
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
