(function ($, root, undefined) {
	
	$(function () {		
		'use strict';
		// DOM ready, take it away
        var slideshows = $('.danielvalenzuela-slideshow');
		$.each(slideshows, function(index,slideshow){
			var $slideshow = $(slideshow);
			var $wrapper = $slideshow.find('.danielvalenzuela-slideshow-wrapper');
    		$slideshow.find('.danielvalenzuela-slide').first().clone().appendTo($wrapper);	
			var $slides = $slideshow.find('.danielvalenzuela-slide');
			var numberOfSlides = $slides.length-1;
			
			var slideWidth = $slideshow.width();
			$slides.width(slideWidth);
			var inTransition = false;
			var slideShowInterval;
			var autoPlay = $slideshow.data('auto-play');
			if(autoPlay)
				autoPlay = parseBool(autoPlay);
			else
				autoPlay = false;
			var speed = $slideshow.data('speed');
			var startPos = $slideshow.data('start-position');
			if (!speed) speed = 4000;
			if (!startPos) startPos = 0;
			var currentPos = startPos;			
			
			$slides.wrapAll('<div class="danielvalenzuela-slides-holder"></div>');
			$slides.css({ 'float' : 'left' });
			$slideshow.find('.danielvalenzuela-slides-holder').css('width', slideWidth * (numberOfSlides+1));
			$slideshow.find('.danielvalenzuela-slides-holder').css('marginLeft', slideWidth*-currentPos);	
			$slideshow.find('.danielvalenzuela-slide img').css('display', 'block');
			
			if(autoPlay)
				slideShowInterval = setInterval(function(){ NextSlide($wrapper); }, speed);
			$slideshow.attr('data-speed',speed);
			$slideshow.attr('data-slideshow-interval',slideShowInterval);
			$slideshow.attr('data-number-slides',numberOfSlides);
			$slideshow.attr('data-current-position',currentPos);
			$slideshow.attr('data-in-transition',inTransition);
			//$slideshow.find('.danielvalenzuela-slides-holder').click(function(){ NextSlide(this); });
			
			ResizeSlides($slideshow);				
		});			
		
		$(window).resize(function(){	
	        var slideshows = $('.danielvalenzuela-slideshow');
			$.each(slideshows, function(index,slideshow){
				var $slideshow = $(slideshow);
				ResizeSlides($slideshow);
			});
		});
		
		$(window).bind('orientationchange', function (e) { 
			setTimeout(function () {
		        var slideshows = $('danielvalenzuela-slideshow');
				$.each(slideshows, function(index,slideshow){
					var $slideshow = $(slideshow);
					ResizeSlides($slideshow);
				});
			}, 500);
		});
		
		function ResizeSlides(slideshow)
		{		
			var $slideshow = $(slideshow);
			var slideWidth = $slideshow.width();				
			var numberOfSlides = $slideshow.attr('data-number-slides',numberOfSlides);	
			var currentPos = $slideshow.attr('data-current-position',currentPos);
			$slideshow.find('.danielvalenzuela-slideshow-wrapper').width(slideWidth);
			$slideshow.find('.danielvalenzuela-slide').width(slideWidth);	
			$slideshow.find('.danielvalenzuela-slides-holder').css('width', slideWidth * (numberOfSlides+1));
			$slideshow.find('.danielvalenzuela-slides-holder').css('marginLeft', slideWidth*-currentPos);		
		}

		function NextSlide(element)
		{		
			var $slideshow = $(element).closest('.danielvalenzuela-slideshow');
		 	var inTransition = parseBool($slideshow.attr('data-in-transition'));
			if (inTransition == false)
			{
				
				$slideshow.attr('data-in-transition',true);
				var slideWidth = parseInt($slideshow.width());	
				var currentPos = parseInt($slideshow.attr('data-current-position'));
				var numberOfSlides = parseInt($slideshow.attr('data-number-slides'));
					
				$slideshow.find('.danielvalenzuela-slides-holder').animate({'marginLeft' : slideWidth*-(currentPos+1)},function(){
					currentPos++;
					if (currentPos == numberOfSlides)
					{
						$slideshow.find('.danielvalenzuela-slides-holder').css({'marginLeft':0});
						currentPos = 0;
					}				
					$slideshow.attr('data-current-position',currentPos);
				});
			}
		}
	
		function PreviousSlide(element)
		{						
			var $slideshow = $(element).closest('.danielvalenzuela-slideshow');
		 	var inTransition = parseBool($slideshow.attr('data-in-transition'));
			if (inTransition == false)
			{
				$slideshow.attr('data-in-transition',true);
				var slideWidth = parseInt($slideshow.width());	
				var currentPos = parseInt($slideshow.attr('data-current-position'));
				var numberOfSlides = parseInt($slideshow.attr('data-number-slides'));
				currentPos--;			
                
				if (currentPos == -1)
				{
					currentPos = numberOfSlides-1;
					$slideshow.find('.danielvalenzuela-slides-holder').css({'marginLeft':slideWidth*-(currentPos+1)});
				}
				
				$slideshow.find('.danielvalenzuela-slides-holder').animate({'marginLeft' : slideWidth*-(currentPos)},function(){
					$slideshow.attr('data-current-position',currentPos);					
				});
			}
		}
		
		function PauseSlide(element)
		{
			var $slideshow = $(element).closest('.danielvalenzuela-slideshow');
			var slideShowInterval = parseInt($slideshow.attr('data-slideshow-interval'));
			if (slideShowInterval != -1)
			{
				clearInterval(slideShowInterval);
				$slideshow.attr('data-slideshow-interval',-1);
			}
			else	
			{
				var speed = parseInt($slideshow.attr('data-speed'));
				slideShowInterval = setInterval(function(){ NextSlide(element); }, speed); 
				$slideshow.attr('data-slideshow-interval',slideShowInterval);
			}
		}
		
		function GoToSlide(element,index)
		{
			index = parseInt(index);
			var $slideshow = $(element).closest('.danielvalenzuela-slideshow');
		 	var inTransition = parseBool($slideshow.attr('data-in-transition'));
			if (inTransition == false)
			{
				var slideWidth = parseInt($slideshow.width());	
				var currentPos = parseInt($slideshow.attr('data-current-position'));
				if (index != currentPos)
				{
					$slideshow.attr('data-in-transition',true);
					$slideshow.find('.danielvalenzuela-slides-holder').animate({'marginLeft' : slideWidth*-(index)},function(){
						$slideshow.attr('data-current-position',index);				
						$slideshow.attr('data-in-transition',false);
					});
				}
			}
		}
		
	
		$('.previous-slide').click(function(event)
		{							
			event.preventDefault();
			PreviousSlide(this);
		});
		
		$('.pause-slide').click(function(event)
		{
			event.preventDefault();
			PauseSlide(this);
		});
		
		$('.next-slide').click(function(event)
		{
			event.preventDefault();
			NextSlide(this);
		});
		
		$('.external-previous-slide').click(function(event)
		{							
			event.preventDefault();
			var element = $('#'+$(this).attr('data-slideshow-id'));
			console.log(element);
			PreviousSlide(element);
		});
		
		$('.external-next-slide').click(function(event)
		{
			event.preventDefault();
			var element = $('#'+$(this).attr('data-slideshow-id'));
			console.log(element);
			NextSlide(element);
		});
	}); 
	
})(jQuery, this);


function parseBool(string) {
    var temp = string.toLowerCase();
    return (temp == 'true');
}
