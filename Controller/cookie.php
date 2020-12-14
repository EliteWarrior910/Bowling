<?php
  if(isset($_POST['name'])) {
    $cookie_name = $_POST['name'];
    $cookie_value = $_POST['score'];
    setcookie($cookie_name, $cookie_value); // 86400 = 1 day : , time() + (86400 * 31)
    header("Location: ../gameIndex.php");
  }
?>