<?php session_start(); ?>
<?php require_once("db.php"); ?>

<?php

    if(isset($_POST['loginMessage']) ) { 
        $_SESSION['loginMessage'] = false; 
    }

    if(isset($_POST['registerMessage']) ) { 
        $_SESSION['registerMessage'] = false; 
    }

    if(isset($_POST['settingsMessage']) ) { 
        $_SESSION['settingsMessage'] = false; 
    }

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
?>