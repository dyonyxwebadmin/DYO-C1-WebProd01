/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.8.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.8/member/
*/

debug = null;

var handleLogin = function() {
	$("#login-form").submit(function( event ) {
		event.preventDefault();
		login();	
	});   
};

function login()
{	
	$.post('/api/user.login',{
			login: $("#login").val(),
			password: $("#password").val()
		},
		function(data) {
			//console.log(data);
	    	json = JSON.parse(data);
	        var status = json.status;
	        var message = json.message;
	        if (status == "failed") {
		          var n = noty({
		              text: message,
		              type: 'error',
		              dismissQueue: true,
		              theme: 'agileUI',
		              layout: 'center'
		          });
	        } else {	
	        	window.location.href = "/dashboard/tools";
	        }
		}
	);
}


var Login = function () {
	"use strict";
    return {
        //main function
        init: function () {
			handleLogin();
        }
    };
}();