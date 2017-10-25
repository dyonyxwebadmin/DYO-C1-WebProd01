
var handleEditMode = function() {
	$("#edit-mode-toggle").click(function( event ) {
		event.preventDefault();
		toggleEditMode();
	});   
};

var handleChangeTempPassword = function() {
	$("#user-password-reset").click(function( event ) {
		event.preventDefault();
		userChangeTempPassword();
	});   
};

function userChangeTempPassword() {
	$.post('/api/user.password.set',{
			id: SESSION.id,
			old_password: $('#user-current-password').val(),
			password: $('#user-new-password').val()
		},
		function(data) {
			//console.log(data);
	    	json = JSON.parse(data);
	        var status = json.status;
	        var message = json.message;

	        if (status == "failed") {
				noty({
					text: message,
					type: 'error',
					layout: 'center'
				});
	        } else {
	        	location.reload();
	        }			
		}
	);
}

function toggleEditMode()
{		
	$.post('/api/admin.edit.mode',{
		},
		function(data) {
			//console.log(data);
	    	json = JSON.parse(data);
	        var status = json.status;
	        var message = json.message;
	        location.reload();
		}
	);
}


function checkStatus() {
	if (typeof SESSION != 'undefined') {
		if (SESSION.status == "2") {
			//console.log("status = " + SESSION.status);
			$('#userPasswordReset').modal({
			  backdrop: 'static',
			  keyboard: true,
			  show: true
			});
		}

	}
}



var App = function () {
	"use strict";
    return {
        //main function
        init: function () {
			handleEditMode();
			checkStatus();

			handleChangeTempPassword();
        }
    };
}();