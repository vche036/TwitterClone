<?php
/**
 *  Logout the user and redirect to index
 */
session_start();

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header("Location: index.php");
?>