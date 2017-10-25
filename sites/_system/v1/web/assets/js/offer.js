var offerID = 0,
	companyID = 0,
	companyName = '',
	offerStatus = 1,
	offerType = 0,
	offerPermission = 0,
	landingPageID = 0,
	formWidgetID = 0;

var LandingTable,
	FormTable;

var cropperLandingPageHeader,
	cropperFormWidgetHeader;

var offerSites = [],
	offerForms = [];

// Offer Handlers

var handleAddOffer = function() {
	$("#form-add-offer").submit(function( event ) {
		event.preventDefault();
		checkCompany();	
	});   
};
var handleUpdateOffer = function() {
	$("#form-add-update").submit(function( event ) {
		event.preventDefault();
		offerUpdate();	
	});   
};
var handleOfferType = function() {
	$(".offer-type").click(function( event ) {
		offerTypeButtons(this);
	});   
};
var handleOfferStatus = function() {
	$('input[name="offer-status-switch"]').on('switchChange.bootstrapSwitch', function(event, state) {
		if (state) {			
			checkOffer();
		} else {
			toggleOfferStatus();
		}
	});
};
var handleLandingPageForm = function() {
	$("#landing-page-add").click(function( event ) {
		event.preventDefault();
		showLandingPageForm();
	});   
};
var handleLandingPageCancel = function() {
	$("#cancel-landing-page-form").click(function( event ) {
		showLandingPageList();
	});   
};
var handleFormLandingPageSubmit = function() {
	$("#form-landing-page").submit(function( event ) {
		event.preventDefault();
		setLandingPage();	
	});   
};
var handleFormWidgetForm = function() {
	$("#form-widget-add").click(function( event ) {
		showFormWidgetForm();
	});   
};
var handleFormWidgetCancel = function() {
	$("#cancel-form-widget-form").click(function( event ) {
		showWidgetFormList();
	});   
};
var handleFormFormWidgetSubmit = function() {
	$("#form-form-widget").submit(function( event ) {
		event.preventDefault();
		setFormWidget();	
	});   
};
var handleOfferDelete = function() {
	$("#offer-delete").click(function( event ) {
		deleteOffer(this);
	});   
};
var handleLandingPageReturn = function() {
	$("#landing-page-return").click(function( event ) {
		showLandingPageList(this);
	});   
};
var handleLandingPageDelete = function() {
	$("#landing-page-delete").click(function( event ) {
		deleteLandingPage(this);
	});   
};
var handleFormWidgetReturn = function() {
	$("#form-widget-return").click(function( event ) {
		showWidgetFormList(this);
	});   
};
var handleFormWidgetDelete = function() {
	$("#form-widget-delete").click(function( event ) {
		deleteFormWidget(this);
	});   
};

// Offer Functions

function showLandingPageForm() {
	if (landingPageID == 0) {
		$('#landing-page-image-box').attr("class", "content-box mrg15B disabled");
	}	
	$('#form-landing-page').parsley().reset();
	$('#landing-page-add').hide();
	$('#landing-page-delete').show();
	$('#landing-page-return').show();
	$("#section-list-landing-pages").hide();
	$("#section-form-landing-page").show();
	$("#landing-page-image-row").show();
}

function showLandingPageList() {
	landingPageID = 0;
	if (cropperLandingPageHeader) { cropperLandingPageHeader.destroy(); }			
	$('#landing-page-name').val("");
	$('#landing-page-description').val("");
	$('#landing-page-template').val("");
	$('#landing-page-image').css("background-image", "url('/images/placeholder.jpg')");	
	$('#form-landing-page').parsley('reset');
	$('#landing-page-delete').hide();
	$('#landing-page-return').hide();
	$('#landing-page-add').show();
	$("#section-form-landing-page").hide();
	$("#landing-page-image-row").hide();
	$("#section-list-landing-pages").show();
}

function showFormWidgetForm() {
	if (formWidgetID == 0) {
		$('#form-widget-image-box').attr("class", "content-box mrg15B disabled");
	}
	$('#form-form-widget').parsley().reset();
	$('#form-widget-add').hide();
	$('#form-widget-delete').show();
	$('#form-widget-return').show();
	$("#section-list-form-widget").hide();
	$("#section-form-form-widget").show();
	$("#form-widget-image-row").show();
}

function showWidgetFormList() {
	formWidgetID = 0;
	cropperFormWidgetHeader.destroy();
	$('#form-widget-name').val("");
	$('#form-widget-description').val("");
	$('#form-widget-template').val("");
	$('#form-widget-image').css("background-image", "url('/images/placeholder.jpg')");	
	$('#form-form-widget').parsley('reset');
	$('#form-widget-delete').hide();
	$('#form-widget-return').hide();
	$('#form-widget-add').show();
	$("#section-form-form-widget").hide();
	$("#form-widget-image-row").hide();
	$("#section-list-form-widget").show();
}

function offerTypeButtons(obj) {
	$(".offer-type").attr("class", "offer-type list-group-item  hover-blue");
	$(obj).attr("class", "offer-type list-group-item hover-blue bg-blue");
}

function checkOffer() {
	if (offerType == 0) {
		loadOfferStatus();
		noty({
			text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-exclamation-triangle"></i></div><div class="col-md-11 text-left">You have not yet set an offer type.  Please click on the permissions tab select an option there.</div></div>',
			type: 'warning',
			layout: 'center'
		});
		return;
	} 
	if (offerPermission == "") {
		loadOfferStatus();
		noty({
			text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-exclamation-triangle"></i></div><div class="col-md-11 text-left">You have not set any permissions for this offer.  Please click on the permissions tab set permissions for this offer.</div></div>',
			type: 'warning',
			layout: 'center'
		});
		return;
	} 
	if (offerSites.length == 0) {
		loadOfferStatus();
		noty({
			text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-exclamation-triangle"></i></div><div class="col-md-11 text-left">It appears you have not yet added any landing pages to this offer.  Please click on the landing pages tab and follow the instructions.</div></div>',
			type: 'warning',
			layout: 'center'
		});
		return;
	}  
	if (offerForms.length == 0) {
		loadOfferStatus();
		noty({
			text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-exclamation-triangle"></i></div><div class="col-md-11 text-left">It appears you have not yet added any form widgets to this offer.  Please click on the form widgets tab and follow the instructions.</div></div>',
			type: 'warning',
			layout: 'center'
		});
		return;
	} 
	toggleOfferStatus();
}

function getOffer() {
	$.post('/api/offer.get',{
			id: offerID
		},
		function(data) {
			//console.log(data);
			loadOffer(data);
		}
	);
}

function toggleOfferStatus() {
	$.post('/api/offer.status.set',{
			id: offerID
		},
		function(data) {
			//console.log(data);
			loadOffer(data);
		}
	);
}

function checkCompany() {
	$.post('/api/company.name.check',{
			name: $('#company-name').val()
		},
		function(data) {
			//console.log(data);
	    	json = JSON.parse(data);
	        companyID = json.id;
	        companyName = json.name;

	        if (companyID) {
	        	offerCreate()
	        } else {
				noty({
					text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-exclamation-triangle"></i></div><div class="col-md-11 text-left">The company you entered does not excist in our system.  Please <a href="/admin/companies/add" class="alert-link">click here</a> to add a new company and then setup the offer.</div></div>',
					type: 'warning',
					layout: 'center'
				});
	        }			
		}
	);
	//offerCreate();
}
	
function offerCreate() {

	$.post('/api/offer.create',{
			name: $('#name').val(),
			company_id: companyID,
			description: $('#description').val(),
			lead_goal: $('#lead_goal').val(),
			price: $('#price').val(),
			commission: $('#commission').val()
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
	        	window.location.replace("/admin/offers/details?" + json.uuid);
	        }			
		}
	);
}

function offerUpdate() {
	$.post('/api/offer.set',{
			id: offerID,
			name: $('#name').val(),
			description: $('#description').val(),
			lead_goal: $('#lead_goal').val(),
			price: $('#price').val(),
			commission: $('#commission').val()
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
					text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">Sweet, your offer has been udpated.</div></div>',
					type: 'success',
					layout: 'center'
				});
	        }			
		}
	);
}

function deleteOffer() {
	$.post('/api/offer.delete',{
			id: offerID
		},
		function(data) {
			//console.log(data);
			window.location.replace('/admin/offers');
		}
	);
}


function loadOffer(data) {
	json = JSON.parse(data);

	offerStatus = json.status,
	offerType = json.type,
	offerPermission = json.permissions,
	offerSites = json.offer_sites,
	offerForms = json.offer_forms;

	// For HTML Elements  
	$('*[data-offer="name"]').html(json.name);  	
	$('*[data-offer="company_name"]').html(json.company_name);  	
	$('*[data-offer="description"]').html(json.description);  
	$('*[data-offer="start_date"]').html(json.start_date);  	
	$('*[data-offer="end_date"]').html(json.end_date);  	
	$('*[data-offer="lead_goal"]').html(json.lead_goal);  	
	$('*[data-offer="lead_count"]').html(json.lead_count);  	
	$('*[data-offer="permissions"]').html(json.permissions);  	
	$('*[data-offer="permissions_name"]').html(json.permissions_name);  	
	$('*[data-offer="type"]').html(json.type);  	
	$('*[data-offer="type_name"]').html(json.type_name);  		
	$('*[data-offer="status"]').html(json.status);  	
	$('*[data-offer="price"]').html(json.price);  	
	$('*[data-offer="commission"]').html(json.commission);  		  
	$('*[data-offer="image"]').attr('src', '/offer/'+ json.uuid + '/image');  		
	$('#form-offer-image').css("background-image", "url('/files/offers/" + offerID + "/thumb.jpg')");					

	// For Form Fields
	$('*[data-offer-form="name"]').val(json.name);  	
	$('*[data-offer-form="company_name"]').val(json.company_name);  	
	$('*[data-offer-form="description"]').val(json.description);  
	$('*[data-offer-form="lead_goal"]').val(json.lead_goal);  	
	$('*[data-offer-form="permissions"]').val(json.permissions);
	$('*[data-offer-form="type"]').val(json.type);  	 	
	$('*[data-offer-form="price"]').val(json.price);  	
	$('*[data-offer-form="commission"]').val(json.commission);  	

	loadOfferStatus();	  
	loadOfferType();
	loadOfferPermissions();
}

function loadOfferStatus() {
	if (offerStatus == 3) {
		$("#offer-status-bg").attr("src", "/images/blurred-bg/blurred-bg-13.jpg");
		$("#offer-status-message").html("This offer is currently active.");
		$('input[name="offer-status-switch"]').bootstrapSwitch('state', true, true);
	} else {
		$("#offer-status-bg").attr("src", "/images/blurred-bg/blurred-bg-9.jpg");
		$("#offer-status-message").html("This offer is not currently active.");
		$('input[name="offer-status-switch"]').bootstrapSwitch('state', false, true);
	}
}

function loadOfferType() {

	  $("#offer-type")
    
        .slider({
            min: 0,
            max: 3,
            value: offerType,
        	step: 1,
        	change: function( event, ui ) {
        		setOfferType(ui.value)
        	}      
        })    
        .slider("pips", {        	
        	rest: 'label', 
			labels: ['Not Set', 'Open', 'Enroll', 'Invite']         
        });
}

function setOfferType(value) {
	offerType = value;
	$.post('/api/offer.type.set',{
			id: offerID,
			type: value
		},
		function(data) {
			//console.log(data);
		}
	);
}

function setLandingPage() {
	
	var api = "/api/site.set";
	if (landingPageID == 0) {
		api = "/api/site.create";
	}

	$.post(api,{
			id: landingPageID,
			offer_id: offerID,
			name: $('#landing-page-name').val(),
			description: $('#landing-page-description').val(),
			template: $('#landing-page-template').val()
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
	        	message = "Your landing page information has been saved.  Make sure you add an image, it really helps the whole process!";
				noty({
					text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-exclamation-triangle"></i></div><div class="col-md-11 text-left">' + message + '</div></div>',
					type: 'success',
					layout: 'center'
				});
				LandingTable.ajax.reload();
				landingPageID = json.uuid;
				//console.log("landingPageID = " + landingPageID);
				initLandingPhoto();
	        	$('#landing-page-image-box').attr("class", "content-box mrg15B");
	        }		
		}
	);
}

function deleteLandingPage() {
	$.post('/api/site.delete',{
			id: landingPageID
		},
		function(data) {
			//console.log(data);
			LandingTable.ajax.reload();
			showLandingPageList();
		}
	);
}

function deleteFormWidget() {
	$.post('/api/form.delete',{
			id: formWidgetID
		},
		function(data) {
			//console.log(data);
			FormTable.ajax.reload();
			showWidgetFormList();
		}
	);
	
}

function setFormWidget() {
	
	var api = "/api/form.set";
	if (formWidgetID == 0) {
		api = "/api/form.create";
	}

	$.post(api,{
			id: landingPageID,
			offer_id: offerID,
			name: $('#form-widget-name').val(),
			description: $('#form-widget-description').val(),
			template: $('#form-widget-template').val()
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
	        	message = "Your Form Widget information has been saved.  Make sure you add an image, it helps to make this look really good!";
				noty({
					text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-exclamation-triangle"></i></div><div class="col-md-11 text-left">' + message + '</div></div>',
					type: 'success',
					layout: 'center'
				});	    
				FormTable.ajax.reload();
				formWidgetID = json.uuid;
				initFormPhoto();
				$('#form-widget-image-box').attr("class", "content-box mrg15B");	        }		
		}
	);
}

function loadOfferPermissions() {

	  $("#offer-permissions")
    
        .slider({
            min: 0,
            max: 7,
            value: offerPermission,
        	step: 1,
        	change: function( event, ui ) {
        		setOfferPermissions(ui.value)
        	}      
        })    
        .slider("pips", {        	
        	rest: 'label', 
			labels: ['Not Set', 'All', 'Directors', 'Executive Director', 'Vice Presidents', 'Presidents', 'Officers', 'CEO']         
        });
}

function setOfferPermissions(value) {
	offerPermission = value;
	$.post('/api/offer.permissions.set',{
			id: offerID,
			permissions: value
		},
		function(data) {
			//console.log(data);
		}
	);
}

function initOfferPhotos() {

    var cropperOfferOptions = {
        uploadUrl:'/api/offer.image.upload',
        uploadData:{
				"OfferID": offerID
			},
        cropUrl:'/api/offer.image.crop',
        cropData:{
				"OfferID": offerID
			},
        onBeforeImgUpload: function(){ $('#form-offer-image').css('background-image', 'none'); },
        doubleZoomControls:false,
        rotateControls:false     
    }       
    var cropperOfferHeader = new Croppic('form-offer-image', cropperOfferOptions);
}

function initLandingPages() {

    LandingTable = $('#datatable-landing-pages').DataTable( {
        "ajax": {
            "url": "/api/sites.list",
	         "type": "POST",
	         "data" : {
	            "offer_id" : offerID 
	        },
            "dataSrc": ""
        },
        "columns": [
            { "title": "Name", "data": "name", "className":"link" },
            { "title": "Description", "data": "description", "className":"link" },
            { "title": "Template", "data": "template", "className":"link" }
        ]
    } );
    var tt = new $.fn.dataTable.TableTools(LandingTable);


    $('.dataTables_filter input').attr("placeholder", "Search...");


    $('#datatable-landing-pages tbody').on('click', 'tr', function () {
            var data = LandingTable.row( this ).data();
            loadLandingPage(data);
        });
}

function loadLandingPage(data) {
	landingPageID = data['id'];
	$('#landing-page-name').val(data['name']);
	$('#landing-page-description').val(data['description']);
	$('#landing-page-template').val(data['template']);	
	$('#landing-page-image').css("background-image", "url('/files/sites/" + landingPageID + "/thumb.jpg')");	
	$('#landing-page-image-box').attr("class", "content-box mrg15B");	    
	initLandingPhoto();
	showLandingPageForm();
}

function initLandingPhoto() {
    var cropperLandingPageOptions = {
        uploadUrl:'/api/site.image.upload',
        uploadData:{
				"SiteID": landingPageID
			},
        cropUrl:'/api/site.image.crop',
        cropData:{
				"SiteID": landingPageID
			},
        onBeforeImgUpload: function(){ $('#landing-page-image').css('background-image', 'none'); },
        doubleZoomControls:false,
        rotateControls:false     
    }       
    cropperLandingPageHeader = new Croppic('landing-page-image', cropperLandingPageOptions);
}

function initFormWidgets() {
    FormTable = $('#datatable-form-widgets').DataTable( {
        "ajax": {
            "url": "/api/forms.list",
	         "type": "POST",
	         "data" : {
	            "OfferID" : offerID 
	        },
            "dataSrc": ""
        },
        "columns": [
            { "title": "Name", "data": "name", "className":"link" },
            { "title": "Description", "data": "description", "className":"link" },
            { "title": "Template", "data": "template", "className":"link" }
        ]
    } );
    var tt = new $.fn.dataTable.TableTools(FormTable);


    $('.dataTables_filter input').attr("placeholder", "Search...");


    $('#datatable-form-widgets tbody').on('click', 'tr', function () {
            var data = FormTable.row( this ).data();
            loadFormWidgets(data);
        });
}

function loadFormWidgets(data) {
	formWidgetID = data['id'];
	$('#form-widget-name').val(data['name']);
	$('#form-widget-description').val(data['description']);
	$('#form-widget-template').val(data['template']);	
	$('#form-widget-image').css("background-image", "url('/files/forms/" + formWidgetID + "/thumb.jpg')");	
	$('#form-widget-image-box').attr("class", "content-box mrg15B");	    
	initFormPhoto();
	showFormWidgetForm();
}
function initFormPhoto() {

    var cropperFormWidgetOptions = {
        uploadUrl:'/api/form.image.upload',
        uploadData:{
				"FormID": formWidgetID
			},
        cropUrl:'/api/form.image.crop',
        cropData:{
				"FormID": formWidgetID
			},
        onBeforeImgUpload: function(){ $('#form-widget-image').css('background-image', 'none'); },
        doubleZoomControls:false,
        rotateControls:false     
    }       
    cropperFormWidgetHeader = new Croppic('form-widget-image', cropperFormWidgetOptions);
}

function initCompanyNameAutoComplete() {

	$.post('/api/company.list.names',{
		},
		function(data) {
			json = JSON.parse(data);
			$(".autocomplete-company-name").autocomplete({
		        source: json
		    });
		}
	);
	
}

var Offer = function () {
	"use strict";
    return {
        //main function
        init: function (page) {

			offerID = location.href.split("?")[1];
			
			if (page == 'details') {
				// Init Page Level Functions
				getOffer();
				initLandingPages();
				initFormWidgets();					
			} else {
			    initCompanyNameAutoComplete();
			}
			
			initOfferPhotos();			

			// Set Page Level JS Widgets
			$('.input-switch').bootstrapSwitch();
			$('.textarea-autosize').autosize();

			// Define Page Level Handlers
			handleAddOffer();
			handleUpdateOffer();
			handleOfferStatus();
			handleOfferType();
			handleLandingPageForm();
			handleFormWidgetForm();
			handleLandingPageCancel();
			handleFormWidgetCancel();
			handleFormLandingPageSubmit();
			handleFormFormWidgetSubmit();
			handleOfferDelete();
			handleLandingPageReturn();
			handleLandingPageDelete();
			handleFormWidgetReturn();
			handleFormWidgetDelete();
        }
    };
}();