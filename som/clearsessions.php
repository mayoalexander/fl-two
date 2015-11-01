<?php
/**
 * @file
 * Clears PHP sessions and redirects to the connect page.
 */
 
/* Load and clear sessions */
session_start();
session_destroy();
 
/* Redirect to page with the connect to Twitter option. */
$redirect = $_GET['redirect'];
header('Location: ./connect.php');
