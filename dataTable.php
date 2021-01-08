<?php require_once("includes/db.php"); ?>
<?php require_once("includes/session.php"); ?>


<?php
    if(isset($_POST['dataTable'])) { 
        header('Content-Type: application/json');

        global $ConnectingDB;
        $response = array();

        $sqlFetchRequests = "SELECT r.requestId as requestId, r.dateTime_ as requestDateTime, r.requesterId as requesterId,
        u.username as requester, i.name as requestedItemName, p.name as requestedItemPhotoName, r.status as status 
        FROM request r 
        INNER JOIN user u ON r.requesterId = u.userId 
        INNER JOIN item i ON i.itemId = r.itemRequestedId
        INNER JOIN photo p ON i.itemId = p.itemId
        WHERE r.ownerId =". $_SESSION["userId"] ." ORDER BY r.requestId desc";                                               

        $stmtFetchRequests = $ConnectingDB->query($sqlFetchRequests);
        $fetchRequestsRows = $stmtFetchRequests->fetchAll();

        foreach ($fetchRequestsRows as $row) {
            $item = array(
            'requestId'    => $row["requestId"],
            'name'         => $row["requestedItemName"],
            'photoName'    => $row["requestedItemPhotoName"],
            'dateTime'     => $row["requestDateTime"],
            'requester'    => $row["requester"],
            'status'       => $row["status"]
            );
            $response["data"][] = $item;
        }

        echo json_encode($response);
        exit;
    }
?>