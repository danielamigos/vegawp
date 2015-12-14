(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		$('.frontpage-heading').hover(function(){
			$(this).find('img').stop().fadeIn('slow');
			$(this).find('h1').hide();
			
		},function(){
			$(this).find('img').stop().fadeOut('slow',function(){ $('.frontpage-heading').find('h1').show(); });

		});
	});
	
})(jQuery, this);
