var questionID = null,
	section = "",
	groupID = null,
	parentID = null,
	sectionJSON = null,
	isCreateSub = false;

var cntHandlers = 0;

var handleAddGroupButton = function() {
	$("#add-group").off("click").click(function( event ) {
		event.preventDefault();
		groupID = 0;
		$('#group-text').val('');
		$(".group-form").modal('toggle');	
	});   
};

var handleFormGroup = function() {
	$("#group-form-save").off("click").click(function( event ) {
		event.preventDefault();
		if (groupID) {
			groupUpdate();
		} else {
			groupCreate();
		}
	});   
};

var handleEditGroupButton = function() {
	$(".edit-group").off("click").click(function( event ) {
		event.preventDefault();
		showEditGroup($(event.currentTarget).parent().parent().parent().attr('data-group-id'));
	});   
};

var handleDeleteGroupButton = function() {
	$(".delete-group").off("click").click(function( event ) {
		event.preventDefault();
		groupDelete($(event.currentTarget).parent().parent().parent().attr('data-group-id'));
	});   
};




var handleAddQuestionButton = function() {
	$(".add-question").off("click").click(function( event ) {
		event.preventDefault();
		showAddQuestion($(event.currentTarget).parent().parent().parent().attr('data-group-id'),null,false);
	});   
};

var handleAddSubQuestionButton = function() {
	$(".add-sub-question").off("click").click(function( event ) {
		event.preventDefault();
		showAddQuestion($(event.currentTarget).parent().parent().parent().parent().parent().attr('data-group-id'),$(event.currentTarget).parent().parent().parent().attr('data-question-id'), true);
	});   
};

var handleFormQuestion = function() {
	$("#answer-form-save").off("click").click(function( event ) {
		event.preventDefault();
		questionFormHandler();
	});   
};

var handleEditQuestionButton = function() {
	$(".edit-question").off("click").click(function( event ) {
		event.preventDefault();
		showEditQuestion($(event.currentTarget).parent().parent().parent().attr('data-question-id'));
	});   
};

var handleDeleteQuestionButton = function() {
	$(".delete-question").off("click").click(function( event ) {
		event.preventDefault();
		deleteQuestion($(event.currentTarget).parent().parent().parent().attr('data-question-id'));
	});   
};

var handleQuestionTypeYesNo = function() {
	$("#question-type-yes-no").off("click").click(function( event ) {
		// remove current value options
	    while($('#question-values tbody>tr').length > 1) {
	        $('#question-values tbody>tr:last').remove();
		}    

		// add yes row
		$('#question-values tbody>tr:last .value-option').val('Yes');
	    $('#question-values tbody>tr:last').find('[name="question-conditions"]').val('or');
	    $('#question-values tbody>tr:last').find('[name="question-operators"]').val('equal to');
	    $('#question-values tbody>tr:last').find('[name="question-weight"]').val('0');

	    // add no row
		// $('#question-values tbody>tr:last').clone(true).insertAfter('#question-values tbody>tr:last');
		// $('#question-values tbody>tr:last .value-option').removeClass('hide');
		// $('#question-values tbody>tr:last').find('[data-row]').each(function() { $(this).attr("data-row", $('#question-values tbody>tr').length) });                

		// $('#question-values tbody>tr:last .value-option').val('No');
		// $('#question-values tbody>tr:last').find('[name="question-conditions"]').val('or');
		// $('#question-values tbody>tr:last').find('[name="question-operators"]').val('equal to');
		// $('#question-values tbody>tr:last').find('[name="question-weight"]').val('0');
		
		$("#question-type-yes-no").prop('checked',true);	
		$.uniform.update();	
	});   
};












function showEditGroup(id) {
	groupID = id;
	$('#group-text').val($('*[data-group-text-id="' + groupID + '"]').find("h4").html());  	
	$(".group-form").modal('toggle');	
}

function groupCreate() {
	$.post('/api/questions/question.group.create',{
			section: section,
			text: $('#group-text').val(),
			type: 'group',
			sort: 1
		},
		function(data) {
	    	sectionJSON = JSON.parse(data);
			loadSection();
			$(".group-form").modal('hide')
			noty({
				text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">The group you created has been saved.</div></div>',
				type: 'success',
				layout: 'center'
			});
		}
	);
	return false;
}



function groupUpdate() {
	$.post('/api/questions/question.group.update',{
			group_id: groupID,
			text: $('#group-text').val()
		},
		function(data) {
	    	sectionJSON = JSON.parse(data);
			loadSection();
			$(".group-form").modal('hide')
			noty({
				text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">The group you created has been saved.</div></div>',
				type: 'success',
				layout: 'center'
			});
		}
	);
	return false;
}

function groupDelete(id) {
	groupID = id;
	if ($('*[data-group-id="' + groupID + '"]:has(ul>li)').length > 0) {
		noty({
			text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">You can not delete a group that has questions assigned to it.  You can either remove the questions or just edit the group text to match what you are looking for.</div></div>',
			type: 'error',
			layout: 'center'
		});
	} else {		
		$.post('/api/questions/question.group.delete',{
				group_id: groupID
			},
			function(data) {
				//console.log(data);
				getSection();
				$(".group-form").modal('hide')
				noty({
					text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">The group you selected has been deleted.</div></div>',
					type: 'success',
					layout: 'center'
				});
			}
		);
	}
	return false;
}















function showAddQuestion(gID,qID,s) {
	groupID = gID;
	questionID = qID;
	isCreateSub = s;
	
	questionFormReset();

	$(".question-form").modal('toggle');
}

function showEditQuestion(qID) {

	questionID = qID;
	isCreateSub = false;
	var question = null;

	questionFormReset();

	// find question data from sectionJSON
	$.map(sectionJSON, function(group, i) {		
		$.map(group.questions, function(item, i) {	
			if (questionID == item.id) {
				question = $.extend({}, item);
			}
			// find sub question data from sectionJSON
			$.map(item.questions, function(item, i) {	
				if (questionID == item.id) {
					question = $.extend({}, item);
				}
			}); 
		}); 
	}); 

    // set question data into the form
    $('#question-text').val(question.text);

    switch(question.type) {
    	case "text":
    		$("#question-type-text").prop('checked',true);
            break;
    	case "amount":
    		$("#question-type-amount").prop('checked',true);
            break;
    	case "percent":
    		$("#question-type-percent").prop('checked',true);
            break;
    	case "none":
    		$("#question-type-none").prop('checked',true);
            break;
    	case "yes-no":
    		$("#question-type-yes-no").prop('checked',true);
            break;
    	case "or":
    		$("#question-type-or").prop('checked',true);
            break;
    	case "single":
    		$("#question-type-single").prop('checked',true);
            break;
    	case "multiple":
    		$("#question-type-multiple").prop('checked',true);
            break;
    }

    if (question.style != "{}") {
	   	style = JSON.parse(question.style);
	   	if (style['question-style-bold'] == 1) {
    		$("#question-style-bold").prop('checked',true);
	   	}
	   	if (style['question-style-italic'] == 1) {
    		$("#question-style-italic").prop('checked',true);
	   	}
	   	if (style['question-style-hide-numbers'] == 1) {
    		$("#question-style-hide-numbers").prop('checked',true);
	   	}
    }

	$.uniform.update();
	
	if (question.question_values.length > 0) {
		$.each(question.question_values, function(key, item) 
		{
			if (key > 0) {
				$('#question-values tbody>tr:last').clone(true).insertAfter('#question-values tbody>tr:last');
				$('#question-values tbody>tr:last .value-option').removeClass('hide');
				$('#question-values tbody>tr:last').find('[data-row]').each(function() { $(this).attr("data-row", $('#question-values tbody>tr').length) });                
			}
			$('#question-values tbody>tr:last .value-option').val(item.value);
		    $('#question-values tbody>tr:last').find('[name="question-conditions"]').val(item.conditions);
		    $('#question-values tbody>tr:last').find('[name="question-operators"]').val(item.operator);
		    $('#question-values tbody>tr:last').find('[name="question-weight"]').val(item.weight);	
		    $('#question-values tbody>tr:last').find('[name="question-required"]').prop('checked', (item.required == "1") ? true :false); 
		});
	}

	// show the form
	$(".question-form").modal('toggle');
}

function questionFormReset() {
	// reset the form
	$('#question-form :input').each(function(){ $(this).val(''); });	
    while($('#question-values tbody>tr').length > 1) {
        $('#question-values tbody>tr:last').remove();
	}    
    $('#question-values tbody>tr:last').find('[name="question-conditions"]').val('or');
    $('#question-values tbody>tr:last').find('[name="question-operators"]').val('equal to');
    $('#question-values tbody>tr:last').find('[name="question-weight"]').val('0');
    $('#question-values tbody>tr:last').find('[name="question-required"]').attr('checked', false); 

	$("#question-type-text").prop('checked',false);
	$("#question-type-amount").prop('checked',false);
	$("#question-type-percent").prop('checked',false);
	$("#question-type-none").prop('checked',false);
	$("#question-type-yes-no").prop('checked',false);
	$("#question-type-or").prop('checked',false);
	$("#question-type-single").prop('checked',false);
	$("#question-type-multiple").prop('checked',false);

	$("#question-style-bold").prop('checked',false);
	$("#question-style-italic").prop('checked',false);
	$("#question-style-hide-numbers").prop('checked',false);	
	$.uniform.update();	
}

function questionFormHandler() {
	var text = $('#question-text').val();
	var type = $('input[name=question-type]:checked').data("type-value");
	var optionLength = $('#question-values tbody>tr').length;

	var valueArray = new Array();

	var questionStyle = {};
	$("input[name='question-style']:checked").each(
	    function(){
	        var id = this.id;
	        questionStyle[id] = (this.checked ? 1 : 0)
	    }
	);

	var style = JSON.stringify(questionStyle);

	for(i = 1; i <= optionLength; i++) { 	 
		var conditions = $('[data-value="conditions"][data-row="' + i + '"]').val();
		if (i == 1) {
			conditions = null
		}
		if ($('[data-value="value"][data-row="' + i + '"]').val() != '') {
			valueArray.push({
				conditions: conditions,
				operator: $('[data-value="operators"][data-row="' + i + '"]').val(),
				value: $('[data-value="value"][data-row="' + i + '"]').val(),
				weight: $('[data-value="weight"][data-row="' + i + '"]').val(),
				required: ($('[data-value="required"][data-row="' + i + '"]').is(':checked')) ? 1 : 0
			});
		}
	}

	var valuesJSON = JSON.stringify(valueArray);
	
	if ((!questionID) || ((questionID) && (isCreateSub))) {
		var api = '/api/questions/question.create';

		$.post(api,{
				section: section,
				group_id: groupID,
				parent_id: questionID,
				text: text,
				type: type,
				style: style,
				values: valuesJSON
			},
			function(data) {
		    	sectionJSON = JSON.parse(data);
				loadSection();
				$(".question-form").modal('hide')
				// noty({
				// 	text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">The question you created has been saved.</div></div>',
				// 	type: 'success',
				// 	layout: 'center'
				// });
			}
		);
	} else {
		var api = '/api/questions/question.update';

		$.post(api,{
				question_id: questionID,
				text: text,
				type: type,
				style: style,
				values: valuesJSON
			},
			function(data) {
		    	sectionJSON = JSON.parse(data);
				loadSection();
				$(".question-form").modal('hide')
				// noty({
				// 	text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">The question you created has been saved.</div></div>',
				// 	type: 'success',
				// 	layout: 'center'
				// });
			}
		);
	}

}

function deleteQuestion(id) {
	if ($('*[data-question-id="' + id + '"]:has(ul>li)').length > 0) {
		noty({
			text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">You can not delete a question there are secondary questions associated with it.  You can either remove the questions below it or just edit the question text to match what you are asking.</div></div>',
			type: 'error',
			layout: 'center'
		});
	} else {		
		$.post('/api/questions/question.delete',{
				question_id: id
			},
			function(data) {
				//console.log(data);
				getSection();
				$(".group-form").modal('hide')
				noty({
					text: '<div class="row"><div class="col-md-1 pad15L"><i class="glyph-icon icon-paper-plane"></i></div><div class="col-md-11 text-left">The question you selected has been deleted.</div></div>',
					type: 'success',
					layout: 'center'
				});
			}
		);
	}
	return false;
}










function getSection() {

	var api = '/api/questions/question.list';

	$.post(api,{
			section: section
		},
		function(data) {
	    	sectionJSON = JSON.parse(data);
			loadSection();
		}
	);

}

function loadSection() {
	$("#section-questions").empty();
	// Finding All Groups
	var group = $.map(sectionJSON, function (item, i) {
		gHTML = '<li data-group-id="' + item.id + '">\
					<div class="row">\
                        <div class="col-sm-9 question-list-header" data-group-text-id="' + item.id + '"><h4>' + item.text + '</h4></div>\
                        <div class="col-sm-3 text-right question-list-options ' + ((SESSION.type_id != "5") ? 'hide' : '') + '">\
                            <button class="btn btn-xs btn-success add-question"><i class="glyph-icon icon-plus"></i></button>\
                            <button class="btn btn-xs btn-black edit-group"><i class="glyph-icon icon-pencil"></i></button>\
                            <button class="btn btn-xs btn-danger delete-group"><i class="glyph-icon icon-trash"></i></button>\
                        </div>\
                    </div>\
                    <ul class="question-lists">';
					
					// Finding All First Level questions
					var questions = $.map(item.questions, function (item, i) {	

						questionStyle = "";
					    if (item.style != "{}") {
						   	style = JSON.parse(item.style);
						   	if (style['question-style-bold'] == 1) {
						   		questionStyle += "font-weight: bold; ";
						   	}
						   	if (style['question-style-italic'] == 1) {
						   		questionStyle += "font-style: italic; ";
						   	}
						   	if (style['question-style-hide-numbers'] == 1) {

						   	}
					    }
						qTHML = '<li data-question-id="' + item.id + '">\
                                    <div class="row">\
                                        <div class="col-sm-7" data-question-text-id="' + item.id + '" style="' + questionStyle + '">' + item.text + '</div>\
                                        <div class="col-sm-' + ((SESSION.type_id == "5") ? '4' : '5 text-right') + ' primary-item">' + listValues(item.question_values) + '</div>\
                                        <div class="col-sm-1 text-right ' + ((SESSION.type_id != "5") ? 'hide' : '') + '">\
                                            <button class="btn btn-xs btn-success add-sub-question"><i class="glyph-icon icon-plus"></i></button>\
                                            <button class="btn btn-xs btn-black edit-question"><i class="glyph-icon icon-pencil"></i></button>\
                                            <button class="btn btn-xs btn-danger delete-question"><i class="glyph-icon icon-trash"></i></button>\
                                        </div>\
                                    </div>\
                                    <ul class="question-lists">';
					
									// Finding All First Level questions
									var subQuestions = $.map(item.questions, function (item, i) {

										questionStyle = "";
									    if (item.style != "{}") {
										   	style = JSON.parse(item.style);
										   	if (style['question-style-bold'] == 1) {
										   		questionStyle += "font-weight: bold; ";
										   	}
										   	if (style['question-style-italic'] == 1) {
										   		questionStyle += "font-style: italic; ";
										   	}
										   	if (style['question-style-hide-numbers'] == 1) {

										   	}
									    }
										q2THML = '<li data-question-id="' + item.id + '">\
				                                    <div class="row">\
				                                        <div class="col-sm-7" data-question-text-id="' + item.id + '" style="' + questionStyle + '">' + item.text + '</div>\
				                                        <div class="col-sm-' + ((SESSION.type_id == "5") ? '4' : '5 text-right') + ' secondary-item">' + listValues(item.question_values) + '</div>\
				                                        <div class="col-sm-1 text-right ' + ((SESSION.type_id != "5") ? 'hide' : '') + '">\
				                                            <button class="btn btn-xs btn-black edit-question"><i class="glyph-icon icon-pencil"></i></button>\
				                                            <button class="btn btn-xs btn-danger delete-question"><i class="glyph-icon icon-trash"></i></button>\
				                                        </div>\
				                                    </div>\
				                                    <ul class="question-lists">';
				        				q2THML += '</ul></li>';

								        return q2THML;
									}).join("");	   

									qTHML += subQuestions;

        				qTHML += '</ul></li>';

				        return qTHML;
					}).join("");	   

					gHTML += questions;

        gHTML += '</ul></li>';
        return gHTML;
	}).join("");	
	$("#section-questions").append(group);	

	handleFormQuestion();
	handleAddQuestionButton();
	handleAddSubQuestionButton();
	handleEditQuestionButton();
	handleDeleteQuestionButton();
	handleQuestionTypeYesNo();

	handleFormGroup();
	handleAddGroupButton();
	handleEditGroupButton();
	handleDeleteGroupButton();		
}

function listValues(values) {
	if (values.length > 0) {
		
		var v = $.map(values, function (item, i) {

			html = item.operator + " " + item.value + ": " + item.weight + ", ";

	        return html;
		}).join("");	   

		v = v.substring(0, v.length - 2);

		return v;
	} else {
		return '';
	}
}
var Questions = function () {
	"use strict";
    return {
        //main function
        init: function () {
			section = location.pathname.split("/")[3];
        	getSection();
        }
    };
}();