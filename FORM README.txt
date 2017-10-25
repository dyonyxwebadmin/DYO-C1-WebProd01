Setting up a form to be handled by /api/contact/create. 

Step 1:

Add the following JavaScript code to the site:

	var formListener = function() {
		$("form").submit(function( event ) {
			event.preventDefault();
			formHandler(this);
		});   
	};

	function formHandler(form) {
		var data = $(form).serializeArray();

		console.log(data);	

		$(".form_message").html("Processing...");

		$.post('/api/contact/create',{		
				data: data
			},
			function(data) {
				console.log(data);
		    	json = JSON.parse(data);
		        var status = json.status;
		        var message = json.message;

		        $(".form_message").html(message);

			}
		);
	}

	formListener();

Step 2.

Prepare the form with the following information:

	1. Add hidden value for the name or source of the form

		<input type="hidden" name="source" value="<Name of Form>">

	2. Add placeholder for thank you message

  			<div id="form-message"></div>

  	3. Add notificaiton email address to the config.json file:

  	        "Notifications": "email@address.com"    

  	        

Optional Reponse Message:

	
	ADD: 

	<div class="success_message hide">Thank you for your registration!</div>


	Replace:

        var message = json.message;

	With:

        var message = $(".success_message").html();
