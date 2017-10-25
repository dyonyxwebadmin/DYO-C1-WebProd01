// Template Global Defined Variables

var TemplateID;


// Template Handlers


// Template Functions


function listTemplates() {
	$.post('/api/creative/templates.list',{
		},
		function(data) {
			//console.log(data);
			loadTemplates(data);
		}
	);
}

function loadTemplates(data)
{	
	var json = $.parseJSON(data);
	
	var html = $.map(json, function (item, i) {
		return '<div class="col-lg-3 col-md-4 col-sm-6">\
                    <div class="thumbnail-box">\
                        <a class="thumb-link" href="/template/landing/'+item+'" title=""></a>\
                        <div class="thumb-content">\
                            <div class="center-vertical">\
                                <div class="center-content">\
                                    <h3 class="thumb-heading animated bounceIn">'+item.toUpperCase()+'</h3>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="thumb-overlay bg-primary"></div>\
                        <img src="/img/_landingPages/'+item+'/thumbnail.png" alt="">\
                    </div>\
                </div>';	
	}).join("");	
	$("#list-templates").append(html);	
}

var Templates = function () {
	"use strict";
    return {
        //main function
        init: function () {

			TemplateID = location.href.split("?")[1];
			
			listTemplates();
        }
    };
}();