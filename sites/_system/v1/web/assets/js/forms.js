// Template Global Defined Variables

var FormID;


// Template Handlers


// Template Functions


function listForms() {
	$.post('/api/creative/forms.list',{
		},
		function(data) {
			//console.log(data);
			loadForms(data);
		}
	);
}

function loadForms(data)
{	
	var json = $.parseJSON(data);
	
	var html = $.map(json, function (item, i) {
		return '<div class="col-lg-3 col-md-4 col-sm-6">\
                    <div class="thumbnail-box">\
                        <a class="thumb-link" href="/template/form/'+item+'" title=""></a>\
                        <div class="thumb-content">\
                            <div class="center-vertical">\
                                <div class="center-content">\
                                    <h3 class="thumb-heading animated bounceIn">'+item.toUpperCase()+'</h3>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="thumb-overlay bg-primary"></div>\
                        <img src="/img/_forms/'+item+'/thumbnail.png" alt="">\
                    </div>\
                </div>';	
	}).join("");	
	$("#list-forms").append(html);	
}

var Forms = function () {
	"use strict";
    return {
        //main function
        init: function () {

			FormID = location.href.split("?")[1];
			
			listForms();
        }
    };
}();