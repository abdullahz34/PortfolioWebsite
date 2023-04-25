<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/blog.css">
    <link rel="stylesheet" href="CSS/mobile.css">
    <!-- <script src="JS/blogButtons.js"></script> -->

    <title>Abdullah's Blog</title>
    <script src="https://kit.fontawesome.com/89bffb3f08.js" crossorigin="anonymous"></script>

</head>

<body>
    <header class="container">
        <a href="index.html" class="logo">Abdullah<span>Zulfiqar</span></a>
        <nav>
            <ul id="sideMenu">
                <li>
                    <a href="index.php#about">About Me</a>
                </li>
                <li>
                    <a href="index.php#aboutSection" onclick="opentab('experience','expT')">Experience</a>
                </li>
                <li>
                    <a href="index.php#aboutSection" onclick="opentab('skills','skillsT')">Skills</a>
                </li>
                <li>
                    <a href="index.php#aboutSection" onclick="opentab('education','eduT')">Education</a>
                </li>
                <li>
                    <a href="portfolio.php">Portfolio</a>
                </li>
                <li>
                    <a href="index.php#contact">Contact</a>
                </li>
                <li>
                    <a href="#">Blog</a>
                </li>
                <li>
                <?php
                session_start();
                if(isset($_SESSION['email'])) {
                    echo '<a href="logout.php">Logout</a>';
                } else {
                    echo '<a href="login.html">Login</a>';
                }
                ?>
                </li>
                <i class="fa-solid fa-xmark" onclick="closeMenu()"></i>
            </ul>
            <i class="fa-solid fa-bars" onclick="openMenu()"></i>
        </nav>
    </header>

    <div id="blog">
        <div class="container">
            
            <aside>
                <?php
                if(isset($_SESSION['email'])) {
                    echo "<h1 style='color: green;'>Logged in successfully! Welcome " . $_SESSION['email'] . "!</h1>";
                }
                ?>
            </aside>

            <div class="title">
                <h1>My Blog</h1>
            </div>

            <?php
            if (isset($_SESSION['email'])) {
            ?>
            <section>
                <div class="addblog">
                    <h2>Add blog</h2>
                    <form action="addpost.php" method="post">
                        <input type="text" name="title" placeholder="Title" minlength="3" maxlength="50" required>
                        <textarea name="description" rows="6" placeholder="Your Message" minlength="10" maxlength="1000" required></textarea>
                        <div class="buttons">
                            <button name="postBlog" id="postBtn" type="submit" class="btn" onclick="postButton(event)">Post</button>
                            <button type="submit" class="btn" id="clearBtn" onclick="clearButton()">Clear</button>
                        </div>
                    </form>
                </div>
            </section>
            <?php }?>

            <form method="post">
                <label for="month-filter">Filter by months:</label>
                <select name="month-filter" id="month-filter">
                    <option value="">select month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <button type="submit">Filter</button>
            </form>


            <section>
                <div class="blog-container ">
                <?php include "addpost.php" ?>
                </div>
            </section>

            <!-- <section>
                <div class="blog-container ">
                    <article>
                        <p class="blog-date "><i class="fa-regular fa-clock "></i> 26th December 2018, 5:49 UTC</p>
                        <h2 class="blog-title ">Title of Blog Post Goes Here</h2>
                        <p class="blog-text ">Text content of blog post goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac dolor vel risus commodo sollicitudin ac eu mi. Sed vestibulum arcu eu turpis commodo feugiat. Donec quis quam vitae ex suscipit
                            convallis sit amet eu velit. Nam sed mauris vel nunc egestas eleifend. Nulla facilisi. Nulla auctor lectus vel felis luctus tincidunt.</p>
                        <div class="blog-line "></div>
                    </article>
                </div>
            </section> -->

        </div>
    </div>


    <footer>
        <p>Copyright © Abdullah Zulfiqar</p>
    </footer>

    <script src="JS/blogButtons.js"></script>


    <script>
        // show / close hamburger menu js

        var sideMenu = document.getElementById("sideMenu");

        function openMenu() {
            sideMenu.style.right = "0";
        }

        function closeMenu() {
            sideMenu.style.right = "-200px";
        }
    </script>


</body>

</html>