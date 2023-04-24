<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert user data into the database (updates rows that already exist with new email/password)
$sql = "INSERT INTO USERS (email, password) VALUES
 ('test@example.com', 'Testing1234!'), 
 ('test2@example.com', 'TestingPassword2!')
 ON DUPLICATE KEY UPDATE password=VALUES(password), email=VALUES(email)";

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Check if user submitted login form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    
    // Query the database for the user
    $sql = "SELECT * FROM USERS WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    // Check if user was found
    if ($result->num_rows > 0) {
        // User was found, set session variables and redirect
        $_SESSION['email'] = $email;
        header("Location: blog.php");
    } else {
        // User not found, display error message
        header("Location: loginErrorPage.html");
    }
}

$conn->close();

//TODO
// - HASH PASSWORD.

?>


