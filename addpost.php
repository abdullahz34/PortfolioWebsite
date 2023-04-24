<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogpostdetails";

// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["newBlogPost"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql = "INSERT INTO blogposts(title, description, timestamp) VALUES ('$title', '$description', current_timestamp())";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        header("Location: blog.php");
    }
    
}

$conn->close();

?>