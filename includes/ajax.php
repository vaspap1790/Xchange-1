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

        $sql = "INSERT INTO request(dateTime_, itemOfferedId, itemRequestedId, requesterId, ownerId, status) 
        VALUES('" . $dateTime . "',". $_POST['user_item_id'] . "," . $_POST['item_toExchange_id'] 
        . "," . $_SESSION['userId'] . "," . $_POST['owner_id'] . ",'pending')";
        $execute = $ConnectingDB->query($sql);  

        $_POST['item_toExchange_id'] = null;
        $_POST['user_item_id']       = null;
        $_POST['owner_id']           = null;
        $_POST['message']            = null;

        if ($execute){
            $response["response"] = "Inserted";
            echo json_encode(array($response));
            exit;

        }else{
            $response["response"]         = "Error";
            echo json_encode(array($response));
            exit;
        }

    }

    //Request
    if(isset($_POST['requestId']) ) { 

        header('Content-Type: application/json');
        global $ConnectingDB;
        $response = array();
        $ownedItem = array();
        $offeredItem = array();

        $sqlOwnedItem = "SELECT i.name as itemName, i.description as description,
        i.dateTime_ as dateTime, c.name as categoryName, p.name as photoName
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
        $ownedItem["categoryName"]   = $ownedItemRows["categoryName"];
        $ownedItem["photoName"]      = $ownedItemRows["photoName"];

        $sqlOfferedItem = "SELECT i.name as itemName, i.description as description,
        i.dateTime_ as dateTime, c.name as categoryName, u.username as username,
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
        $offeredItem["categoryName"]   = $offeredItemRows["categoryName"];
        $offeredItem["uploadedBy"]     = $offeredItemRows["username"];
        $offeredItem["photoName"]      = $offeredItemRows["photoName"];

        $response["ownedItem"] = $ownedItem;
        $response["offeredItem"] = $offeredItem;

        echo json_encode(array($response));
        exit;

    }
?>