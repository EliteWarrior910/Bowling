<?php
  $_POST['name'] = $cookie_name;
  $_POST['score'] = $cookie_value;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 31), "/"); // 86400 = 1 day

?>