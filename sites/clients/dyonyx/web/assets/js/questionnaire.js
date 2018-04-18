var form = null;
var debug = null;

$(function () {

    // Questionnaire Form validation
    $("#questionnaire-form").validate({
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        submitHandler: function (form) {
            submitrQuestionnaire();
        }
    });

});  

function submitrQuestionnaire() {

    var data1 = $("#questionnaire-form").serializeArray();

    var organization = '';
    var barriers = '';
    var applications = '';
    var computing = '';
    var cloud = '';
    var department = '';

    $(data1).each(function (i, field) {
        if (field.name == "organization")
            organization += "|" + field.value;
        if (field.name == "barriers")
            barriers += "|" + field.value;
        if (field.name == "applications")
            applications += "|" + field.value;
        if (field.name == "computing")
            computing += "|" + field.value;
        if (field.name == "cloud")
            cloud += "|" + field.value;
        if (field.name == "department")
            department += "|" + field.value;
    });

    $(data1).each(function (i, field) {
        if (field.name == "organization")
            field.value = organization;
        if (field.name == "barriers")
            field.value = barriers;
        if (field.name == "applications")
            field.value = applications;
        if (field.name == "computing")
            field.value = computing;
        if (field.name == "cloud")
            field.value = cloud;
        if (field.name == "department")
            field.value = department;
    });

        $.post('/api/contact/add', {
            data: data1
        },
            function (data) {
                console.log(data);
                json = JSON.parse(data);
                var status = json.status;
                var message = json.message;
                if (status == "500") {
                    $(".errorContent").show();
                } else {
                    window.location.href = "/thankyou";
                }

            }
        );
}
