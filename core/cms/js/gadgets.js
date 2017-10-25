// JavaScript Document

function addGadget(gadget) {
	
	var path = document.URL.replace("http://", "").replace("https://", "").replace(document.domain, "").replace("#", "");
		
	$.post('/core/cms/gadget.php',{
			path: path,
			gadget: gadget,
			action: "add"
		},
		function(data) {
			location.reload();
		}
	);	
}

function deleteGadget(id) {

	var path = document.URL.replace("http://", "").replace("https://", "").replace(document.domain, "").replace("#", "");

	$.post('/core/cms/gadget.php',{
			path: path,
			id: id,
			action: "delete"
		},
		function(data) {
			location.reload();
		}
	);	
}

$(document).ready(function() {
	var order = null;
	$("#gadgets").sortable({
		handle: ".sort-handle",
		update : function (e, ui) {
			var path = document.URL.replace("http://", "").replace("https://", "").replace(document.domain, "").replace("#", "");
            var order = $(this).sortable('toArray', {attribute: 'id'});
			$.post('/core/cms/gadget.php',{
					path: path,
					order: JSON.stringify(order),
					action: "sort"
				},
				function(data) {
				}
			);	
	    }
	});
});