<?php
session_start();

// Check if a session variable exists
if (isset($_SESSION['cust_id'])) {
    // Variable exists, do something
    $user_id = $_SESSION['cust_id'];
} else {
    // Variable does not exist
    
}
?>