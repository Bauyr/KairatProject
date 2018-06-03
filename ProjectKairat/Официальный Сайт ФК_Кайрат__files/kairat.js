var banner_timer=0;
var change_banner=function(id){
	if(id>2) id=id%3;
	//console.log(id);
	$('.banner_cur').removeClass('banner_cur');
	$('.banner_item[pid='+id+']').addClass('banner_cur');
	$('.banner_image').hide();
	$('.banner_image[pid='+id+']').fadeIn();
}
function next_banner(){
	change_banner(parseInt($('.banner_cur').attr('pid'))+1);
}

$(document).ready(function(){
	
	$("#main_menu_ul li").hover(function(){
		$(".cur_menu").removeClass("cur_menu");
		$(this).addClass("cur_menu");	
		$('.welcome_image').hide();
		$('.welcome_image[pid='+$(this).attr('pid')+']').show();
	},function(){});
	$("#main_menu_ul li").bind('click',function(){
		console.log($(this))

		//$(this).find('a').click();
	})

	$(".holder").click(function(){
		if($(this).val()==$(this).attr('holder')) $(this).val('');
	})
	$(".holder").blur(function(){
		if($(this).val()=='') $(this).val($(this).attr('holder'));
	})
//	alert('fuck you')
	$('.taber a').bind('click',function(){
		var pid=$(this).attr('pid');
		
		$('.cur_news').removeClass('cur_news');
		$(this).parent().addClass('cur_news');
		
		$('.tab_').hide().removeClass('tab_cur');
		$('#tab_'+pid).addClass('tab_cur').fadeIn();
		return false;
	});

	// $('.news_text img').load(function(){
	// 	$('.news_text').jScrollPane();
	// })
	$('#stenagram').jScrollPane();

	$('.banner_item').bind('click',function(){
		change_banner($(this).attr('pid'));
		clearInterval(banner_timer);
		banner_timer=setInterval(next_banner,5000);
	});

	$('#table_widget_selector li a').bind('click',function(){
		$('.table_cur').removeClass('table_cur');
		$(this).parent().addClass('table_cur');
		$('.tour_table_').hide();
		$('#tour_table_'+$(this).parent().attr('pid')).show();
		return false;
	});
	$('#vote_link').bind('click',function(){
		if($('#variants input:checked').length===0) { 
			alert('Вы не проголосовали');	
			return false;
		}
		$('#voter_form').submit();
	});

	banner_timer=setInterval(next_banner,5000);


	$('.men').css({left:$('.top_cur').position().left+'px',width:$('.top_cur').width()+'px'}).show();
	$('.top_cur').addClass('top_cur2').removeClass('top_cur');
	$('#top_nav li').hover(function(){
		$('.men').animate({left:$(this).position().left+'px',width:$(this).width()+'px'},100);
	},function(){});
	$('#menr').hover(function(){},
		function(){
		$('.men').animate({left:$('.top_cur2').position().left+'px',width:$('.top_cur2').width()+'px'},100);
	})
	
});