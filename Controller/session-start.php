<?php
  if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    $cookie_name = 'New Player1';
    $cookie_value = 0;  
  }
?>