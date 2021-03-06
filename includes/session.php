<?php session_start(); ?>

<!-- Messages -->
<?php

  function errorLoginMessage(){
    if(isset($_SESSION["loginErrorMessage"])){
      
      $Output = "<div id='loginMessage' class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["loginErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["loginErrorMessage"] = null;
      $_SESSION["loginMessage"] = "true";

      return $Output;
    }
  }

  function errorRegisterMessage(){
    if(isset($_SESSION["registerErrorMessage"])){

      $Output = "<div id='registerMessage' class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["registerErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["registerErrorMessage"] = null;
      $_SESSION["registerMessage"] = true;

      return $Output;
    }
  }
  
  function successRegisterMessage(){
    if(isset($_SESSION["registerSuccessMessage"])){

      $Output = "<div id='registerMessage' class=\"alert alert-success\">" ;
      $Output .= htmlentities($_SESSION["registerSuccessMessage"]);
      $Output .= "</div>";

      $_SESSION["registerSuccessMessage"] = null;
      $_SESSION["registerMessage"] = true;
      
      return $Output;
    }
  }

  function errorSettingsMessage(){
    if(isset($_SESSION["settingsErrorMessage"])){

      $Output = "<div id='settingsMessage' class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["settingsErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["settingsErrorMessage"] = null;
      $_SESSION["settingsMessage"] = true;

      return $Output;
    }
  }
  
  function successSettingsMessage(){
    if(isset($_SESSION["settingsSuccessMessage"])){

      $Output = "<div id='settingsMessage' class=\"alert alert-success\">" ;
      $Output .= htmlentities($_SESSION["settingsSuccessMessage"]);
      $Output .= "</div>";

      $_SESSION["settingsSuccessMessage"] = null;
      $_SESSION["settingsMessage"] = true;
      
      return $Output;
    }
  }

  function errorAddItemMessage(){
    if(isset($_SESSION["addItemErrorMessage"])){

      $Output = "<div id='addItemMessage' class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["addItemErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["addItemErrorMessage"] = null;
      $_SESSION["addItemMessage"] = true;

      return $Output;
    }
  }
  
  function successAddItemMessage(){
    if(isset($_SESSION["addItemSuccessMessage"])){

      $Output = "<div id='addItemMessage' class=\"alert alert-success\">" ;
      $Output .= htmlentities($_SESSION["addItemSuccessMessage"]);
      $Output .= "</div>";

      $_SESSION["addItemSuccessMessage"] = null;
      $_SESSION["addItemMessage"] = true;
      
      return $Output;
    }
  }

  function errorEditItemMessage(){
    if(isset($_SESSION["editItemErrorMessage"])){

      $Output = "<div id='editItemMessage' class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["editItemErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["editItemErrorMessage"] = null;
      $_SESSION["editItemMessage"] = true;

      return $Output;
    }
  }
  
  function successEditItemMessage(){
    if(isset($_SESSION["editItemSuccessMessage"])){

      $Output = "<div id='editItemMessage' class=\"alert alert-success\">" ;
      $Output .= htmlentities($_SESSION["editItemSuccessMessage"]);
      $Output .= "</div>";

      $_SESSION["editItemSuccessMessage"] = null;
      $_SESSION["editItemMessage"] = true;
      
      return $Output;
    }
  }

  function errorRatingMessage(){
    if(isset($_SESSION["ratingErrorMessage"])){

      $Output = "<div id='ratingMessage' class=\"alert alert-danger\">" ;
      $Output .= htmlentities($_SESSION["ratingErrorMessage"]);
      $Output .= "</div>";

      $_SESSION["ratingErrorMessage"] = null;
      $_SESSION["ratingMessage"] = true;

      return $Output;
    }
  }
  
  function successRatingMessage(){
    if(isset($_SESSION["ratingSuccessMessage"])){

      $Output = "<div id='ratingMessage' class=\"alert alert-success\">" ;
      $Output .= htmlentities($_SESSION["ratingSuccessMessage"]);
      $Output .= "</div>";

      $_SESSION["ratingSuccessMessage"] = null;
      $_SESSION["ratingMessage"] = true;
      
      return $Output;
    }
  }

?>