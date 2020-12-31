<?php

  session_start();

  function errorLoginMessage(){
    if(isset($_SESSION["loginErrorMessage"])){
      
      $Output = "<div class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["loginErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["loginErrorMessage"] = null;
      $_SESSION["loginMessage"] = "true";

      return $Output;
    }
  }

  function errorRegisterMessage(){
    if(isset($_SESSION["registerErrorMessage"])){

      $Output = "<div class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["registerErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["registerErrorMessage"] = null;
      $_SESSION["registerMessage"] = true;

      return $Output;
    }
  }
  
  function successRegisterMessage(){
    if(isset($_SESSION["registerSuccessMessage"])){

      $Output = "<div class=\"alert alert-success\">" ;
      $Output .= htmlentities($_SESSION["registerSuccessMessage"]);
      $Output .= "</div>";

      $_SESSION["registerSuccessMessage"] = null;
      $_SESSION["registerMessage"] = true;
      
      return $Output;
    }
  }

  function errorSettingsMessage(){
    if(isset($_SESSION["settingsErrorMessage"])){

      $Output = "<div class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["settingsErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["settingsErrorMessage"] = null;
      $_SESSION["settingsMessage"] = true;

      return $Output;
    }
  }
  
  function successSettingsMessage(){
    if(isset($_SESSION["settingsSuccessMessage"])){

      $Output = "<div class=\"alert alert-success\">" ;
      $Output .= htmlentities($_SESSION["settingsSuccessMessage"]);
      $Output .= "</div>";

      $_SESSION["settingsSuccessMessage"] = null;
      $_SESSION["settingsMessage"] = true;
      
      return $Output;
    }
  }

?>
