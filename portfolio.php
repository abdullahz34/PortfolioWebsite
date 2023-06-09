<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/mobile.css">
    <title>Abdullah's Portfolio</title>
    <script src="https://kit.fontawesome.com/89bffb3f08.js" crossorigin="anonymous"></script>

</head>

<body>
    <header class="container">
        <a href="index.php" class="logo">Abdullah<span>Zulfiqar</span></a>
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
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="index.php#contact">Contact</a>
                </li>
                <li>
                    <a href="blog.php">Blog</a>
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

    <div id="portfolio">
        <div class="container">
            <h1 class="title">My Portfolio</h1>
            <div class="work-list">
                <div class="work">
                    <figure>
                        <img src="Images/DAT.jpg">
                    </figure>
                    <div class="layer">
                        <h3>Digital Asset Tag (Hackathon Project)</h3>
                        <p>DAT(Digital Asset Tag) is a product that replaces current receipts which contributes in reduces in environmental waste and fraud. DAT communicates with an Arduino RFID that reads a tag, using Rust CLI, it mints an NFT(FA2 standard)
                            and writes to the tag. The tag can be scanned by RFID again to display relevant metadata to frontend.
                        </p>
                        <a href="https://github.com/abdullahz34/dat-hackathon-project"><i class="fa-solid fa-up-right-from-square"></i></a>
                    </div>
                </div>
                <div class="work">
                    <figure>
                        <img src="Images/JPMC_project.png">
                    </figure>
                    <div class="layer">
                        <h3>Live Data Graph</h3>
                        <p>During the JPMC Virtual Software Engineering Internship, I modified a client-side web to display a graph that updates as it recieves data from the server. It tracks and displays ratio of two stock prices, upper, lower bound and
                            generates alert if bounds are crossed. Collectively, this enables traders to identify trading opportunities.</p>
                        <a href="https://github.com/abdullahz34/jpmc-task-3"><i class="fa-solid fa-up-right-from-square"></i></a>
                    </div>
                </div>
                <div class="work">
                    <figure>
                        <img src="Images/C++.jpg">
                    </figure>
                    <div class="layer">
                        <h3>Carpet Ordering Program</h3>
                        <p>A terminal program that takes user input to put an order for carpets and stores data into a 'order history' text file. Utilises Object Orientated Programming, file handling and strict input validation.</p>
                        <a href="https://github.com/abdullahz34/Coding-Projects/tree/main/Projects/C%2B%2B/Carpet%20Ordering%20Program"><i class="fa-solid fa-up-right-from-square"></i></a>
                    </div>
                </div>
            </div>
            <a href="https://github.com/abdullahz34" class="btn">My Github</a>
        </div>
    </div>

    <footer>
        <p>Copyright © Abdullah Zulfiqar</p>
    </footer>


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