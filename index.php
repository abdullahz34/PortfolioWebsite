<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/mobile.css">

    <title>Abdullah's Portfolio</title>
    <script src="https://kit.fontawesome.com/89bffb3f08.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="background">
        <header class="container">
            <a href="index.php" class="logo">Abdullah<span>Zulfiqar</span></a>
            <nav>
                <ul id="sideMenu">
                    <li>
                        <a href="#about">About Me</a>
                    </li>
                    <li>
                        <a href="#aboutSection" onclick="opentab('experience','expT')">Experience</a>
                    </li>
                    <li>
                        <a href="#aboutSection" onclick="opentab('skills','skillsT')">Skills</a>
                    </li>
                    <li>
                        <a href="#aboutSection" onclick="opentab('education','eduT')">Education</a>
                    </li>
                    <li>
                        <a href="portfolio.php">Portfolio</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
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
            <div class="welcome">
                <aside>
                    <p>Aspiring Software Engineer</p>
                    <h1>Hey, I'm Abdullah Zulfiqar,<br>a CS student from QMUL</h1>
                </aside>
            </div>
        </header>
    </div>

    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-column-1">
                    <figure>
                        <img src="Images/aboutme.png">
                        <figcaption>A happy me</figcaption>
                    </figure>
                </div>
                <div class="about-column-2" id="aboutSection">
                    <article>
                        <h1 class="subtitle">About me</h1>
                        <section>
                            <p>Hi there, my name is Abdullah Zulfiqar and I'm thrilled that you've stumbled upon my website! I'm currently pursuing a degree in Computer Science at Queen Mary University of London. From a young age, I've had a fascination
                                with technology, and my passion for software engineering has only grown stronger as I've delved deeper into the field. When I'm not coding, you can usually find me on a basketball court or engrossed in a game of chess.
                                I find that these hobbies help me stay sharp and focused, and they provide a much-needed break from the screen. Thanks for visiting, and I hope you enjoy exploring my site!</p>
                        </section>
                        <section>
                            <div class="tab-titles">
                                <p class="tab-links active-link" id="skillsT" onclick="opentab('skills', 'skillsT')">Skills</p>
                                <p class="tab-links" id="expT" onclick="opentab('experience', 'expT')">Experience</p>
                                <p class=" tab-links " id="eduT" onclick="opentab('education', 'eduT')">Education</p>
                            </div>
                            <div class="tab-contents active-tab" id="skills">
                                <ul>
                                    <li><span>Web Development</span><br>Developing robust websites</li>
                                    <li><span>Programming Languages</span><br>Java, C++, Python</li>
                                    <li><span>Communication and Collaboration</span><br>Strong leadership and communication skills</li>
                                </ul>
                            </div>
                            <div class="tab-contents" id="experience">
                                <ul>
                                    <li><span>2023 April</span><br>Spring Intern at Deutsche Bank</li>
                                    <li><span>2023 April</span><br>Spring Intern at Amazon</li>
                                    <li><span>2022 October</span><br>Insight Day at Morgan Stanley</li>
                                    <li><span>2020 Jan- 2022 October</span><br>Team leader at Wasabi</li>
                                    <li><span>2018 July</span><br>Insight into Management Programme (7day) at Trident</li>

                                </ul>
                            </div>
                            <div class="tab-contents" id="education">
                                <ul>
                                    <li><span>2022-present</span><br>Computer Science BSC at Queen Mary University of London</li>
                                    <li><span>2021-2022</span><br>Access to HE at Newham College of Further Education</li>
                                </ul>
                            </div>
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="contact-left">
                    <h1 class="subtitle">Contact Me</h1>
                    <p><i class="fa-sharp fa-solid fa-paper-plane"></i> usamash34@gmail.com</p>
                    <p><i class="fa-solid fa-square-phone"></i> 07493585146</p>
                    <div class="social-icons">
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-twitter-square"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/abdullah-zulfiqar-963647250/"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="contact-right">
                    <form>
                        <input type="text" name="Name" placeholder="Your Name" pattern="^[A-Za-z]+(\s[A-Za-z]+)?$" title="Name must not include numbers, and must either be first name or full name" required>
                        <input type="email" name="Email" placeholder="Your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Format must be in example@email.com" required>
                        <textarea name="Message" rows="6" placeholder="Your Message" minlength="10" maxlength="500" required></textarea>
                        <button type="submit" class="btn btn2">Submit</button>
                    </form>
                </div>
            </div>
        </div>


        <footer>
            <p>Copyright © Abdullah Zulfiqar</p>
        </footer>
    </div>




    <script>
        // show / close tabs js
        var tablinks = document.getElementsByClassName("tab-links");
        var tabcontents = document.getElementsByClassName("tab-contents");

        function opentab(tabName, tabTitle) {
            for (tablink of tablinks) {
                tablink.classList.remove("active-link");
            }
            for (tabcontent of tabcontents) {
                tabcontent.classList.remove("active-tab");
            }
            document.getElementById(tabTitle).classList.add("active-link");
            document.getElementById(tabName).classList.add("active-tab");
        }
    </script>

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