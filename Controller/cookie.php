<?php
$cookie_name = "userName";
$cookie_value = "highScore";
setcookie($cookie_name, $cookie_value, time() + (86400 * 31), "/"); // 86400 = 1 day
?>