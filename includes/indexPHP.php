<!-- Search -->
<?php 

  if (isset($_POST["submitSearch"])) {
    redirect_to("items.php?search=" . $_POST["search"] . "&page=1");
  }

?>

<!-- Consent Cookies -->
<?php 

  if (isset($_POST["consentCookiesAllow"])) {
    $cookie_name   = "consentCookies";
    $cookie_value  = 1;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3), "/"); // 86400 = 1 day
    $_SESSION["justAnweredCookies"] = 1;
  }
  if (isset($_POST["consentCookiesDeny"])) {
    $cookie_name   = "consentCookies";
    $cookie_value  = 0;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3), "/"); // 86400 = 1 day
    $_SESSION["justAnweredCookies"] = 1;
  }

?>
