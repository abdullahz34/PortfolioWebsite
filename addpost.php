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
    // header("Location: blog.php");
    echo '<script>window.location.href = "blog.php";</script>';
  }
}

// PHP for preview button
if (isset($_POST["previewPost"])) {
  $title = $_POST["title"];
  $description = $_POST["description"];

  $previewTitle = $title . " [PREVIEW]";
  $previewDescription = $description . " [PREVIEW]";

  // Display preview post
  echo '<article>';
  echo '<p class="blog-date"><i class="fa-regular fa-clock"></i> ' . date("jS F Y, g:i A T") . '</p>';
  echo '<h2 class="blog-title">' . $previewTitle . '</h2>';
  echo '<p class="blog-text">' . $previewDescription . '</p>';
  echo '<div class="blog-line"></div>';
  echo '</article>';

// Confirm whether to post preview or not

echo '<script>document.addEventListener("DOMContentLoaded", function() {
  setTimeout(function() {
    if(confirm("Would you like to post the preview or delete it?")) {
      window.location.href = "blog.php?preview=accepted&title='.urlencode($title).'&description='.urlencode($description).'";
    } else {
      window.location.href = "blog.php";
    }
  }, 1000); // Wait for 1 second
});</script>';



}

if (isset($_GET["preview"]) && $_GET["preview"] === "accepted") {
  $title = urldecode($_GET["title"]);
  $description = urldecode($_GET["description"]);

  $sql = "INSERT INTO blogposts(title, description, timestamp) VALUES ('$title', '$description', current_timestamp())";

  if ($conn->query($sql) !== TRUE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
  } else {
    // header("Location: blog.php");
    echo '<script>window.location.href = "blog.php";</script>';
  }
}






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