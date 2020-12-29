
$(document).ready(function () {

    $("#registerForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirmPassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Please enter a Username",
                minlength: "Username must be at least 5 characters long"
            },
            email: {
                required: "Please enter an email",
                email: "Invalid email form"
            },
            password: {
                required: "Please enter a Password",
                minlength: "Password must be at least at least 5 characters long"
            },
            confirmPassword: {
                required: "Please confirm your Password",
                minlength: "Password must be at least at least 5 characters long",
                equalTo: "Please enter the same Password"
            }
        },
        errorClass: 'errors',
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
    });

    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            email: {
                required: "Please enter an email",
                email: "Invalid email form"
            },
            password: {
                required: "Please enter a Password",
                minlength: "Password must be at least at least 5 characters long"
            }
        },
        errorClass: 'errors',
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
    });

});