/** theme scripts **/
$(document).ready(function(){
		newLocation = "/home";
		$('#homelogo').fadeOut(3000,portfoliopage);

	function portfoliopage(){
		window.location = newLocation;
	}


	$('.bxslider').bxSlider({
	        controls: true,
	        pager: false,
	        startSlide: 0,
	        randomStart: false,
	        infiniteLoop: true
	 });


});



