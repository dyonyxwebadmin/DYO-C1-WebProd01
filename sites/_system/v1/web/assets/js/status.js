var profileStatus = "";

function setProfileStatus() {
	profileStatus = $('#profile-status-update').val();

	$.post('/api/profile.status.set',{
			id: profileID,
			profile_status: profileStatus
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
	        	loadProfileStatus(data);
	        }			
		}
	);
}

function loadProfileStatus(data) {
	json = JSON.parse(data);
	// For HTML Elements  
	$('*[data-profile="status"]').html(json.profile_status);
	$('*[data-profile="status_date"]').html("Just Now.");
}


var ProfileStatus = function () {
	"use strict";
    return {
        //main function
        init: function () {
        }
    };
}();