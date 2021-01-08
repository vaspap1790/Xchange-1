<?php session_start(); ?>
<?php require_once("db.php"); ?>

<?php

    // Login
    if(isset($_POST['loginMessage']) ) { 
        $_SESSION['loginMessage'] = false; 
    }

    // Register
    if(isset($_POST['registerMessage']) ) { 
        $_SESSION['registerMessage'] = false; 
    }

    // Settings
    if(isset($_POST['settingsMessage']) ) { 
        $_SESSION['settingsMessage'] = false; 
    }

    // Favorite
    if(isset($_POST['favorite']) ) { 

        global $ConnectingDB;
        $sql = "INSERT INTO favorite(itemId, userId) VALUES(" . $_POST['itemId'] . "," . $_POST['userId'] . ")";
        $execute = $ConnectingDB->query($sql);  

        if ($execute){
            echo "Inserted";
        }else{
            $error = $ConnectingDB->error;
            echo $error;
        }

        $_POST['favorite'] = null;
        $_POST['itemId']   = null;
        $_POST['userId']   = null;
    }

    if(isset($_POST['unfavorite']) ) { 

        global $ConnectingDB;
        $sql = "DELETE FROM favorite WHERE itemId=" . $_POST['itemId'] . " AND userId=" . $_POST['userId'];
        $execute = $ConnectingDB->query($sql); 

        if ($execute){
            echo "Deleted";
        }else{
            $error = $ConnectingDB->error;
            echo $error;            
        }

        $_POST['favorite'] = null;
        $_POST['itemId']   = null;
        $_POST['userId']   = null;    
    }

    // Item fetch
    if(isset($_POST['fetch_item_id']) ) {
    
        global $ConnectingDB;
        $sql = "SELECT i.itemId as itemId, i.name as itemName, i.description as description,
        i.dateTime_ as dateTime, c.categoryId as categoryId, c.name as categoryName,
        u.userId as userId, u.username as username, p.name as photoName
        FROM item i
        INNER JOIN category c
        ON i.categoryId = c.categoryId
        INNER JOIN user u
        ON i.userId = u.userId
        INNER JOIN photo p
        ON i.itemId = p.itemId 
        WHERE i.itemId = " . $_POST['fetch_item_id'];

        $stmt = $ConnectingDB->query($sql);
        $dataRows = $stmt->fetch();
        $response = array();

        $response["itemId"]         = $dataRows["itemId"];
        $response["itemName"]       = $dataRows["itemName"];
        $response["description"]    = $dataRows["description"];
        $response["dateTime"]       = $dataRows["dateTime"];
        $response["categoryId"]     = $dataRows["categoryId"];
        $response["categoryName"]   = $dataRows["categoryName"];
        $response["userId"]         = $dataRows["userId"];
        $response["username"]       = $dataRows["username"];
        $response["photoName"]      = $dataRows["photoName"];

        header('Content-Type: application/json');
        echo json_encode(array($response));
        exit;
    
    }

    //Exchange
    if(isset($_POST['item_toExchange_id']) ) { 

        header('Content-Type: application/json');
        global $ConnectingDB;
        $response = array();

        date_default_timezone_set("Europe/Athens");
        $currentTime = time();
        $dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);

        $sql = "INSERT INTO request(dateTime_, itemOfferedId, itemRequestedId, requesterId, ownerId, status, message) 
        VALUES('" . $dateTime . "',". $_POST['user_item_id'] . "," . $_POST['item_toExchange_id'] 
        . "," . $_SESSION['userId'] . "," . $_POST['owner_id'] . ",'pending','". $_POST['message'] ."')";
        $execute = $ConnectingDB->query($sql);  

        $_POST['item_toExchange_id'] = null;
        $_POST['user_item_id']       = null;
        $_POST['owner_id']           = null;
        $_POST['message']            = null;

        if ($execute){
            $response["response"] = "Success";
            echo json_encode(array($response));
            exit;

        }else{
            $response["response"] = "Error";
            echo json_encode(array($response));
            exit;
        }

    }

    //Fetch Request
    if(isset($_POST['requestId']) ) { 

        header('Content-Type: application/json');
        global $ConnectingDB;
        $response = array();
        $ownedItem = array();
        $offeredItem = array();

        $sqlOwnedItem = "SELECT i.name as itemName, i.description as description, i.dateTime_ as dateTime, 
        c.name as categoryName, c.categoryId as categoryId, p.name as photoName, r.message as message
        FROM request r
        INNER JOIN item i
        ON r.itemRequestedId = i.itemId
        INNER JOIN category c
        ON i.categoryId = c.categoryId
        INNER JOIN photo p
        ON i.itemId = p.itemId 
        WHERE r.requestId = " . $_POST['requestId'];

        $stmtOwnedItem = $ConnectingDB->query($sqlOwnedItem);
        $ownedItemRows = $stmtOwnedItem->fetch();

        $ownedItem["itemName"]       = $ownedItemRows["itemName"];
        $ownedItem["description"]    = $ownedItemRows["description"];
        $ownedItem["dateTime"]       = $ownedItemRows["dateTime"];
        $ownedItem["categoryId"]     = $ownedItemRows["categoryId"];
        $ownedItem["categoryName"]   = $ownedItemRows["categoryName"];
        $ownedItem["photoName"]      = $ownedItemRows["photoName"];

        $message                     = $ownedItemRows["message"];

        $sqlOfferedItem = "SELECT i.name as itemName, i.description as description,
        i.dateTime_ as dateTime, c.name as categoryName, c.categoryId as categoryId, u.username as username,
        p.name as photoName
        FROM request r
        INNER JOIN item i
        ON r.itemOfferedId = i.itemId
        INNER JOIN category c
        ON i.categoryId = c.categoryId
        INNER JOIN user u
        ON r.requesterId = u.userId 
        INNER JOIN photo p
        ON i.itemId = p.itemId 
        WHERE r.requestId = " . $_POST['requestId'];

        $stmtOfferedItem = $ConnectingDB->query($sqlOfferedItem);
        $offeredItemRows = $stmtOfferedItem->fetch();

        $offeredItem["itemName"]       = $offeredItemRows["itemName"];
        $offeredItem["description"]    = $offeredItemRows["description"];
        $offeredItem["dateTime"]       = $offeredItemRows["dateTime"];
        $offeredItem["categoryId"]     = $offeredItemRows["categoryId"];
        $offeredItem["categoryName"]   = $offeredItemRows["categoryName"];
        $offeredItem["uploadedBy"]     = $offeredItemRows["username"];
        $offeredItem["photoName"]      = $offeredItemRows["photoName"];

        $response["ownedItem"]   = $ownedItem;
        $response["offeredItem"] = $offeredItem;
        $response["message"]     = $message;

        echo json_encode(array($response));
        exit;

    }

    //Accept Request
    if(isset($_POST['requestToAcceptId']) ) { 

        header('Content-Type: application/json');
        global $ConnectingDB;
        $response = array();

        try{
            $sqlFetchRequest   = "SELECT * FROM request WHERE requestId = " . $_POST['requestToAcceptId'];
            $stmtFetchRequest  = $ConnectingDB->query($sqlFetchRequest);
            $fetchedRequest    = $stmtFetchRequest->fetch();
    
            $ownerId           = $fetchedRequest["ownerId"];
            $itemRequestedId   = $fetchedRequest["itemRequestedId"];
            $requesterId       = $fetchedRequest["requesterId"];
            $itemOfferedId      = $fetchedRequest["itemOfferedId"];

            $sqlUpdateRequest = "UPDATE request SET status ='accepted' WHERE requestId =" . $_POST['requestToAcceptId'];
            $executeUpdateRequest = $ConnectingDB->query($sqlUpdateRequest);

            $sqlUpdateRequestedId = "UPDATE item SET userId ='$requesterId' WHERE itemId =" . $itemRequestedId;
            $executeUpdateRequestedId = $ConnectingDB->query($sqlUpdateRequestedId);

            $sqlUpdateOfferedId = "UPDATE item SET userId ='$ownerId' WHERE itemId =" . $itemOfferedId;
            $executeUpdateOfferedId = $ConnectingDB->query($sqlUpdateOfferedId);

            $response["response"] = "Success";
            echo json_encode(array($response));
            exit;

        }catch(Exception $e){
            $response["response"] = $e->getMessage();
            echo json_encode(array($response));
            exit;
        }
    }

    //Reject Request
    if(isset($_POST['requestToRejectId']) ) { 
        
        header('Content-Type: application/json');
        global $ConnectingDB;
        $response = array();

        try{

            $sqlUpdateRequest = "UPDATE request SET status ='rejected' WHERE requestId =" . $_POST['requestToRejectId'];
            $executeUpdateRequest = $ConnectingDB->query($sqlUpdateRequest);

            $response["response"] = "Success";
            echo json_encode(array($response));
            exit;

        }catch(Exception $e){
            $response["response"] = $e->getMessage();
            echo json_encode(array($response));
            exit;
        }
    }

    //Delete Item
    if(isset($_POST['deleteItemId']) ) { 
        
        header('Content-Type: application/json');
        global $ConnectingDB;
        $response = array();

        try{
            $sqlPhoto = "DELETE FROM photo WHERE itemId=" . $_POST['deleteItemId'];
            $executePhoto = $ConnectingDB->query($sqlPhoto);

            $sqlFavorite = "DELETE FROM favorite WHERE itemId=" . $_POST['deleteItemId'];
            $executesqlFavorite = $ConnectingDB->query($sqlFavorite);

            $sqlRequest = "DELETE FROM request WHERE itemOfferedId=" . $_POST['deleteItemId'] . " OR itemRequestedId=" . $_POST['deleteItemId'];
            $executeRequest = $ConnectingDB->query($sqlRequest);

            $sqlItem = "DELETE FROM item WHERE itemId=" . $_POST['deleteItemId'];
            $executesIItem = $ConnectingDB->query($sqlItem);

            $response["response"] = "Success";
            echo json_encode(array($response));
            exit;

        }catch(Exception $e){
            $response["response"] = $e->getMessage();
            echo json_encode(array($response));
            exit;
        }
    }

?>