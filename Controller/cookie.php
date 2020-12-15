<?php
  if(isset($_POST['name'])){
    $cookie_name = $_POST['name'];
    $cookie_value = $_POST['score'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "../"); // 86400 = 1 day : 
  }
?>