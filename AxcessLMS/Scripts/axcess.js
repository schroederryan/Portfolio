$(document).ready(function () {
	var $window = $(window);

	$(".hamburger").click(function() {
  		$("nav").toggleClass("open");
	});
	$(window).on("scroll touchmove", function () {
		if ($window.width() > 1099) {
			$("header").toggleClass("small", $(document).scrollTop() > 0);
		}
	});

	$('nav a').click(function() {
		$('nav').toggleClass("open");
	});
});


function validateForm() {
	// The field is empty, submit the form.
	if(!document.getElementById("emailAddress").value) { 
		return true;
	} 
	 // the field has a value it's a spam bot
	else {
		return false;
	}
};

function PDFclicks(event) {
  ga('send', 'event', {
    eventCategory: 'PDF Click',
    eventAction: 'click',
    eventLabel: event.target.href
  });
}