var assessment_id = null,
	viewAssessment = false,
	questionID = null,
	groupID = null,
	parentID = null,
	assessmentJSON = null;
	isCreateSub = false,
	readOnly = false;

var step = 0;
var cntHandlers = 0;
var current_assessment_value = 0,
	new_assessment_value = 0;

var userAssessmentScore = true;
var questions_total = 0,
	assessment_total = 0,
	assessment_score = 0,
	assessment_possible = 0,
	questions_removed_based_on_dependencies = new Array();

var requiredQuestions = new Array();
var userInput = new Array();
var sectionJSON = new Array();
var debug = null;

var handleAssessmentStart = function() {
	$("#form-assessment-address").submit(function( event ) {
		event.preventDefault();
		assessmentStart();	
	});   
};

var handleContinueButton = function() {
	$(".btn-continue").off("click").click(function( event ) {
		event.preventDefault();		
		nextTab();
	});   
};

var handleFormInput = function() {
	$(".question-answer").off("change").change(function( event ) {
		event.preventDefault();		
		processUserInput(this, $(this).attr('id'), $(this).val());
	});   
}
var handleFormSwitch = function() {
	$(".question-switch").off("switchChange.bootstrapSwitch").on('switchChange.bootstrapSwitch', function () {
	    //console.log("switch id: " + $(this).attr('id'))
	    processUserInput(this, $(this).attr('id'), $(this).bootstrapSwitch('state'));
	});
}


function processUserInput(elm, id, value) {

	var question = getQuestion(id);
	var input = value;
	var assessment_value = 0;
	var assessment_operators = "";

	// check to see if this question is a dependency to anther question
	var dependency = checkDependencies(elm, id, value, question);

	if (!dependency) {
		$("#" + id).bootstrapSwitch('state', false, 'skip');
		return;
	}

	// check to see if this question has any dependents that have adjusted the assessment_possible 
	// if so, check to see if by the user changing this question do we need to reset the assessment possible
	//var dependent = checkDependent(id);

	if (readOnly) {
		
	} else {


		if (typeof(input) != "boolean") {	
			if (input.trim() == "") {
				input = false;
			}	
		}

		if (input) {

		    switch(question.type) {
		    	case "yes-no":
		    		if (value) {
		    			input = $(elm).data('on-text');
		    		} else {
		    			input = $(elm).data('off-text');
		    		}
		    		break;
		    	case "or":
		    		if (value) {
		    			input = $(elm).data('on-text');
		    		} else {
		    			input = $(elm).data('off-text');
		    		}
		            break;
		    }
			var assessment_conditions = "or";	
			if (question.question_values.length > 0) {
				$.each(question.question_values, function(key, item) 
				{
					///////////// 
					// Fields: item.value, item.conditions, item.operator, item.weight, item.required

					// switch the condition to AND if neccessary
				   	if (item.conditions == "and") {
				   		assessment_conditions = "and";
				   	}

					///////////// 
					// operators:
					// equal to 				: ==
					// not equal to 			: !=
					// less then				: <
					// greater then				: >
					// less then or equal to 	: <=
					// greater then or equal to : >=
					// contains					: string.indexOf(substring) !== -1
				    switch(item.operator) {
				    	case "equal to":
			    			if (input == item.value) {
			    				assessment_value = item.weight;
			    				assessment_operators = assessment_operators + "true";
			    			}
				    		break;
				    	case "not equal to":
			    			if (input != item.value) {
			    				assessment_value = item.weight;
			    				assessment_operators = assessment_operators + "true";
			    			}
				    		break;
				    	case "less then":
			    			if (parseInt(input) < parseInt(item.value)) {
			    				assessment_value = item.weight;
			    				assessment_operators = assessment_operators + "true";
			    			}
				    		break;
				    	case "greater then":
			    			if (parseInt(input) > parseInt(item.value)) {
			    				assessment_value = item.weight;
			    				assessment_operators = assessment_operators + "true";
			    			}
				    		break;
				    	case "less then or equal to":
			    			if (parseInt(input) <= parseInt(item.value)) {
			    				assessment_value = item.weight;
			    				assessment_operators = assessment_operators + "true";
			    			}
				    		break;
				    	case "greater then or equal to":
			    			if (parseInt(input) >= parseInt(item.value)) {
			    				assessment_value = item.weight;
			    				assessment_operators = assessment_operators + "true";
			    			}
				    		break;
				    	case "contains":
			    			if (item.value.indexOf(index) !== -1) {
			    				assessment_value = item.weight;
			    				assessment_operators = assessment_operators + "true";
			    			}
				    		break;
				    	default: 
			    			assessment_operators = assessment_operators + "false";

				    }
				    //console.log("if " + input + " is " + item.operator + " " + item.value + " then the assessment_value is " + as);
				});
			}
			assessment_operators = assessment_operators + 0;
			addInput(id, assessment_value);


			$.post('/api/assessments/assessment.input',{
					assessment_id: assessment_id,
					question_id: id,
					value: input,
					weight: assessment_value
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
			        	current_assessment_value = new_assessment_value;
			        }			
				}
			);	
		} else {
			removeInput(id);
			$.post('/api/assessments/assessment.remove',{
					assessment_id: assessment_id,
					question_id: id
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

			        }			
				}
			);	
		}
	}
} 

// var dependencies  = [
//   { "id": "44", "dependency": "43", "value": false, "message": "By answering yes to the previous question you do not need to supply an answer for this question." },
//   { "id": "58", "dependency": "57", "value": false, "message": "You have already said you are setup with Avnet Cloud Marketplace, you do not need to answer this question." },
//   { "id": "47", "dependency": "45", "value": true, "message": "It doesn't look like your executive team has formazlied and documented a plan to develop the IoT practice, if this is incorrect please update your answer above." },
//   { "id": "48", "dependency": "45", "value": true, "message": "It doesn't look like your executive team has formazlied and documented a plan to develop the IoT practice, if this is incorrect please update your answer above." },
//   { "id": "49", "dependency": "45", "value": true, "message": "It doesn't look like your executive team has formazlied and documented a plan to develop the IoT practice, if this is incorrect please update your answer above." }
// ];
var dependencies  = [
  { "id": "434", "dependency": "433", "value": false, "message": "By answering yes to the previous question you do not need to supply an answer for this question." }
];
function checkDependencies(elm, id, value, question) {
	var ckDependencies = true;
	// update score if it has dependents
	$.map(dependencies, function (item, i) {
		if (item.dependency == id) {	
			var question = getQuestion(item.id);
			if (item.value == value) {
				addTotalPossible(question);
			} else {
				console.log(item.id);
				deleteTotalPossible(question);
				removeInput(item.id);
				$("#" + item.id).bootstrapSwitch('state', false, 'skip');
			}
		}
	});

	// check to see if a dependency was clicked
	$.map(dependencies, function (item, i) {
		if (item.id == id) {		
			if (!item.value) {
				if ($("#" + item.dependency).bootstrapSwitch('state')) {
					ckDependencies = false;
				}
			} else {
				if (!$("#" + item.dependency).bootstrapSwitch('state')) {
					ckDependencies = false;
				}
			}
			if (!ckDependencies) {
				noty({
					text: item.message,
					type: 'warning',
					layout: 'center'
				});
			}
		}
	});
	return ckDependencies;
}

function addTotalPossible(question) {
	var update = false;  // need to see when we wouldn't update assessment values to the database.  Maybe in admin?
	values = question.question_values;
	if (values.length > 0) {
		$.map(values, function(item, i) 
		{	
			questions_removed_based_on_dependencies.pop(question.id);
			assessment_possible = parseInt(assessment_possible) + parseInt(item.weight);

		    assessment_score = Math.round((parseInt(assessment_total)/parseInt(assessment_possible)) * 100);
			assessment_level = getAssessmentText(assessment_score);

			$("#current-assessment-level").html(assessment_level);
			$("#current-assessment-score").html(assessment_score);
			$("#current-assessment-possible").html(assessment_possible);
			$("#current-assessment-total").html(assessment_total);

			if (update) {			
				$.post('/api/assessments/assessment.set.total',{
						assessment_id: assessment_id,
						assessment_level: assessment_level,
						assessment_total: assessment_total,
						assessment_possible: assessment_possible
					},
					function(data) {	
					}
				);
			}
		});
	}
}



function deleteTotalPossible(question) {
	var update = false;  // need to see when we wouldn't update assessment values to the database.  Maybe in admin?

	if (questions_removed_based_on_dependencies.indexOf(question.id)) {
		questions_removed_based_on_dependencies.push(question.id);
		values = question.question_values;
		if (values.length > 0) {
			$.map(values, function(item, i) 
			{	
				assessment_possible = parseInt(assessment_possible) - parseInt(item.weight);

			    assessment_score = Math.round((parseInt(assessment_total)/parseInt(assessment_possible)) * 100);
				assessment_level = getAssessmentText(assessment_score);

				$("#current-assessment-level").html(assessment_level);
				$("#current-assessment-score").html(assessment_score);
				$("#current-assessment-possible").html(assessment_possible);
				$("#current-assessment-total").html(assessment_total);

				if (update) {			
					$.post('/api/assessments/assessment.set.total',{
							assessment_id: assessment_id,
							assessment_level: assessment_level,
							assessment_total: assessment_total,
							assessment_possible: assessment_possible
						},
						function(data) {	
						}
					);
				}
			});
		}
	}

}

// check to see if this question has any dependents that have adjusted the assessment_possible 
// if so, check to see if by the user changing this question do we need to reset the assessment possible
function checkDependent(id) {
	update = true;
	$.map(dependencies, function (item, i) {
		debug = questions_removed_based_on_dependencies;
		if (item.dependency == id) {
			if (!questions_removed_based_on_dependencies.indexOf(item.id)) {
				var question = getQuestion(item.id);
				values = question.question_values;
				if (values.length > 0) {
					$.map(values, function(item, i) 
					{	
						questions_removed_based_on_dependencies.pop(question.id);
						assessment_possible = assessment_possible + parseInt(item.weight);

					    assessment_score = Math.round((parseInt(assessment_total)/parseInt(assessment_possible)) * 100);
						assessment_level = getAssessmentText(assessment_score);

						$("#current-assessment-level").html(assessment_level);
						$("#current-assessment-score").html(assessment_score);
						$("#current-assessment-possible").html(assessment_possible);
						$("#current-assessment-total").html(assessment_total);

						if (update) {			
							$.post('/api/assessments/assessment.set.total',{
									assessment_id: assessment_id,
									assessment_level: assessment_level,
									assessment_total: assessment_total,
									assessment_possible: assessment_possible
								},
								function(data) {	
								}
							);
						}
					});
				}
			}
		}
	});
}

function addInput(id, weight) {	
    for (i = 0; i < userInput.length; i++){
    	if (userInput[i].question_id == id) {
    		userInput.splice(i, 1);
    	}
    };
	userInput.push({"question_id": id, "weight": weight});
	updateAssessment(true);
}

function removeInput(id) {
    for (i = 0; i < userInput.length; i++){
    	if (userInput[i].question_id == id) {
    		userInput.splice(i, 1);
    	}
    };
	updateAssessment(true);
}

function updateAssessment(update) {	

	if (userAssessmentScore) {	
		assessment_total = 0;

	    for (i = 0; i < userInput.length; i++) {
	    	//Calculate the Assesment Total Score
    		assessment_total += parseInt(userInput[i]['weight']);
	    };
	    
	    assessment_score = Math.round((parseInt(assessment_total)/parseInt(assessment_possible)) * 100);
		assessment_level = getAssessmentText(assessment_score);

		$("#current-assessment-level").html(assessment_level);
		$("#current-assessment-score").html(assessment_score);
		$("#current-assessment-possible").html(assessment_possible);
		$("#current-assessment-total").html(assessment_total);

		if (update) {			
			$.post('/api/assessments/assessment.set.total',{
					assessment_id: assessment_id,
					assessment_level: assessment_level,
					assessment_total: assessment_total,
					assessment_possible: assessment_possible
				},
				function(data) {	
				}
			);
		}

	} else {
		var required = false;
		var required_assessment_value = 0;
		var new_assessment_value = 0;

		if (requiredQuestions.length > 0) {
		    for (r = 0; r < requiredQuestions.length; r++){
			    for (i = 0; i < userInput.length; i++){
			    	if (requiredQuestions[r].question_id == userInput[i].question_id) {
			    		required = true;
			    		cntTrue++;
			    		//console.log(cntTrue + ". " + requiredQuestions[r].question_id + " = " + userInput[i].question_id);
			    		if (parseInt(requiredQuestions[r].weight) > required_assessment_value) {
			    			required_assessment_value = parseInt(requiredQuestions[r].weight);
			    		}
			    	}
			    };
		    };
		    if (cntTrue != requiredQuestions.length) {
		    	required = false;
		    }
		} else {
			required = true;
		}

		if (required) {
		    for (i = 0; i < userInput.length; i++) {
	    		if (parseInt(userInput[i]['weight']) > new_assessment_value) {
	    			new_assessment_value = parseInt(userInput[i]['weight']);
	    		}
		    };
		} else {
			new_assessment_value = required_assessment_value;
		}
		$("#current-assessment-level").html(new_assessment_value);

		assessment_level = getAssessmentText(new_assessment_value);

		$.post('/api/assessments/assessment.set.level',{
				assessment_id: assessment_id,
				partner_level: new_assessment_value
			},
			function(data) {	
			}
		);
	}
}

function nextTab() {
	//console.log(config.section.length + ": " + step);
	if (step < config.section.length) {
		step++;
		section = config.section[step];
		getSection(section);		
	}
}

function assessmentStart() {
	if (viewAssessment) {
		$.post('/api/assessments/assessment.update',{
				assessment_id: assessment_id,
				company_name: $('#company_name').val(),
				external_id: $('#external_id').val(),
				main_phone: $('#main_phone').val(),
				url: $('#url').val(),
				address1: $('#address1').val(),
				address2: $('#address2').val(),
				city: $('#city').val(),
				state: $('select[name=state]').val(),
				zip: $('#zip').val(),
				comments: $('#comments').val()
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
						text: "Information saved.",
						type: 'success',
						layout: 'top'
					});
		        }			
			}
		);

	} else {
		$.post('/api/assessments/assessment.create',{
				company_name: $('#company_name').val(),
				external_id: $('#external_id').val(),
				main_phone: $('#main_phone').val(),
				url: $('#url').val(),
				address1: $('#address1').val(),
				address2: $('#address2').val(),
				city: $('#city').val(),
				state: $('select[name=state]').val(),
				zip: $('#zip').val(),
				comments: $('#comments').val()
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
		        	assessment_id = json.id;
		        	section = config.section[0];
		        	getSection(section);
		        }			
			}
		);

	}
}













function getSection(s) {

	var api = '/api/questions/question.list';

	$.post(api,{
			section: s
		},
		function(data) {
	    	json = JSON.parse(data);
	    	$("html,body").animate({ scrollTop: 10 }, 'slow');
			loadSection(s, json);
		}
	);

}

function getPossible() {

	if (assessmentJSON) {

	} else {
		var api = '/api/questions/question.possible';
		$.post(api,{
			},
			function(data) {
		    	json = JSON.parse(data);
		    	assessment_possible = json.possible;
		    	$("#current-assessment-possible").html(assessment_possible);
			}
		);
	}
}

function loadSection(s, json) {
	$("#section-questions").empty();
	// Finding All Groups
	var group = $.map(json, function (item, i) {
		// Section Header
		gHTML = '<li data-group-id="' + item.id + '">\
					<div class="row">\
                        <div class="col-sm-8 question-list-header" data-group-text-id="' + item.id + '"><h4>' + item.text + '</h4></div>\
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
					    checkRequired(item.question_values);
					    // Level 1: Questions
						qTHML = '<li data-question-id="' + item.id + '">\
                                    <div class="row">\
                                        <div class="col-sm-8" data-question-text-id="' + item.id + '" style="' + questionStyle + '">' + item.text + '</div>\
                                        <div class="col-sm-4 text-right" data-question-type="' + item.type + '">' + getFormElement(item.id, item.type) + '</div>\
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
					    				checkRequired(item.question_values);
									    // Level 2: Questions
										q2THML = '<li data-question-id="' + item.id + '">\
				                                    <div class="row">\
				                                        <div class="col-sm-8" data-question-text-id="' + item.id + '" style="' + questionStyle + '">' + item.text + '</div>\
				                                        <div class="col-sm-4 text-right" data-question-type="' + item.type + '">' + getFormElement(item.id, item.type) + '</div>\
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

	$("#" + s + "-questions").append(group);	

	$("#" + s + "-tab").removeClass("disabled");
	if (!viewAssessment) {
		$("#" + s + "-tab").tab('show');	
	} else {		
		$.each(assessmentJSON.list_user_input, function(key, item) 
		{
			if ($("#" + item.question_id).is(':checkbox')) {
				$("#" + item.question_id).prop("checked", true);
			} else {
				$("#" + item.question_id).val(item.value);
			}
			 addInput(item.question_id, item.weight);

		});
	}
	$('.input-switch').bootstrapSwitch();
    handleFormInput();
    handleFormSwitch();
	$.uniform.update();
	sectionJSON.push(json);
}

function checkRequired(values) {
	if (values.length > 0) {
		$.each(values, function(key, item) 
		{
			///////////// 
			// Fields: item.value, item.conditions, item.operator, item.weight, item.required
			if (item.required == "1") {
				requiredQuestions.push({"question_id": item.question_id, "weight": item.weight});
			}
		});
	}
}

function getFormElement(id, type) {

	var formElement = "";

    switch(type) {
    	case "text":
    		formElement = '<input type="text" class="form-control question-answer" data-question-type="text" id="'+ id + '" placeholder="">';
            break;
    	case "amount":
    		formElement = '<div class="input-group">\
	                            <span class="input-group-addon">$</span>\
	                            <input type="text" id="'+ id + '" class="form-control question-answer text-right" data-question-type="amout">\
	                        </div>';
            break;
    	case "percent":
    		formElement = '<div class="input-group">\
	                            <input type="text" id="'+ id + '" class="form-control question-answer text-right" data-question-type="percent">\
	                            <span class="input-group-addon">%</span>\
	                        </div>';
            break;
    	case "none":
    		formElement = '';
            break;
    	case "yes-no":
    		formElement = '<input type="checkbox" data-on-color="primary" id="'+ id + '"  class="input-switch question-switch" data-question-type="yes-no" data-size="medium" data-on-text="Yes" data-off-text="No">';
            break;
    	case "or":
    		formElement = 'This or That';
            break;
    	case "single":
    		formElement = '<select></select>';
            break;
    	case "multiple":
    		formElement = '<select></select>';
            break;
    }

	return formElement;
}

function getQuestion(id) {
	var question = null;
	// find question data from sectionJSON
	$.map(sectionJSON, function(section, i) {		
		$.map(section, function(group, i) {	
			$.map(group.questions, function(item, i) {	
				if (id == item.id) {
					question = $.extend({}, item);
				}
				// find sub question data from sectionJSON
				$.map(item.questions, function(item, i) {	
					if (id == item.id) {
						question = $.extend({}, item);
					}
				}); 
			}); 
		}); 
	}); 
	return question;
}

function loadAssessment() {

	$.post('/api/assessments/assessment.get',{
			assessment_id: assessment_id
		},
		function(data) {
			json = JSON.parse(data);
			assessmentJSON = json;
	        //console.log(json);	

		    $("#company_name").val(json.company_name);
		    $("#external_id").val(json.external_id);
		    $("#main_phone").val(json.main_phone);
		    $("#url").val(json.url);
		    $("#address1").val(json.address1);
		    $("#address2").val(json.address2);
		    $("#city").val(json.city);
		    $('*[data-assessment-form="state"]').val(json.state);
		    $("#zip").val(json.zip);
		    $("#comments").val(json.comments);
			$.uniform.update();


		 	//    assessment_score = Math.floor((parseInt(json.assessment_total)/parseInt(json.assessment_possible)) * 100);

			// $("#current-assessment-level").html(assessment_score);
			// $("#current-assessment-possible").html(json.assessment_possible);
			// $("#current-assessment-total").html(json.assessment_total);

	    	assessment_possible = json.possible;
	    	$("#current-assessment-possible").html(assessment_possible);
			assessment_level = getAssessmentText(json.assessment_total);

		    $("#btn-begin").html("Save Profile");
		    $("#btn-continue").hide();

		    for (i = 0; i <= config.section.length; i++){    
	        	section = config.section[i];
	        	getSection(section);		    	
		    };
		}
	);
}

function getAssessmentText(level) {

	var new_assessment_level = 0;
	// find question data from sectionJSON	
	if(levelsJSON) {
		$.map(levelsJSON, function(item, i) {
			if (parseInt(level) > parseInt(item.min_range)) {
				$("#level-name").html(item.name);
				$("#level-text").html(item.text);
				new_assessment_level = item.level;
			}
		}); 		
	} else {
		var delay = 1000;
		setTimeout(function() {
			getAssessmentText(level);
		}, delay);
	}
	return new_assessment_level;
}

var Assessment = function () {
	"use strict";
    return {
        //main function
        init: function (id) {
        	//getSection();


			assessment_id = id
			if (assessment_id) {
				viewAssessment = true;
				loadAssessment();
			} else {
				getPossible();
			}


        	handleAssessmentStart();
        	handleContinueButton();
        }
    };
}();