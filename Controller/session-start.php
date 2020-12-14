<?php
  if(!isset($_SESSION)) {
    session_start();
    $cookie_name = 'New Player';
    $cookie_value = 0;  
  }
?>