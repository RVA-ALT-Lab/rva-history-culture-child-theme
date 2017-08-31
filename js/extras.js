//add a comment extras.js


jQuery(document).ready(function() {

	if (location.pathname.includes('/content-area/')){

		jQuery('.navigation .card-deck a').click(function(event){
				console.log(event)
		        event.preventDefault();
		    jQuery('html, body').animate({
		        scrollTop: jQuery( jQuery(this).attr('href') ).offset().top
		    }, 1000);
		    return false;
		  });



	}

}); //End document ready


jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip()
})