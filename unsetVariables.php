<?php require_once("includes/sessions.php"); ?>

<?php

    if(isset($_POST['loginMessage']) ) { 
        $_SESSION['loginMessage'] = false; 
    }

    if(isset($_POST['registerMessage']) ) { 
        $_SESSION['registerMessage'] = false; 
    }

?>