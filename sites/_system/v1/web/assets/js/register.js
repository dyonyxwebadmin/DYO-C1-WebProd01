/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.8.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.8/member/
*/

var handleStep1 = function() {
	$("#Enroll-Step1").submit(function( event ) {
		event.preventDefault();
		ensrollStep1();
	});   
};

var handleStep2 = function() {
	$("#Enroll-Step2").submit(function( event ) {
		event.preventDefault();
		ensrollStep2()
		$('#tab-step-2').attr('class', 'disabled');
		$('#tab-step-3').removeClass('disabled');
		$('.form-wizard li:eq(2) a').tab('show');	
	});   
};

function ensrollStep1()
{		
	$.post('/api/user.register',{			
			step: 1,
			code: $("#code").val(),
			first_name: $("#first-name").val(),
			last_name: $("#last-name").val(),
			email: $("#email").val(),
			password: $("#password").val()
		},
		function(data) {
			//console.log(data);
	    	json = JSON.parse(data);
	        var status = json.status;
	        var message = json.message;

	        if (status == "failed") {
	        	$("#email").removeClass('parsley-success');		
	        	$('#form-group-email').attr('class', 'form-group has-error');
	        	$('#help-block-email').html(message);
	        } else if (status == "code-failed") {
	        	$("#code").removeClass('parsley-success');		
	        	$('#form-group-code').attr('class', 'form-group has-error');
				noty({
					text: message,
					type: 'error',
					layout: 'center'
				});

	        } else {				
	        	//clean up from error handling 
	        	$("#form-group-email").removeClass('has-error');		
	        	$('#help-block-email').html('');
	        	//moving on to next step
				$('#tab-step-1').attr('class', 'disabled');
				$('#tab-step-2').removeClass('disabled');		
				$('.form-wizard li:eq(1) a').tab('show');	
	        }
		}
	);
}

function ensrollStep2()
{		
	$.post('/api/user.register',{
			step: 2,
			phone: $("#phone").val(),
			address1: $("#address1").val(),
			address2: $("#address2").val(),
			city: $("#city").val(),
			state: $('select[name=state]').val(),
			zip: $("#zip").val()
		},
		function(data) {
			//registerComplete();
		}
	);
}



function registerComplete()
{		
	$.post('/api/user.register.complete',{
		},
		function(data) {
			//console.log(data);
		}
	);
}




var Register = function () {
	"use strict";
    return {
        //main function
        init: function () {
			handleStep1();
			handleStep2();
        }
    };
}();