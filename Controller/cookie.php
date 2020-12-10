<?php
  $cookie_name = $_POST["userName"];
  $cookie_value = $_POST["highScore"];

  setcookie($cookie_name, $cookie_value, time() + (86400 * 31), "/"); // 86400 = 1 day
?>