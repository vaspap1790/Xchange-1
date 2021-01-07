<!-- Search -->
<?php 

  if (isset($_POST["submitSearch"])) {
    redirect_to("items.php?search=" . $_POST["search"] . "&page=1");
  }

?>
