
$(document).ready(function () {

    // Validation of forms using JQuery Validator
    $("#loginForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            password: {
                required: true,
                minlength: 5,
                maxlength: 50
            }
        },
        messages: {
            username: {
                required: "Please enter a username",
                minlength: "Username must be at least at least 5 characters long",
                maxlength: "Username must be 50 characters long maximum"
            },
            password: {
                required: "Please enter a Password",
                minlength: "Password must be at least at least 5 characters long",
                maxlength: "Password must be 50 characters long maximum"
            }
        },
        errorClass: 'error',
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
    });

    $("#registerForm").validate({
        rules: {
            rUsername: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            email: {
                required: true,
                email: true,
                maxlength: 50
            },
            rPassword: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            confirmPassword: {
                required: true,
                minlength: 5,
                maxlength: 50,
                equalTo: "#rPassword"
            }
        },
        messages: {
            rUsername: {
                required: "Please enter a Username",
                minlength: "Username must be at least 5 characters long",
                maxlength: "Username must be 50 characters long maximum"
            },
            email: {
                required: "Please enter an email",
                email: "Invalid email form",
                maxlength: "Email must be 50 characters long maximum"
            },
            rPassword: {
                required: "Please enter a Password",
                minlength: "Password must be at least at least 5 characters long",
                maxlength: "Password must be 50 characters long maximum"
            },
            confirmPassword: {
                required: "Please confirm your Password",
                minlength: "Password must be at least at least 5 characters long",
                equalTo: "Please enter the same Password",
                maxlength: "Password must be 50 characters long maximum"
            }
        },
        errorClass: 'error',
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
    });

    $("#settingsForm").validate({
        rules: {
            firstname: {
                required: true,
                maxlength: 50
            },
            lastname: {
                required: true,
                maxlength: 50
            },
            sUsername: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            sEmail: {
                required: true,
                email: true,
                maxlength: 50
            }
        },
        messages: {
            firstname: {
                required: "Please enter a Firstname",
                maxlength: "Firstname must be 50 characters long maximum"
            },
            lastname: {
                required: "Please enter a Lastname",
                maxlength: "Lastname must be 50 characters long maximum"
            },
            sUsername: {
                required: "Please enter a Username",
                minlength: "Username must be at least 5 characters long",
                maxlength: "Username must be 50 characters long maximum"
            },
            sEmail: {
                required: "Please enter an email",
                email: "Invalid email form",
                maxlength: "Email must be 50 characters long maximum"
            }
        },
        errorClass: 'error',
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
    });

});

//Unset session variables
$('#loginModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'unsetVariables.php',
        dataType: 'json',
        data: { loginMessage: 'loginMessage' }
    });
})

$('#registerModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'unsetVariables.php',
        dataType: 'json',
        data: { registerMessage: 'registerMessage' }
    });
})

$('#settingsModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'unsetVariables.php',
        dataType: 'json',
        data: { settingsMessage: 'settingsMessage' }
    });
})