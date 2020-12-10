<?php
  $cookie_name = $_POST["name"];
  $cookie_value = $_POST["score"];

  setcookie($cookie_name, $cookie_value, time() + (86400 * 31), "/"); // 86400 = 1 day
?>