function add_bookmark(title,url) {
	if (window.sidebar) {
		window.sidebar.addPanel(title, url,"");
	} else if( document.all ) {
		window.external.AddFavorite( url, title);
	} else if( window.opera && window.print ) {
		return true;
	}
}

jQuery(function($){
	$("#add-fav").click(
		function(){
			add_bookmark(document.title,window.location.href);
		}
	);	
	$("#ylmf-pr").hover(
		function(){
			$("#ylmf-link").slideDown("fast");				 
		},
		function(){
			$("#ylmf-link").hide()
		}
	);
	$("#ylmf-link").hover(
		function(){
			$(this).show();	   
		},
		function(){
			$(this).slideUp("fast");	
		}
	);
	if($.browser.version == "6.0"){
		$(".func-li").hover(
			function(){
				$(this).addClass("hover")	
			},
			function(){
				$(this).removeClass("hover")
			}
		)
	}
})