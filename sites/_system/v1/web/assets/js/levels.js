var level_id = null,
	add_level = 0,
	min_range = 0,
	max_range = 0;

var table = null;

var levelsJSON = null;

var handleInviteFormSubmit = function() {
	$("#level-form-submit").click(function( event ) {
		event.preventDefault();
		formSubmit();	
	});   
};

var handleLevelAddButon = function() {
	$("#add-level-button").click(function( event ) {
		event.preventDefault();
		add_level = 1;
		$("#level-form").removeClass("hide");
		$("#level-code").addClass("hide");
		$("#level-form-delete").addClass("hide");

		$('#level-level').val("");
		$('#level-name').val("");
		$('#level-text').val("");

		$("#level-modal").modal('toggle');
	});   
};

var handleLevelFormDelete = function() {
	$("#level-form-delete").click(function( event ) {
		event.preventDefault();
		deleteLevel();	
	});   
};

function formSubmit() {
	if (add_level == 1) {
		$.post('/api/levels/levels.create',{
				level: $('#level-level').val(),
				name: $('#level-name').val(),
				text: $('#level-text').val(),
				min_range: min_range,
				max_range: max_range
			},
			function(data) {
				//console.log(data);
		    	json = JSON.parse(data);

		    	table.ajax.reload();

				$("#level-modal").modal('toggle');
		    	add_level = 0;
			}
		);		
	} else {
		$.post('/api/levels/levels.update',{
				id: level_id,
				name: $('#level-name-edit').val(),
				text: $('#level-text-edit').val(),
				min_range: min_range,
				max_range: max_range
			},
			function(data) {
				//console.log(data);
		    	json = JSON.parse(data);

		    	table.ajax.reload();

				$("#level-modal").modal('toggle');
		    	add_level = 0;
			}
		);		
	}
}

function deleteLevel() {

	$.post('/api/levels/levels.delete',{
			id: level_id
		},
		function(data) {
			//console.log(data);
	    	json = JSON.parse(data);


	    	table.ajax.reload();

			$("#level-modal").modal('toggle');
		}
	);

}

function viewLevel(json) {
	//console.log(json);
	level_id = json.id;

	$("#level-form").addClass("hide");
	$("#level-code").removeClass("hide");
	$("#level-form-delete").removeClass("hide");
	
	$("#level-level-view").html(json.level);
	$('#level-name-edit').val(json.name);
	$('#level-text-edit').val(json.text);

	try {
		$("#level-range-slider-edit").slider( "destroy" );
	} catch(e) {

	}		
	
	$("#level-range-slider-edit").slider({
	range: true,
	min: 0,
	max: 100,
	values: [json.min_range, json.max_range],
	slide: function(event, ui) {
		min_range = ui.values[0];
		max_range = ui.values[1];
		$("#level-range-edit").val(ui.values[0] + "% - " + ui.values[1] + "%");
	}
	});
	$("#level-range-edit").val(json.min_range + "% - " + json.max_range + "%");
	min_range = json.min_range;
	max_range = json.max_range;

	$("#level-modal").modal('show');
}

function listLevels() {
            
	table = $('#datatable-levels').DataTable( {
	    "ajax": {
	        "url": "/api/levels/levels.list",
	        "dataSrc": ""
	    },
	    "columns": [
	        { "title": "Level", "data": "level", "className":"link" },
	        { "title": "Name", "data": "name", "className":"link" },
	        { "title": "Range", "data": "range_text", "className":"link" },
	        { "title": "Description", "data": "text", "className":"link" },
	        { "title": "Created By", "data": "fullname", "className":"link" },
	        { "title": "Created On", "data": "start_date", "className":"link" }
	    ]
	} );
	var tt = new $.fn.dataTable.TableTools( table );


	$('.dataTables_filter input').attr("placeholder", "Search...");


	$('#datatable-levels tbody').on('click', 'tr', function () {
        var data = JSON.parse(JSON.stringify(table.row( this ).data()));
        viewLevel(data);
    });
}

function getLevels() {

	$.post('/api/levels/levels.list',{
		},
		function(data) {
			//console.log(data);
	    	levelsJSON = JSON.parse(data);
	    	return levelsJSON;
		}
	);
}

function showLevels(name) {

	$.post('/api/levels/levels.list',{
		},
		function(data) {
			//console.log(data);
	    	levelsJSON = JSON.parse(data);

			// Finding All First Level questions
			var levels = $.map(levelsJSON, function (item, i) {

				level = '<div class="panel-layout row">\
				            <div class="panel-box col-xs-4 bg-blue">\
				                <div class="panel-content">\
				                    <h1 class="assessement-level-explained">' + item.level + '</h1>\
				                    <h5 class="opacity-60">Assessment Level</h5>\
				                </div>\
				            </div>\
				            <div class="panel-box col-xs-8">\
				                <div class="panel-content text-left bg-black">\
				                    <h3>' + item.name + '</h3>\
				                </div>\
				                <div class="panel-content bg-white">\
				                    <div class="center-vertical text-left">' + item.text + '</div>\
				                </div>\
				            </div>\
				        </div>';

		        return level;
			}).join("");	   
			$("#" + name).html(levels)
		}
	);


}

var Levels = function () {
	"use strict";
    return {
        //main function
        init: function () {
        	//getSection();

        	listLevels();

        	handleInviteFormSubmit();
        	handleLevelAddButon();
        	handleLevelFormDelete();
        }
    };
}();