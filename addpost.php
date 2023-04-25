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

if (isset($_POST["postBlog"])) {
  $title = $_POST["title"];
  $description = $_POST["description"];

  $sql = "INSERT INTO blogposts(title, description, timestamp) VALUES ('$title', '$description', current_timestamp())";

  if ($conn->query($sql) !== TRUE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
  } else {
      header("Location: blog.php");
  }
}

// // Retrieve all blog posts from database
// $sql = "SELECT * FROM blogposts";
// $result = mysqli_query($conn, $sql);

// Retrieve all blog posts from database or filter by month
if (isset($_POST["month-filter"]) && $_POST["month-filter"] != "") {
  $month_filter = $_POST["month-filter"];
  $sql = "SELECT * FROM blogposts WHERE MONTH(timestamp) = $month_filter";
} else {
  $sql = "SELECT * FROM blogposts";
}
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Store data in an array
  $blogposts = array();
  while($row = mysqli_fetch_assoc($result)) {
    $blogposts[] = $row;
  }
  
  // Sort blog posts by timestamp in descending order
  usort($blogposts, function($a, $b) {
    return strtotime($b['timestamp']) - strtotime($a['timestamp']);
  });

  // print_r($blogposts);

  // Output data of each row
  foreach($blogposts as $row) {
    // Display blog post
    echo '<article>';
    echo '<p class="blog-date"><i class="fa-regular fa-clock"></i> ' . date("jS F Y, g:i A T", strtotime($row["timestamp"])) . '</p>';
    echo '<h2 class="blog-title">' . $row["title"] . '</h2>';
    echo '<p class="blog-text">' . $row["description"] . '</p>';
    echo '<div class="blog-line"></div>';
    echo '</article>';
  }
} else {
    // // If user is not already logged in, redirect to login.html and inform that there are 0 blog entries
    // if (!isset($_SESSION['email'])) {
    //     echo '<script>alert("There are 0 entries in the blog, please login to post."); window.location.href = "login.html";</script>';
    // }
    echo '0 blog results found.';
}


$conn->close();

?>