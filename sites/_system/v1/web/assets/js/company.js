var companyID = 0,
	companyStatus = 1,
	companyType = 0,
	companyPermission = 0,
	landingPageID = 0,
	formWidgetID = 0;

var LandingTable,
	FormTable;

var cropperLandingPageHeader,
	cropperFormWidgetHeader;

var companySites = [],
	companyForms = [];

// Company Handlers

var handleAddCompany = function() {
	$("#form-add-company").submit(function( event ) {
		event.preventDefault();
		companyCreate();	
	});   
};
var handleUpdateCompany = function() {
	$("#form-add-update").submit(function( event ) {
		event.preventDefault();
		companyUpdate();	
	});   
};
var handleCompanyStatus = function() {
	$('input[name="company-status-switch"]').on('switchChange.bootstrapSwitch', function(event, state) {
		if (state) {			
			checkCompany();
		} else {
			toggleCompanyStatus();
		}
	});
};

// Company Methods

function getCompany() {
	$.post('/api/company.get',{
			id: companyID
		},
		function(data) {
			//console.log(data);
			loadCompany(data);
		}
	);
}

function toggleCompanyStatus() {
	$.post('/api/company.status.set',{
			id: companyID
		},
		function(data) {
			//console.log(data);
			loadCompany(data);
		}
	);
}

function companyCreate() {
	$.post('/api/company.create',{
			name: $('#name').val(),
			description: $('#description').val(),
			lead_goal: $('#lead_goal').val()
		},
		function(data) {
			//console.log(data);
	    	json = JSON.parse(data);
	        var status = json.status;
	        var message = json.message;

	        if (status == "failed") {
				noty({
					text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-exclamation-triangle"></i></div><div class="col-md-11 text-left">' + message + '</div></div>',
					type: 'error',
					layout: 'center'
				});
	        } else {
	        	window.location.replace("/admin/companies/details?" + json.uuid);
	        }			
		}
	);
}

function companyUpdate() {
	$.post('/api/company.set',{
			id: companyID,
			name: $('#name').val(),
			description: $('#description').val(),
			lead_goal: $('#lead_goal').val()
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
					text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">Sweet, your company has been udpated.</div></div>',
					type: 'success',
					layout: 'center'
				});
	        }			
		}
	);
}

function deleteCompany() {
	$.post('/api/company.delete',{
			id: companyID
		},
		function(data) {
			//console.log(data);
			window.location.replace('/admin/companys');
		}
	);
}


function loadCompany(data) {
	json = JSON.parse(data);

	companyStatus = json.status,
	companyType = json.type,
	companyPermission = json.permissions,
	companySites = json.company_sites,
	companyForms = json.company_forms;

	// For HTML Elements  
	$('*[data-company="name"]').html(json.name);  	
	$('*[data-company="description"]').html(json.description);  
	$('*[data-company="start_date"]').html(json.start_date);  	
	$('*[data-company="end_date"]').html(json.end_date);  	
	$('*[data-company="lead_goal"]').html(json.lead_goal);  	
	$('*[data-company="lead_count"]').html(json.lead_count);  		
	$('*[data-company="status"]').html(json.status);  		

	// For Form Fields
	$('*[data-company-form="name"]').val(json.name);  	
	$('*[data-company-form="description"]').val(json.description);  
	$('*[data-company-form="lead_goal"]').val(json.lead_goal);  	

	loadCompanyStatus();	  
}

function loadCompanyStatus() {
	if (companyStatus == 3) {
		$("#company-status-bg").attr("src", "/images/blurred-bg/blurred-bg-13.jpg");
		$("#company-status-message").html("This company is currently active.");
		$('input[name="company-status-switch"]').bootstrapSwitch('state', true, true);
	} else {
		$("#company-status-bg").attr("src", "/images/blurred-bg/blurred-bg-9.jpg");
		$("#company-status-message").html("This company is not currently active.");
		$('input[name="company-status-switch"]').bootstrapSwitch('state', false, true);
	}
}

function initCompanyPhotos() {

    var cropperCompanyOptions = {
        uploadUrl:'/api/company.image.upload',
        uploadData:{
				"CompanyID": companyID
			},
        cropUrl:'/api/company.image.crop',
        cropData:{
				"CompanyID": companyID
			},
        onBeforeImgUpload: function(){ $('#form-company-image').css('background-image', 'none'); },
        doubleZoomControls:false,
        rotateControls:false     
    }       
    var cropperCompanyHeader = new Croppic('form-company-image', cropperCompanyOptions);
}


var Company = function () {
	"use strict";
    return {
        //main function
        init: function (page) {

			companyID = location.href.split("?")[1];
			
			if (page == 'details') {
				// Init Page Level Functions
				getCompany();				
			}
			
			initCompanyPhotos();			

			// Set Page Level JS Widgets
			$('.input-switch').bootstrapSwitch();
			$('.textarea-autosize').autosize();

			// Define Page Level Handlers
			handleAddCompany();
			handleUpdateCompany();
			handleCompanyStatus();
        }
    };
}();