$(document).ready(function () {
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
        data: { addItemMessage: 'addItemMessage' }
    });
})

$('#editItemModal').on('hidden.bs.modal', function () {
    $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        dataType: 'json',
        data: { editItemMessage: 'editItemMessage' }
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