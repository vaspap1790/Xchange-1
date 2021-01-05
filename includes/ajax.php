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

?>