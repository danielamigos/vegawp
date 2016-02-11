			
			<footer class="footer roundcorner-wrapper" role="contentinfo">
				<div class="row footer-wrapper">
					<div class="col-sm-6">
                        <div class="footer-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/footerlogo.png" alt="Footer logo"/></div>
                        <div class="footer-call-for-estimate-wrapper"><p class="footer-call-for-estimate">Call for a free estimate 480-378-3436</p></div>
					</div>
					<div class="col-sm-3"><?PHP vegapoolpros_footer(); ?></div>
					<div class="col-sm-3">
                        <?php if( have_rows('footer_social_media_icons','option') ): ?>
                        
                            <div class="social-media-links-wrapper" style="display:inline-block">
                                                    
                            <?php while( have_rows('footer_social_media_icons','option') ): the_row();  ?>
                                <a href="<?php the_sub_field('url');?>"><img src="<?php echo get_template_directory_uri(); ?>/img/<?php the_sub_field('social_media'); ?>.png" alt="<?php the_sub_field('social_media'); ?>"/></a>
                            <?php endwhile; ?>
                            
                            </div>
                            
                        <?php endif; ?>
                        <div class="footer-copyright"><?PHP the_field('footer_copyright_text','option'); ?></div>
                    </div>
				</div>
			</footer><!-- /footer -->

		</div><!-- /container -->

		<?php wp_footer(); ?>

		<!-- analytics
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script> -->

	</body>
</html>
