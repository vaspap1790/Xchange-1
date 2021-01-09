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

    $("#team-slider").owlCarousel({ //owlCarousel settings
        items: 5, //by default there are 3 slides display.
        autoplay: true, //the slides will change automatically.
        smartSpeed: 700, //speed of changing wil be 700
        loop: true, //infinite loop; after the last slide, first slide starts
        autoplayHoverPause: true, //when you put mouse over Carousel, slide changing will stop
        responsive: { //responsiveness as screen size changes
            // min-width: 0px
            0: {
                items: 1 //on devices with width 0 to 579px show 1 slide
            },
            // min-width: 579px
            576: {
                items: 3 //on devices with width 579px to 768px show show 2 slides
            },
            // min-width: 768px
            768: {
                items: 5 //on devices with width 768px and above show 3 slides 
            }
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

$('#messageModal').on('hidden.bs.modal', function () {
    location.reload();
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

// Populate Delete Modal
$('.openDeleteItemModal').click(function () {
    var deleteItemId = $(this).attr('id').split("_")[1];
    $('#deleteItemId').val(deleteItemId);
})

// Populate EditItem Modal
$('.openEditItemModal').click(function () {

    var editItemId = $(this).attr('id').split("_")[1];
    $('#editItemId').val(editItemId);

    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { editItemId: editItemId },
        success: function (response) {

            $('#edit_item_name').val(response[0].name);
            $('#edit_selectItemCategory').val(response[0].categoryId);
            $('#edit_iDescription').val(response[0].description);
            $('#editItemImage').attr("src", "images/uploaded/" + response[0].photoName);
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


