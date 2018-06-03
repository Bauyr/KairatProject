
// STYLE FORMS 

function style_forms(el) {  
	

    // textarea 
    el.find("textarea").not(".textarea textarea").each(function(){
        $(this).wrap('');
    });	

    // checkbox    
    el.find(".chbox").each(function(){
        $(this).parent('span').addClass('chbox-label');
        $(this).wrap('<span class="checkbox"></span>');
        if ( $(this).attr("checked"))  $(this).parent('.checkbox').css({
            'background-position':'0 102%'
        }); 
        else   $(this).parent('.checkbox').css({
            'background-position':'0 0'
        }); 
    }); 

    el.find(".chbox-label").click(function() {
        if ( $('.checkbox .chbox',this).attr("checked") ) { 
            $('.checkbox',this).css({
                'background-position':'0 0'
            });
            $('.chbox',this).attr("checked", false);
        }
        else {
            $('.checkbox',this).css({
                'background-position':'0 102%'
            });
            $('.checkbox .chbox',this).attr("checked", true);
        }  
    });

    // radio    
    el.find(".radio").each(function(){
        $(this).parent('label').addClass('radio-label');
        $(this).wrap('<span class="radiobox"></span>');
        if ( $(this).attr("checked") == "checked")  $(this).parent('.radiobox').css({
            'background-position':'0 0'
        }); 
        else   $(this).parent('.radiobox').css({
            'background-position':'0 0'
        }); 
    }); 

    el.find(".radio-label").click(function() {
        $(this).parent().parent().find('.radiobox').css({
            'background-position':'0 0'
        });
        $(this).children('.radiobox').css({
            'background-position':'0 100%'
        });
        $(this).parent().parent().find('.radio').attr("checked", false);
        $('.radio',this).attr("checked", true);
    });



    // select
    el.find(".sel").each(function(){
        $(this).wrap('<span class="sel_left '+$(this).attr("id")+'"><span class="sel_right"></span></span>');
        $(this).before('<span class="sel_val"></span><ul></ul>');
        $(this).parent().find('.sel_val').html($(this).find(":selected").text());       
        $(this).find("option").each(function(){
            $(this).parent().prev('ul').append('<li>'+$(this).html()+'</li>');
        });
    });    

    el.find(".sel").each(function(){
        if ($(this).attr("disabled")) {
            $(this).parents('.sel_left').addClass("disabled");
        }
    });    

    el.find(".sel_val").click(function() {
        if (!$(this).next('.sel').attr("disabled")) $(this).next('ul').show();
    });
    el.find(".sel_left").mouseleave(function() {
        $(this).find('ul').hide();
    });
    el.find(".sel_left li").click(function() {
        $(this).parent().parent().find('.sel_val').html( $(this).html()); 
        var num = $(this).index();
        $(this).parent().next('select').find('option').attr('selected','');
        $(this).parent().next('select').find('option').eq(num).attr('selected','selected');
        $('#search_form').submit();
        $(this).parent().find('li').removeClass('cur').removeClass('hover');
        $(this).addClass('cur');
        $(this).parent('ul').hide();      
    });

    el.find(".sel").focus(function() {
        $(this).prev('ul').show();
        $(this).prev('ul').find('li:first').addClass('hover');
    });
    el.find(".sel").focusout(function() {
        $(this).prev('ul').find('li.hover').removeClass('hover');
        $(this).prev('ul').hide();      
    });
    
  /*  
    var i=500;
    el.find(".sel_left").each(function(){
        $(this).css({
            'z-index':i
        });
        i-=1;
    });	
*/

el.find(".sel_left ul").css({'z-index': 5});

    el.find(".sel").keydown(function(e) {
        switch(e.keyCode) { 
            // «стрелка вверх»
            case 38:
                if ($(this).prev('ul').find('li.hover').prev('li').length) {
                    $(this).prev('ul').find('li.hover').removeClass('hover').prev('li').addClass('hover');
                }
                else {
                    $(this).prev('ul').find('li.hover').removeClass('hover');
                    $(this).prev('ul').find('li:last').addClass('hover');
                }
                $(this).prev('ul').scrollTop( $(this).prev('ul').find('.hover').index() * 21) ;
                break;
            // «стрелка вниз»
            case 40:
                if ($(this).prev('ul').find('li.hover').next('li').length) {
                    $(this).prev('ul').find('li.hover').removeClass('hover').next('li').addClass('hover');
                }
                else {
                    $(this).prev('ul').find('li.hover').removeClass('hover');
                    $(this).prev('ul').find('li:first').addClass('hover');
                }
                $(this).prev('ul').scrollTop( $(this).prev('ul').find('.hover').index() * 21) ;
                break;
            // Enter
            case 13:
                $(this).prev('ul').find('li.hover').click();
                $(this).prev('ul').hide();
                break;
            case 32:
                $(this).prev('ul').find('li.hover').click();
                $(this).prev('ul').hide();
                break;
        }
    });



    // input :file
    el.find(".file").each(function(){
        $(this).wrap('<span class="file_inp"></span>');
        $(this).before('<span class="file_left"><span class="file_right"><span class="file_val"></span></span></span><span class="file_but">Прикрепить файл</span>');
    });	

    el.find(".file").change(function(){
        $(this).parent().find('.file_val').html( $(this).val());
    });	  



}

$(document).ready(function(){ 
    style_forms($('body'));
});



