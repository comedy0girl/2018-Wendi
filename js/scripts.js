$(document).ready(function(){ 
	var $iframes = $("iframe");

	$iframes.each(function () {
	    $(this).removeAttr("width");
	    $(this).removeAttr("height");
	    $(this).wrap("<div class='videowrapper'></div>");
	});
});