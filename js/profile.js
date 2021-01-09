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
            { "orderable": false, "targets": [2, 6] }
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