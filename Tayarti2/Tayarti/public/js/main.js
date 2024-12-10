(function($) {

	"use strict";

	// Form
	var contactForm = function() {
		if ($('#contactForm').length > 0 ) {
			$( "#contactForm" ).validate( {
				rules: {
					name: "required",
					subject: "required",
					email: {
						required: true,
						email: true
					},
					message: {
						required: true,
						minlength: 5
					}
				},
				messages: {
					name: "Please enter your name",
					subject: "Please enter your subject",
					email: "Please enter a valid email address",
					message: "Please enter a message"
				},
				/* submit via ajax */
				submitHandler: function(form) {		
					var $submit = $('.submitting'),
						waitText = 'Submitting...';

					// Simulate successful form submission
					setTimeout(function() {
						$('#form-message-success').text("Your message has been sent. Thank you for contacting us!").fadeIn();
						$submit.css('display', 'none');
						$( '#contactForm' ).each(function(){
						    this.reset();
						});
					}, 1000);
				}
			});
		}
	};
	contactForm();

})(jQuery);
