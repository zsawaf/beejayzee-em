// class Form {
// 	constructor() {
// 		$(".honeypot").hide();

// 		this.validate_form();
// 		this.float_labels();
// 		this.error = false;
// 	}

// 	validate_form() {
// 		$("input.submit_form").on("click", function(e){
// 			e.preventDefault();

// 			var _this = this;
// 			this.error = false;

// 			// reset error fields
// 			$('.form__field').removeClass('field--error');

// 			// select form
// 			var $form = $(this).parents('form');
// 			var form_json = {}; // start json data

// 			$.each($form.children('.form__field'), function(index, val) {

// 				var is_required = $(val).hasClass('required');
// 				var input = $(val).children('input');
// 				if (is_required) {
// 					// check that all inputs are not empty
// 					if (input.val().length == 0) {
// 						$(val).addClass('field--error');
// 						_this.error = true;
// 					}

// 					// email regex
// 					if (input.attr('type') == 'email') {
// 						var email = input.val();
// 						var pattern = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
// 						var res = pattern.test(email);
// 						if (!res) {
// 							$(val).addClass('field--error');
// 							_this.error = true;
// 						}
// 					}
// 				}
				
// 				form_json[input.attr('name')] = input.val();
// 			});

// 			if (!_this.error) {
// 				$.ajax({
// 					url: ASSETS["ajaxurl"],
// 					method: 'POST',
// 					data: {
// 						'form_data': form_json, 
// 						'action': 'post_form',
// 						'security': ASSETS['ajax_nonce']
// 					},
// 					success: function(res) {
// 						if (res == "200") {
// 							$(".form__wrapper").addClass("form--success");
// 							$(".form").fadeOut(300, function(){
// 								$(".form__response").html("<h4>Thank you</h4>");
// 							});
							
// 						}
						
// 					}
// 				});
// 			}

// 		});
// 	}

// 	consoleAThing() {
// 		 console.log('whooooa');
// 	}

// 	float_labels() {
// 		$(document).on("focusin", ".form__field", function(e){
// 			$(this).addClass('float--label');
// 		});

// 		$(document).on("focusout", ".form__field", function(e){
// 			var input = $(this).children('input');
// 			if (input.val().length == 0) {
// 				$(this).removeClass('float--label');
// 			}
// 		});
// 	}
// }


// module.exports = Form;