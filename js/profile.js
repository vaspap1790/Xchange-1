$(document).ready(function () {

    // Initialize Requests Data Table
    $('#requestsDataTable').DataTable({
        responsive: true,
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            { "orderData": 0, "targets": 3 },
            { "className": "dt-center", "targets": "_all" },
            { "orderable": false, "targets": [2, 6] },
            { responsivePriority: 1, targets: [1, 6] },
            { responsivePriority: 2, targets: 5 }
        ],
        "language": {
            "emptyTable": "No Requests"
        }
    });
});

// Unset session variables
$('#addItemModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { unSetAddItemMessage: 'unSetAddItemMessage' }
    });
})

$('#editItemModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { unSetEditItemMessage: 'unSetEditItemMessage' }
    });
})

$('#ratingModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { ratingMessage: 'ratingMessage' }
    });
})

// Clear Upload Photo
$('#clearAddItem').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: {
            setAddItemMessage: 'setAddItemMessage',
            newItemName: '"' + $('#item_name').val() + '"',
            newItemCategoryId: '"' + $('#selectItemCategory').val() + '"',
            newItemDescription: '"' + $('#iDescription').val() + '"'
        }
    });
    location.reload();
});

$('#clearEditItem').click(function (e) {
    e.preventDefault();
    var itemId = $('#editItemId').val();
    console.log(itemId);
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { setEditItemMessage: 'setEditItemMessage', editedItemId: '"' + itemId + '"' }
    });
    location.reload();
});

// Preview Upload Photo
function previewAddItemPhoto(input) {

    if (input.files && input.files[0]) {

        if (input.files[0].size < 3000000) {

            if (input.files[0].type == "image/png" || input.files[0].type == "image/jpeg") {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#photoAddItemPreview')
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                    $('#photoAddItemPreview').show();
                };
                reader.readAsDataURL(input.files[0]);

                $('#addItemAccepted').removeClass("error");
                $('#addItem').prop("disabled", false);
                $('#clearAddItem').prop("disabled", false);

            } else {
                $('#addItemAccepted').addClass("error");
                $('#addItem').prop("disabled", true);
                $('#clearAddItem').prop("disabled", false);
            }

        } else {
            $('#addItemAccepted').addClass("error");
            $('#addItem').prop("disabled", true);
            $('#clearAddItem').prop("disabled", false);
        }

    }
}

function previewEditItemPhoto(input) {

    if (input.files && input.files[0]) {

        if (input.files[0].size < 3000000) {

            if (input.files[0].type == "image/png" || input.files[0].type == "image/jpeg") {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#photoEditItemPreview')
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                    $('#photoEditItemPreview').show();
                };
                reader.readAsDataURL(input.files[0]);

                $('#editItemAccepted').removeClass("error");
                $('#editItem').prop("disabled", false);
                $('#clearEditItem').prop("disabled", false);

            } else {
                $('#editItemAccepted').addClass("error");
                $('#editItem').prop("disabled", true);
                $('#clearEditItem').prop("disabled", false);
            }

        } else {
            $('#editItemAccepted').addClass("error");
            $('#editItem').prop("disabled", true);
            $('#clearEditItem').prop("disabled", false);
        }

    }
}

// Populate Delete Modal
$('.openDeleteItemModal').click(function () {
    var deleteItemId = $(this).attr('id').split("_")[1];
    $('#deleteItemId').val(deleteItemId);
})

// Populate Edit Item Modal
$('.openEditItemModal').click(function (itemId) {

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

// Populate Edit Item Modal function
function populateEditItemModal(itemId) {

    var editItemId = itemId;
    $('#editItemId').val(itemId);

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
    })
}