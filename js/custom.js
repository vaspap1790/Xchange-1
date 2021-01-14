$(document).ready(function () {

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
            },
            'termsCheck[]': {
                required: true
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
            },
            'termsCheck[]': {
                required: "Please Agree to our Terms and Conditions to register"
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
            },
            sDescription: {
                maxlength: 499
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
            },
            sDescription: {
                maxlength: "Description must be 500 characters long maximum"
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

    // Populate countries in settings modal
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { getCountry: 'getCountry' },
        success: function (response) {
            var userCountry = response[0].country;
            $.ajax({
                type: "GET",
                url: "https://restcountries.eu/rest/v2/all?fields=name",
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj) {
                        var div_data = "<option value='" + obj.name + "'>" + obj.name + "</option>";
                        $(div_data).appendTo('#country');
                    });
                    $('#country option[value="' + userCountry + '"]').attr('selected', 'selected');
                }
            });
        }
    });

});

// Clear Upload Photo
$('#clearUserPhoto').click(function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { setSettingsMessage: 'setSettingsMessage' }
    });
    $('#imageSelect').replaceWith($('#imageSelect').val('').clone(true));
});

// Preview Upload Photo
function previewUserPhoto(input) {

    if (input.files && input.files[0]) {

        if (input.files[0].size < 3000000) {

            if (input.files[0].type == "image/png" || input.files[0].type == "image/jpeg") {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#photoUserPreview')
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                    $('#photoUserPreview').show();
                };
                reader.readAsDataURL(input.files[0]);

                $('#userAccepted').removeClass("error");
                $('#submitSettings').prop("disabled", false);
                $('#clearUserPhoto').prop("disabled", false);

            } else {
                $('#userAccepted').addClass("error");
                $('#submitSettings').prop("disabled", true);
                $('#clearUserPhoto').prop("disabled", false);
            }

        } else {
            $('#userAccepted').addClass("error");
            $('#submitSettings').prop("disabled", true);
            $('#clearUserPhoto').prop("disabled", false);
        }

    }
}

// Unset session variables
$('#loginModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { loginMessage: 'loginMessage' }
    });
    $('#loginMessage').remove();
})

$('#registerModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { registerMessage: 'registerMessage' }
    });
    $('#registerMessage').remove();
})

$('#settingsModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { unSetSettingsMessage: 'unSetSettingsMessage' }
    });
    $('#settingsMessage').remove();
})

$('#requestModal').on('hidden.bs.modal', function () {
    $('#acceptRequest').hide();
    $('#rejectRequest').hide();
})

$('#messageModal').on('hidden.bs.modal', function () {
    location.reload();
})

$('#addItemModal').on('hidden.bs.modal', function () {
    $('#addItemMessage').remove();
})

$('#editItemModal').on('hidden.bs.modal', function () {
    $('#editItemMessage').remove();
})

$('#ratingModal').on('hidden.bs.modal', function () {
    $('#ratingMessage').remove();
})


// Item modal
$('.openItemModal').click(function () {

    var fetch_item_id = $(this).attr('id').split("_")[1];
    console.log(fetch_item_id);

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
            $('#itemCategoryName').attr("href", "items.php?categoryId=" + response[0].categoryId + "&page=1");
            $('#dateUploaded').text(response[0].dateTime);
            $('#uploadedBy').text(response[0].username);
            $('#uploadedBy').attr("href", "profile.php?username=" + response[0].username);
            $('#item_description').text(response[0].description);
            $('#itemPhoto').attr("src", "images/uploaded/" + response[0].photoName);
        }
    });
})

// Request Exchange
$('#confirmExchange').click(function () {

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
            if (response[0]["response"] == "Success") {
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

            if (response[0].message != null) {
                $('#fetch_message').text('"' + response[0].message + '"');
            } else {
                $('#fetch_message').text('Nothing');
            }

            if (response[0].mode == "action") {
                $('#acceptRequest').show();
                $('#rejectRequest').show();
            }

            $('#owned_itemName').text(response[0].ownedItem.itemName);
            $('#owned_dateUploaded').text(response[0].ownedItem.dateTime);
            $('#owned_itemCategoryName').text(response[0].ownedItem.categoryName);
            $('#owned_itemCategoryName').attr("href", "items.php?categoryId=" + response[0].ownedItem.categoryId + "&page=1");
            $('#owned_item_description').text(response[0].ownedItem.description);
            $('#owned_itemPhoto').attr("src", "images/uploaded/" + response[0].ownedItem.photoName);

            $('#offered_uploadedBy_header').text(response[0].offeredItem.uploadedBy);
            $('#offered_uploadedBy_header').attr("href", "profile.php?username=" + response[0].offeredItem.uploadedBy);
            $('#offered_itemName').text(response[0].offeredItem.itemName);
            $('#offered_dateUploaded').text(response[0].offeredItem.dateTime);
            $('#offered_uploadedBy').text(response[0].offeredItem.uploadedBy);
            $('#offered_uploadedBy').attr("href", "profile.php?username=" + response[0].offeredItem.uploadedBy);
            $('#offered_itemCategoryName').text(response[0].offeredItem.categoryName);
            $('#offered_itemCategoryName').attr("href", "items.php?categoryId=" + response[0].offeredItem.categoryId + "&page=1");
            $('#offered_item_description').text(response[0].offeredItem.description);
            $('#offered_itemPhoto').attr("src", "images/uploaded/" + response[0].offeredItem.photoName);
        }
    });
})

// Accept Request
$('#confirmAccept').click(function () {

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
$('#confirmReject').click(function () {

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

// Delete Item
$('#deleteItem').click(function () {

    var deleteItemId = $('#deleteItemId').val().trim();
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { deleteItemId: deleteItemId },
        success: function (response) {

            if (response[0]["response"] == "Success") {
                $('#messageModalTitle').text("Confirm");
                $('#messageContent').text("Item deleted successfully.");
            }
            else {
                $('#messageModalTitle').text("Error");
                $('#messageContent').text("Something went wrong. Try again.");
            }

        }
    });
})


function toggleFavorite(itemId, userId, action) {

    const whiteHeart = '\u2661';
    const blackHeart = '\u2665';

    if (action == "favorite") {

        $("#heart" + itemId).text(blackHeart);
        $("#heart" + itemId).css({
            fontSize: 35
        });
        $("#heart" + itemId).attr("onclick", "toggleFavorite(" + itemId + "," + userId + "," + "'unfavorite')");

        $.ajax({
            type: "POST",
            url: 'includes/ajax.php',
            dataType: 'json',
            data: { favorite: 'favorite', itemId: itemId, userId: userId }
        });

    } else if (action == "unfavorite") {

        $("#heart" + itemId).text(whiteHeart);
        $("#heart" + itemId).css({
            fontSize: 35
        });
        $("#heart" + itemId).attr("onclick", "toggleFavorite(" + itemId + "," + userId + "," + "'favorite')");

        $.ajax({
            type: "POST",
            url: 'includes/ajax.php',
            dataType: 'json',
            data: { unfavorite: 'unfavorite', itemId: itemId, userId: userId }
        });

    }
    location.reload();
}