       jQuery("document").ready(function($){
       		var nav=$('.menuactions');
       		var pos=nav.offset().top;
       		
       		$(window).scroll(function(){
       			var fix=($(this).scrollTop()>pos)?true:false;
       			nav.toggleClass("fix-menuactions",fix);
       			$('body').toggleClass("fix-body",fix);
       		});
       });