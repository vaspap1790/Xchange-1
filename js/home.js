
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

// Unset session variables
$('#loginModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { loginMessage: 'loginMessage' }
    });
})

$('#registerModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { registerMessage: 'registerMessage' }
    });
})

$('#settingsModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { settingsMessage: 'settingsMessage' }
    });
})

$('#exchangeModal').on('hidden.bs.modal', function () {
    $('#message').val("");
})

$('#messageModal').on('hidden.bs.modal', function () {
    location.reload();
})

// Item modal
$('.openItemModal').click(function () {

    var fetch_item_id = $(this).attr('id').split("_")[1];

    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { fetch_item_id: fetch_item_id },
        success: function (response) {
            $('#item_toExchange_id').text(response[0].itemId);
            $('#owner_id').text(response[0].userId);
            $('#itemModalTitle').text(response[0].itemName);
            $('#itemCategoryName').text(response[0].categoryName);
            $('#dateUploaded').text(response[0].dateTime);
            $('#uploadedBy').text(response[0].username);
            $('#item_description').text(response[0].description);
            $('#itemPhoto').attr("src", "images/uploaded/" + response[0].photoName);
        }
    });
})

// Request Exchange
$('#submitConfirmExchange').click(function () {

    var item_toExchange_id = $('#item_toExchange_id').text().trim();
    var owner_id = $('#owner_id').text().trim();
    var user_item_id = $('#selectUserItem').val().trim().split("_")[1];
    var message = $('#message').val().trim();

    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { item_toExchange_id: item_toExchange_id, user_item_id: user_item_id, owner_id: owner_id, message: message },
        success: function (response) {
            console.log(response);
            if (response[0]["response"] == "Inserted") {
                $('#messageModalTitle').text("Confirm");
                $('#messageContent').text("Your request is sent successfully.");
            }
            else if (response[0]["response"] == "Error") {
                $('#messageModalTitle').text("Error");
                $('#messageContent').text("Something went wrong. Try again.");
            }

        }
    });
})

// Populate Request Modal
$('.openRequestModal').click(function () {

    var requestId = $(this).attr('id').split("_")[1];
    $('#requestToApproveId').text(requestId);

    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { requestId: requestId },
        success: function (response) {

            $('#owned_itemName').text(response[0].ownedItem.itemName);
            $('#owned_dateUploaded').text(response[0].ownedItem.dateTime);
            $('#owned_itemCategoryName').text(response[0].ownedItem.categoryName);
            $('#owned_item_description').text(response[0].ownedItem.description);
            $('#owned_itemPhoto').attr("src", "images/uploaded/" + response[0].ownedItem.photoName);

            $('#offered_itemName').text(response[0].offeredItem.itemName);
            $('#offered_dateUploaded').text(response[0].offeredItem.dateTime);
            $('#offered_uploadedBy').text(response[0].offeredItem.uploadedBy);
            $('#offered_itemCategoryName').text(response[0].offeredItem.categoryName);
            $('#offered_item_description').text(response[0].offeredItem.description);
            $('#offered_itemPhoto').attr("src", "images/uploaded/" + response[0].offeredItem.photoName);
        }
    });
})

// Accept Request
$('#acceptRequest').click(function () {

    var requestToAcceptId = $('#requestToApproveId').text();

    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { requestToAcceptId: requestToAcceptId },
        success: function (response) {

            if (response[0]["response"] == "Success") {
                $('#messageModalTitle').text("Confirm");
                $('#messageContent').text("The request is accepted successfully.");
            }
            else {
                $('#messageModalTitle').text("Error");
                $('#messageContent').text("Something went wrong. Try again.");
            }

        }
    });
})

// Reject Request
$('#rejectRequest').click(function () {

    var requestToRejectId = $('#requestToApproveId').text();

    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { requestToRejectId: requestToRejectId },
        success: function (response) {

            if (response[0]["response"] == "Success") {
                $('#messageModalTitle').text("Confirm");
                $('#messageContent').text("The request is rejected successfully.");
            }
            else {
                $('#messageModalTitle').text("Error");
                $('#messageContent').text("Something went wrong. Try again.");
            }

        }
    });
})
