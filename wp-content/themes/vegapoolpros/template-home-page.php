<?php /* Template Name: Home Page Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
			<div class="row">
				
			<?PHP if( have_rows('frontpage_menu') ): while ( have_rows('frontpage_menu') ) : the_row(); $image = get_sub_field('image'); ?> 
				<div class="col-sm-4 roundcorner-wrapper">
					<div class="frontpage-menu">
						<div class="frontpage-menu-wrapper">
							<a href="<?PHP the_sub_field('link'); ?>"><img src="<?PHP echo $image['url']; ?>" alt="<?PHP the_sub_field('title'); ?>" /></a>
							<div class="frontpage-menu-overlay">
								<h2><?PHP the_sub_field('title'); ?></h2>
								<div class="frontpage-menu-description"><?PHP the_sub_field('description'); ?></div>
								<div class="frontpage-menu-keywords"><?PHP the_sub_field('key_words'); ?></div>
							</div>
						</div>
					</div>
				</div>
			<?PHP endwhile; endif;?>  			
			</div>
		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
