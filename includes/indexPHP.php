<!-- Search -->
<?php 

  if (isset($_POST["submitSearch"])) {
    redirect_to("items.php?search=" . $_POST["search"] . "&page=1");
  }

?>

<!-- Consent Cookies -->
<?php 

  if (isset($_POST["consentCookiesAllow"])) {
    $_SESSION["consentCookies"] = 1;
  }
  if (isset($_POST["consentCookiesDeny"])) {
    $_SESSION["consentCookies"] = 0;
  }

?>
