<?php 
include 'backend/conn.php'; 
session_start(); 

mysqli_report(MYSQLI_REPORT_OFF);

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO emails (email) VALUES (?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);

            if (mysqli_stmt_execute($stmt)) {
                $success = true;
            } else {
                if (mysqli_errno($conn) == 1062) {
                    $success = true;
                } else {
                    $error = "Database error.";
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Notes</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- create a header  -->
    <header>
        <div class="navbar">
            <div class="logo"><img src="images/sy.png" alt="logo"></div>
            <div class="link">
                <ul class="all-links">
                    <li><a href="bcaNotes/bcaAll.php" class="links" id="sel" >BCA</a></li>
                    <li><a href="language/programAll.php" class="links">Programs</li>
                    <li><a href="bca exam paper/bcaExam.php" class="links">BCA Exam Papers</a></li>
                    <li><a href="http://msuresults.com/" class="links">Result</a></li>
                    <li><a href="career/career.php" class="links">Career</a></li>
                    <li><a href="about/about.php" class="links">About</a></li>
                    <li><a href="feedback.php" class="links">Feedback</a></li>
                    <li><a href="login.php" class="links">Login</a></li>
                </ul>
             </div>
           <nav>
             <div class="container">
            <div class="sidebar" id="sidebar">
                <ul>
                    <li><a href="bcaNotes/bcaAll.php">BCA</a></li>
                    <li><a href="language/programAll.php">Programs</a></li>
                    <li><a href="bca exam paper/bcaExam.php">BCA Exam Papers</a></li>
                    <li><a href="http://msuresults.com/">Result</a></li>
                    <li><a href="career/career.php">Career</a></li>
                    <li><a href="about/about.php">About</a></li> 
                    <li><a href="feedback.php">Feedback</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        <div class="sid-btn">
            <button id="toggleButton" id="button">|||</button>
        </div>
         </div>
        </div> 
    </nav>
    <section>
        <div class="heading">
            <h1>Smart Way of Easy Learning</h1>
        </div>
        <div class="paragraph">
            <div class="para">Learn something new from self-study every time with the help of our website. This is non-profitable website. Here you can study for free without any advertisement.</div>
        </div>
        <div class="input-box">
            <form action="">
                <input type="text" class="input-text" placeholder="&emsp; Working on Search">
                <input class="input-btn" onclick="alert('We are currently working on search button.')" type="submit">
            </form>
        </div>
        <h2 class="text-head">SYDreamStudy Highlights</h2>
        <div class="courses1">
        <div class="courses">
            <a href="https://www-w3schools-com.translate.goog/c/?_x_tr_sl=en&_x_tr_tl=hi&_x_tr_hl=hi&_x_tr_pto=tc" class="all-course">Learn C</a>
            <a href="https://www.geeksforgeeks.org/cpp-tutorial/" class="all-course">Learn C++</a>
            <a href="https://www.w3schools.com/html/" class="all-course">Learn HTML</a>
            <a href="https://www.w3schools.com/css/" class="all-course">Learn CSS</a>
            <a href="https://www.w3schools.com/js/" class="all-course">Learn JS</a>
            <a href="https://www.w3schools.com/python/" class="all-course">Learn Python</a>
            <a href="https://www.w3schools.com/java/" class="all-course">Learn Java</a>
            <a href="https://www.w3schools.com/php/" class="all-course">Learn PHP</a>
        </div>
    </div>
    </section>  
    </header>
    <!-- create a first section  -->
    <section class="contentNotesSection">
        <div class="contentNotes">
            <div class="contHead">
                <h1>All Content in simple language and Ad-Free :SYDreamStudy</h1>
            </div>
            <div class="contPara">
                <p>We have created SYDreamStudy (this website) to help others for free. We made this website as simple as possible, that anyone can run smoothly on their phone and computer. We have simple PDF's and Notes of the Course BCA, which will help you in quick reading and memorization. If you have any trouble in understanding any topic, then you came at right place. We will help you to eliminate all your problems.</p>
            </div>
        </div>
    </section>
    <!-- create a main content  -->
    <main>
        <div class="main">
            <div class="bca">
                <div><a href="bcaNotes/bca1st.php" class="allbca"><i class="fa-sharp-duotone fa-solid fa-book"></i>&emsp;BCA Sem 1st</a></div>
                <div><a href="bcaNotes/bca2nd.php" class="allbca"><i class="fa-sharp-duotone fa-solid fa-book"></i>&emsp;BCA Sem 2nd</a></div>
                <div><a href="bcaNotes/bca3rd.php" class="allbca"><i class="fa-sharp-duotone fa-solid fa-book"></i>&emsp;BCA Sem 3rd</a></div>
                <div><a href="bcaNotes/bca4th.php" class="allbca"><i class="fa-sharp-duotone fa-solid fa-book"></i>&emsp;BCA Sem 4th</a></div>
                <div><a href="bcaNotes/bca5th.php" class="allbca"><i class="fa-sharp-duotone fa-solid fa-book"></i>&emsp;BCA Sem 5th</a></div>
                <div><a href="bcaNotes/bca6th.php" class="allbca"><i class="fa-sharp-duotone fa-solid fa-book"></i>&emsp;BCA Sem 6th</a></div>
                <div><a href="language/programming.php" class="allbca"><i class="fa-sharp-duotone fa-solid fa-book"></i>&emsp;Programming Language</a></div>
                <div><a href="language/web.php" class="allbca"><i class="fa-sharp-duotone fa-solid fa-book"></i>&emsp;Web Designing</a></div>
        
        </div>
            </div>
    </main>  
    <!-- create a second section  -->
    <section class="feature">
        <div class="feature-head">
            <h1>SYDreamStudy Features That Makes a Dream Reality</h1>
        </div>
        <div class="feature-para">
            <p>If you are looking for Notes, or if you may be confused in any Subject or in any Topic. Then you are at right place, at right time. We will help you as much as possible we can. Thanks...</p>
        </div>
    </section>
    <!-- create a third section  -->
    <section class="content">
        <div class="content1">
            <div class="contentItem">
                <div class="content-head-para">
                    <i class="fa-solid fa-bolt" id="font"></i>
                    <h1>Fast Learning</h1>
                    <p>This website will help you to learn quickly.</p>
               </div>
            </div>
            <div class="contentItem">
                <div class="content-head-para">
                    <i class="fa-solid fa-star" id="font"></i>
                    <h1>Important Material</h1>
                    <p>Here we will provide subject wise study materials in the PDF format also.</p>
                </div>
            </div>
            <div class="contentItem">
                <div class="content-head-para">
                    <i class="fa-solid fa-trophy" id="font"></i>
                    <h1>Easy to Use</h1>
                    <p>Well-designed modern website with attractive and clear interface. Easy to download & read any content.</p>
                </div>
            </div>
            <div class="contentItem">
                <div class="content-head-para">
                    <i class="fa-solid fa-key" id="font"></i>
                    <h1>Success Key</h1>
                    <p>This website helps in developing good study skills & motivates for self-study. It also shows the way towards success.</p>
                </div>
            </div>
            <div class="contentItem">
                <div class="content-head-para">
                    <i class="fa-solid fa-thumbs-up" id="font"></i>
                    <h1>Quality Content</h1>
                    <p>We provide quality content in an easy and understandable way and that will boost your confidence level.</p>
                </div>
            </div>
            <div class="contentItem">
                <div class="content-head-para">
                    <i class="fa-solid fa-headphones" id="font"></i>
                <h1>User-friendly Language</h1>
                <p>All content is available in easy language that anyone can understand.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- create a border  -->
    <div class="border"></div>
    <!-- create a fourth section  -->
    <section>
        <div class="info">
            <div class="info-head">
                <h2>Sabiha & Yash</h2><br>
                <b>#Website Founder</b>
            </div>
            <div class="info-img-para">
                <div class="info-img">
                    <img src="images/college.jpeg" alt="yash">
                </div>
                <div class="info-para">
                    <P>When I was in my earlier classes I had some difficulties in my studies. I felt that study material should be available on the tips and then i took a dream that one day.I will promote change by helping others and giving the path of shine. I wanted to help everyone and at a high level, but it was not easy to do, to build a network was a reasonable idea for this, and as a student of BCA I decided to create a website named as SYDreamStudy. <b>~ Sabiha & Yash</b> </P>
                </div>
            </div>
        </div>
    </section>
    <!-- create a footer  -->
    <footer>
        <div class="footer-cont">
            <div class="founder">
                <p>This website is made with <i class="fa-solid fa-heart"></i> by  <a href="https://t.me/+m3MGz3APFk9iMjg1"> Sabiha & Yash</a></p>
            </div>
            <div class="social">
                <div class="socialmedia"><a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a></div>
                <div class="socialmedia"><a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a></div>
                <div class="socialmedia"><a href="#" class="icon"><i class="fa-brands fa-youtube"></i></div>
                <div class="socialmedia margin"><a href="#" class="icon"><i class="fa-brands fa-telegram"></i></a></div>
            </div>
        </div>
        <div class="email">
            <h2 style="margin-left:33%; margin-top:5rem; color:rgb(133, 133, 133); font-size:1.1rem; margin-bottom: 1rem">You can trust us. We are here to help you.</h2>
          
            <form action="" method="POST" style="width:40%;margin-left:25%">
                <input type="email" name="email" required placeholder="Your Email Address" class="input-text">
                <button type="submit" style="transform: rotate(0deg); color: black;  display: inline; width: 7rem;"  class="input-btn">Save</button>
            </form>
        </div>
        <div class="border1"></div>
    </footer>
    <script src="script.js"></script>
    <?php if ($success) { ?>
        <script>
            window.onload = function () {
                alert("✅ Email successfully saved!");
            };
        </script>
    <?php } ?>
</body>
</html>
