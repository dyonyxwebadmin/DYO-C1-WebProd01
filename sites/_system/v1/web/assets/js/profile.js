var profileID = SESSION.id,
	profileType = "personal",
	profileURL = "";

// Profile Handlers

var handlePersonalInfo = function() {
	$("#form-personal-info").submit(function( event ) {
		event.preventDefault();
		setPersonalInfo();	
	});   
};
var handleChangePassword = function() {
	$("#form-change-password").submit(function( event ) {
		event.preventDefault();
		setPassword();	
	});   
};
var handleMailingAddress = function() {
	$("#form-mail-address").submit(function( event ) {
		event.preventDefault();
		setMailingAddress();	
	});   
};
var handleShowProfile = function() {
	if (profileType == "personal") { if (SESSION.id == profileID) {	$("#personal-profile").show() } }
	if (profileType == "other") { $("#public-profile").show() }
	if (profileType == "admin") { $("#personal-profile").show() }
};
var handleSocialLink = function() {
	$(".social-link").click(function( event ) {
		gotoSocial(this);
	});   
};

var handleUserAccessButton = function() {
	$(".user-access").click(function( event ) {
		event.preventDefault();
		doUserAccess(this);
	});   
}

var handleUserCreateButton = function() {
	$("#add-user-form").click(function( event ) {
		event.preventDefault();
		addUser();
	});   
}

// Admin Functions

function addUser() {

	$.post('/api/user.create.admin',{
			first_name: $("#user-first-name").val(),
			last_name: $("#user-last-name").val(),
			email: $("#user-email").val(),
			password: $("#user-password").html()
		},
		function(data) {
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
	        	window.location.href = "/admin/users/profile/" + json.id;
	        }			
		}
	);
}

function doUserAccess(elm) {
	var access = $(elm).data("user-access");

	$.post('/api/user.access.set',{
			id: profileID,
			access: access
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
				noty({
					text: 'You information has been saved.',
					type: 'success',
					layout: 'top'
				});
	        	loadProfile(data);
	        }			
		}
	);

}


// Profile Functions

function gotoSocial(elm) {
	var profile = $(elm).data("profile");
	var social = $(elm).data("social");

	switch(profile) {
    case "twitter":
        window.open('http://www.twitter.com/' + social, '_blank');
        break;
    case "facebook":
        window.open('https://www.facebook.com/app_scoped_user_id/' + social, '_blank');
        break;
    default:
		if (profileType == "personal") {
			notyText = "It looks like you need to link your " + profile + " account.  To do this, click on the 'Social Accounts' tab to the right.";
		} else {
			notyText = "It doesn't look like they have setup their " + profile + " account yet.  Maybe you should tease them about that.";
		}
	
		noty({
			text: notyText,
			type: 'warning',
			layout: 'center'
		});
        
}



}

function getProfile() {
	$.post('/api/user.get',{
			id: profileID
		},
		function(data) {
			loadProfile(data);
		}
	);
}

function setPersonalInfo() {
	$.post('/api/profile.personal.set',{
			id: profileID,
			first_name: $('#first_name').val(),
			last_name: $('#last_name').val(),
			email: $('#email').val(),
			phone: $('#phone').val()
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
				noty({
					text: 'You information has been saved.',
					type: 'success',
					layout: 'center'
				});
	        	loadProfile(data);
	        }			
		}
	);
}

function setMailingAddress() {
	$.post('/api/user.mailing.set',{
			id: profileID,
			address1: $("#address1").val(),
			address2: $("#address2").val(),
			city: $("#city").val(),
			state: $('select[name=state]').val(),
			zip: $("#zip").val()
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
				noty({
					text: 'Your mailing address has been successfuly updated.',
					type: 'success',
					layout: 'center'
				});
	        	loadProfile(data);
	        }			
		}
	);
}

function setPassword() {
	$.post('/api/admin.password.set',{
			id: profileID,
			old_password: $('#old_password').val(),
			password: $('#password').val()
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
				noty({
					text: 'Your password has been successfuly updated.',
					type: 'success',
					layout: 'center'
				});
				$('#old_password').val("");
				$('#password').val("");
				$('#confirm-password').val("");
	        	loadProfile(data);
	        }			
		}
	);
}

function loadProfile(data) {
	json = JSON.parse(data);

	// For HTML Elements  
	$('*[data-profile="fullname"]').html(json.fullname);  	
	$('*[data-profile="first_name"]').html(json.first_name);  
	$('*[data-profile="last_name"]').html(json.last_name);  	
	$('*[data-profile="email"]').html(json.email);  	
	$('*[data-profile="phone"]').html(json.phone);  	
	$('*[data-profile="address1"]').html(json.address1);  	
	$('*[data-profile="address2"]').html(json.address2);  	
	$('*[data-profile="city"]').html(json.city);  	
	$('*[data-profile="state"]').html(json.state);  	
	$('*[data-profile="zip"]').html(json.zip);  		
	$('*[data-profile="type_name"]').html(json.type_name);  		
	$('*[data-profile="member_since"]').html(json.added_on);  	
	$('*[data-profile="last_login"]').html(json.last_login);  	
	try {	
		$('*[data-profile="status"]').html(json.profile_status);  	
		$('*[data-profile="status_date"]').html(jQuery.timeago(json.profile_status_date));  	
	} catch (err) {}
	$('*[data-profile="image"]').attr('src', '/user/'+ json.id + '/profile');  		
		

	// For Form Fields
	$('*[data-profile-form="fullname"]').val(json.fullname);  	
	$('*[data-profile-form="first_name"]').val(json.first_name);  
	$('*[data-profile-form="last_name"]').val(json.last_name);  	
	$('*[data-profile-form="email"]').val(json.email);  	
	$('*[data-profile-form="phone"]').val(json.phone);  	
	$('*[data-profile-form="address1"]').val(json.address1);  	
	$('*[data-profile-form="address2"]').val(json.address2);  	
	$('*[data-profile-form="city"]').val(json.city);  	
	$('*[data-profile-form="state"]').val(json.state); 
	$('*[data-profile-form="zip"]').val(json.zip);  

	if (json.status == 1) {
		$("#user-access-approve").removeClass('hide');
	} else {
		$("#user-access-approve").addClass('hide');
	}

	if (json.type == 4) {
		$("#user-access-client").html('Remove Client Admin');
	} else {
		$("#user-access-client").html('Make Client Admin');
	}

	if (json.type == 5) {
		$("#user-access-admin").html('Remove System Admin');
	} else {
		$("#user-access-admin").html('Make System Admin');
	}

	loadSocial(data);
	loadTeam(data);
}

function loadSocial(data)
{
	$("#list-user-social").empty()
	var header = '<tr><th></th><th>Type</th><th>Username</th><th></th></tr>';
	$("#list-user-social").append(header);
	
	var json = $.parseJSON(data);
	
	var html = $.map(json.list_social, function (item, i) {
		$('*[data-profile="' + item.type + '"]').attr('data-social', item.account_id);  
		if (profileType == "personal") {		
			return '<tr><td class="col-md-1 text-center"><i class="glyph-icon icon-' + item.type + '"></i></td>\
						<td class="col-md-2">' + item.type + '</td>\
						<td><a href="javascript:;" data-profile="facebook" data-social="' + item.account_id + '" class="btn btn-link">' + item.namespace + '</a></td>\
						<td class="text-center col-md-1">\
							<a href="javascript:;" class="btn btn-xs btn-danger" onclick="DeleteProfile(\'' + item.id + '\');"><i class="glyph-icon icon-times"></i></a>\
						</td>\
					</tr>';	
		}
	}).join("");	
	$("#list-user-social").append(html);	
}

function loadTeam(data)
{
	$("#profile-team").empty()
	var json = $.parseJSON(data);	
	var html = $.map(json.list_users, function (item, i) {
		return '<div class="status-badge mrg10A">\
	                <a href="'+profileURL+'/'+item.id+'">\
	                	<img class="img-circle tooltip-button" data-toggle="tooltip" data-placement="top" title="' + item.fullname +'" width="40" src="/user/'+ item.id+'/profile" alt="">\
	                </a>\
	            </div>';	
		
	}).join("");	
	$("#profile-team").append(html);
	$('.tooltip-button').tooltip({
		container: 'body'
	});	
}


var Profile = function () {
	"use strict";
    return {
        //main function
        init: function () {

			var urlID = location.pathname.split("/");
			if (urlID[1] == "tools") {
				if (typeof urlID[3] != 'undefined' && urlID[3] != "") {
					profileID = urlID[3];
					profileType = "other";	
					profileURL = "/tools/profile";			
				}
			} else {
				if (typeof urlID[4] != 'undefined' && urlID[4] != "") {
					profileID = urlID[4];
					profileType = "admin";		
					profileURL = "/admin/users/profile";		
				}
			}

			getProfile();

			handlePersonalInfo();
			handleShowProfile();
			handleChangePassword();
			handleMailingAddress();
			handleSocialLink();
			handleUserAccessButton();

			handleUserCreateButton();
        }
    };
}();