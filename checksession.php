<?php
// Start the session
session_start();

// Check if the user is logged in by verifying if the session value is set
if (isset($_SESSION['identifiant'])) {
    // User is logged in
    echo "Welcome, " . $_SESSION['identifiant'];
} else {
    // User is not logged in
    echo "You are not logged in!";
}
?>