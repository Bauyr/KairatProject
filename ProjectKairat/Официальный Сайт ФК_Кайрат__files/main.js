/*$(window).load(function(){
});*/

$(document).ready(function(){
    $(".fade").fadeTo("slow", 1.0); // Устанавливаем непрозрачность миниатюр до 60% при загрузке страницы.
        $(".fade").hover(function(){
        $(this).siblings().fadeTo("slow", 0.6); // При наведении курсора, непрозрачность становится 100%.
        },function(){
        $(this).siblings().fadeTo("slow", 1.0); // Пр потере фокуса непрозрачность опять становится 60%.
	});

    $('ul.tabs').each(function() {
	    $(this).find('li').each(function(i) {
	      $(this).click(function(){
	        $(this).addClass('current').siblings().removeClass('current')
	          .parents('div.tab_section').find('div.box').eq(i).fadeIn(1).siblings('div.box').hide();
	      });
	    });
	  });

    $('ul.tabs2').each(function() {
	    $(this).find('li').each(function(i) {
	      $(this).click(function(){
	        $(this).addClass('current').siblings().removeClass('current')
	          .parents('div.tab_section2').find('div.box2').eq(i).fadeIn(1).siblings('div.box2').hide();
	      });
	    });
	  });


	$('.prod_container a').click(function(e){
		//console.log(window.pageYOffset);
		var display = $('.lightbox').css('display');
		if(display == 'none'){
			$('.lightbox').fadeIn(400);
		}
		//$('html, body').animate({scrollTop:0}, 'normal');
		//return false;
		e.preventDefault();
	})
/*
	$('.shadow').click(function(){
		var display = $('.lightbox').css('display');
		if(display == 'block'){
			$('.lightbox').fadeOut('small');
		}
		return false;
	});
*/

	/* Инициализация скролов */

	var wndo = new Array();

	console.log(wndo);

	$('#carousel a').click(function(e){
		var number = $(this).attr('href').substr(1);
		var lightbox_name = 'lightbox-'+number;
		//console.log(window.pageYOffset);
		var display = $('#'+lightbox_name).css('display');
		if(display == 'none'){
			$('#'+lightbox_name).fadeIn(400);
		}

		$('#scrollbar-'+number).html('');

		wndo[number] = new dw_scrollObj('wn-'+number, 'lyr-'+number);
		wndo[number].buildScrollControls('scrollbar-'+number, 'v', 'mouseover', true);

		e.preventDefault();
		//$('html, body').animate({scrollTop:0}, 'normal');
		//return false;
	});

	$('.shadow').click(function(){
		var display = $(this).parent().css('display');
		if(display == 'block'){
			$(this).parent().fadeOut('small');
		}
		return false;
	});

	var carousel = $("#carousel").waterwheelCarousel({
			flankingItems: 2,
			sizeMultiplier: 0.95,
			separation: 160,
			separationMultiplier: 0.95
        });

        $('#prev').bind('click', function () {
          carousel.prev();
          return false
        });

        $('#next').bind('click', function () {
          carousel.next();
          return false;
        });

        $('#reload').bind('click', function () {
          newOptions = eval("(" + $('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });


    $('#carousel').bind('mousewheel', function(e){
		var delta = e.originalEvent.wheelDelta/120;
        if(delta >= 1) {
			for(var i=0;i<delta; i++)
				carousel.prev();
        }
        else if( delta <= -1){
			for(var i=0;i<-(delta); i++)
				carousel.next();
        }
    });

    initSlider();
    // $("#carousel").featureCarousel({
		  // largeFeatureWidth:0.9,
		  // largeFeatureHeight:500,
		  // smallFeatureWidth:500,
		  // smallFeatureHeight:330,
		  // topPadding:40,
		  // sidePadding:-50,
		  // captionBelow: false,
		  // autoPlay: 0,
    //       preload: true,
    //     });
});

function initSlider(){
    $('div.slider ul').cycle({
        fx:      'fade',
        timeout:  5000,
        speed:    1000,
        pager: 'div.pager'
    });
    
$(function() {
	
	if (document.createElement('canvas').getContext) {
		var image = $('<img />').load(function() {
			var image = this,
				offset_left = 5,
				offset_number = 4;
			
			function drawNumberLine(context, position, number, line) {
				context.drawImage(image, number * 25, line, 25, 1, position * 25 + offset_left + offset_number, line, 25, 1);
			}
			
			function drawNumberBottom(context, position, number) {
				context.drawImage(image, number * 25, 25, 25, 23, position * 25 + offset_left + offset_number, 25, 25, 23);
			}
			
			function drawNumberTop(context, position, number) {
				context.drawImage(image, number * 25, 0, 25, 23, position * 25 + offset_left + offset_number, 0, 25, 23);
			}
			
			function cf_draw(from, to, canvas, step) {
				var context = canvas.getContext('2d'),
					offsets = [
					         {w: 2,		h: -2},
					         {w: 4,		h: -5},
					         {w: 6,		h: -9},
					         {w: 8,		h: -14},
					         {w: 10,	h: -20},
					         {w: 0,		h:  0},
					         {w: 10,	h: -20},
					         {w: 8,		h: -14},
					         {w: 6,		h: -9},
					         {w: 4,		h: -5},
					         {w: 2,		h: -2},
					         {w: 0,		h:  0}
					],
					width = canvas.width,
					nwidth = width + offsets[step].w,
					maxscale = nwidth/width,
					height = 23,
					nheight = height + offsets[step].h,
					scale_y = nheight / height,
					dig_col = parseInt($(canvas).parents('div.c-block')[0].className.substr(-1), 10);
				
				from = from.toString();
				to = to.toString();
				
				while (from.length < dig_col) {from = '0' + from;}
				while (to.length < dig_col) {to = '0' + to;}
				
				
				context.clearRect(0, 0, width, canvas.height);
				context.save();
	
				for (var j = 0; j <= to.length - 1; j++) {
					drawNumberTop(context, j, to[j]);
				}
				
				if (step == 11) {
					for (var j = 0; j <= to.length - 1; j++) {
						drawNumberBottom(context, j, to[j]);
					}
					return;
				}
				
				
				for (var j = 0; j <= from.length - 1; j++) {
					drawNumberBottom(context, j, from[j]);
				}
	
				// draw bg
				context.drawImage(image, 0, 96 + step * 48, width - 5, 48, 0, 0, width - 5, 48);
				context.drawImage(image, 125, 96 + step * 48, 4, 48, width - 5, 0, 5, 48);
	
				for (var i = 0; i < 24; i++) {
					if (step < 5) {
						context.setTransform(maxscale - (maxscale - 1) * i / 23, 0, 0, scale_y, -(nwidth - width) / 2 * (1 - i / 23), -offsets[step].h);
						for (var j = 0; j <= from.length - 1; j++) {
							drawNumberLine(context, j, from[j], i);
						}
					}
					
					if (step > 5) {
						context.setTransform(1 + (maxscale - 1) * i / 23, 0, 0, scale_y, -(nwidth - width) / 2 * (i / 23), -offsets[step].h);
						for (var j = 0; j <= to.length - 1; j++) {
							drawNumberLine(context, j, to[j], 25+i);
						}
					}
					context.restore();
				}
				context.setTransform(1, 0, 0, 1, 0, 0);
	
				// draw blick
				context.drawImage(image, 130, 96 + step * 48, width - 5, 48, 0, 0, width - 5, 48);
				context.drawImage(image, 255, 96 + step * 48, 4, 48, width -5, 0, 5, 48);
			}
				
			function cf_animate(from, to, canvas, step) {
				cf_draw(from, to, canvas, step);
				step ++;
				if (step > 11) return;
	
				setTimeout(function() {
					cf_animate(from, to, canvas, step);
				}, 50 - 20 * step/11);
			}
			
			function seconds(from, canvas) {
				var to = from - 1;
				
				if (from <= 0) {
					to = 59;
					
					// minutes animate
					var minutes_from = parseInt($('span', minutes_cnt).text(), 10);
					var minutes_to = minutes_from - 1;
					
					if (minutes_from <= 0) {
						minutes_to = 59;
						
						// hourses animate
						var hourses_from = parseInt($('span', hourses_cnt).text(), 10);
						var hourses_to = hourses_from - 1;
						
						if (hourses_from <= 0) {
							hourses_to = 23;
							
							var days_from = parseInt($('span', days_cnt).text(), 10);
							var days_to = days_from - 1;
							
							if (days_from == 0) {
								return;
							}
							cf_animate(days_from, days_to, $('canvas', days_cnt)[0], 0);
							$('span', days_cnt).text(days_to);
						}
						cf_animate(hourses_from, hourses_to, $('canvas', hourses_cnt)[0], 0);
						$('span', hourses_cnt).text(hourses_to);
					}
	
					cf_animate(minutes_from, minutes_to, $('canvas', minutes_cnt)[0], 0);
					$('span', minutes_cnt).text(minutes_to);
				}
			
				cf_animate(from, to, canvas, 0);
				
				from--;
				if (from < 0) {from = 59;}
	
				setTimeout(function() {
					seconds(from, canvas);
				}, 1000);
			}
			
			
			$('div.bl-inner').each(function() {
				var canvas = $('<canvas></canvas>').css({
					position: 'absolute',
					left: -5,
					top: 0
				}).appendTo(this)[0];
				
				canvas.width = $(this).width() + offset_left * 2 + 3;
				canvas.height = $(this).height();
				
				cf_draw(parseInt($('span', this).text(), 10), parseInt($('span', this).text(), 10), canvas, 11);
			});
			
			var seconds_cnt = $('div.time .bl-inner:last'),
				minutes_cnt = $('div.time .bl-inner:eq(2)'),
				hourses_cnt = $('div.time .bl-inner:eq(1)'),
				days_cnt 	= $('div.time .bl-inner:eq(0)');
	
			seconds(parseInt($('span', seconds_cnt).text(), 10), $('canvas', seconds_cnt)[0]);
		});
		image.attr('src', 'i/sprites.png');
	} else {
		$('div.bl-inner span').show();
	}
});    
}

