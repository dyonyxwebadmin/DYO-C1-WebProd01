var invite_code = null,
	add_code = 0;

var table = null;

var handleInviteFormSubmit = function() {
	$("#invite-form-submit").click(function( event ) {
		event.preventDefault();
		formSubmit();	
	});   
};

var handleInviteAddButton = function() {
	$("#add-invite-code-button").click(function( event ) {
		event.preventDefault();
		add_code = 1;
		$("#invite-form").removeClass("hide");
		$("#invite-code").addClass("hide");
		$("#invite-form-delete").addClass("hide");
		$("#invite-modal").modal('toggle');
	});   
};

var handleInviteFormDelete = function() {
	$("#invite-form-delete").click(function( event ) {
		event.preventDefault();
		deleteInvite();	
	});   
};

function formSubmit() {
	if (add_code == 1) {
		$.post('/api/invites/invite.create',{
				name: $('#invite-name').val(),
				limit: $('#invite-limit').val()
			},
			function(data) {
				//console.log(data);
		    	json = JSON.parse(data);

		    	table.ajax.reload();

		    	viewInvite(json);
		    	add_code = 0;
			}
		);		
	} else {
		$.post('/api/invites/invite.update',{
				code: $('#invite-code-view').html(),
				name: $('#invite-name-edit').val(),
				limit: $('#invite-limit-edit').val()
			},
			function(data) {
				//console.log(data);
		    	json = JSON.parse(data);

		    	table.ajax.reload();

				$("#invite-modal").modal('toggle');
		    	add_code = 0;
			}
		);		
	}
}

function deleteInvite() {

	$.post('/api/invites/invite.delete',{
			code: invite_code
		},
		function(data) {
			//console.log(data);
	    	json = JSON.parse(data);


	    	table.ajax.reload();

			$("#invite-modal").modal('toggle');
		}
	);

}

function viewInvite(json) {
	//console.log(json);
	invite_code = json.code;

	$("#invite-form").addClass("hide");
	$("#invite-code").removeClass("hide");
	$("#invite-form-delete").removeClass("hide");
	
	$("#invite-code-view").html(json.code);
	$('#invite-name-edit').val(json.name);
	$('#invite-limit-edit').val(json.user_limit);
	$('#invite-count-edit').val(json.count);
	$('#invite-url-edit').html(window.location.origin + '/register?' + json.code);

	$("#invite-modal").modal('show');
}

function listInvite() {
            
	table = $('#datatable-invites').DataTable( {
	    "ajax": {
	        "url": "/api/invites/invite.list",
	        "dataSrc": ""
	    },
	    "columns": [
	        { "title": "Code", "data": "code", "className":"link" },
	        { "title": "Description", "data": "name", "className":"link" },
	        { "title": "Limit", "data": "user_limit", "className":"link" },
	        { "title": "Count", "data": "count", "className":"link" },
	        { "title": "Created By", "data": "fullname", "className":"link" },
	        { "title": "Created On", "data": "start_date", "className":"link" }
	    ]
	} );
	var tt = new $.fn.dataTable.TableTools( table );


	$('.dataTables_filter input').attr("placeholder", "Search...");


	$('#datatable-invites tbody').on('click', 'tr', function () {
        var data = JSON.parse(JSON.stringify(table.row( this ).data()));
        viewInvite(data);
    });



}

var Invite = function () {
	"use strict";
    return {
        //main function
        init: function () {
        	//getSection();

        	listInvite();

        	handleInviteFormSubmit();
        	handleInviteAddButton();
        	handleInviteFormDelete();
        }
    };
}();