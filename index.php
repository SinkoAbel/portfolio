<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Full Stack Developer Portfolio | Bootstrap, PHP, CSS, HTML, C#, .NET, PYTHON</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&display=swap" rel="stylesheet">

    <!-- Sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!--Smooth scroll-->
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $('a[href*="#"]')
                // Remove links that don't actually link to anything
                .not('[href="#"]')
                .not('[href="#0"]')
                .click(function(event) {
                    // On-page links
                    if (
                        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                        &&
                        location.hostname == this.hostname
                    ) {
                        // Figure out element to scroll to
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        // Does a scroll target exist?
                        if (target.length) {
                            // Only prevent default if animation is actually gonna happen
                            event.preventDefault();
                            $('html, body').animate({
                                scrollTop: target.offset().top
                            }, 1000, function() {
                                // Callback after animation
                                // Must change focus!
                                var $target = $(target);
                                $target.focus();
                                if ($target.is(":focus")) { // Checking if the target was focused
                                    return false;
                                } else {
                                    $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                    $target.focus(); // Set focus again
                                };
                            });
                        }
                    }
                });
        });
    </script>

</head>



<body>


<?php

if (isset($_POST['send_button']))
{

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $my_email = "sinkoabel@gmail.com";


    $message_for_me = ' Message: 
    
                      '.$message.'!
                          
                    
                    Contact details:
                    
                    '.$name.' 
                    '.$email.'
                    '.$phone.'';


    //felhasználó által írt tartalom elküldése nekem
    mail($my_email, $subject, $message_for_me);


    //visszaigazoló email küldése a felhasználónak
    include ('class.phpmailer.php');

    $text = ' Dear '.$name.'!
                    <br><br>
                    Thank you for your letter!<br>
                    I will make contact with you as soon as possible!<br><br>
                    
                    Best regards: <br>
                    Ábel Sinkó ';

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Set who the message is to be sent from
    $mail->SetFrom('sinkoabel@gmail.com', 'Sinko Abel');
    //Set an alternative reply-to address
    $mail->AddReplyTo('sinkoabel@gmail.com', 'Sinko Abel');
    //Set who the message is to be sent to
    $mail->AddAddress($email, $name);
    //Set the subject line
    $mail->Subject = 'Abel Sinko confirmation';
    //Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
    $mail->MsgHTML($text, dirname(__FILE__));
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    //$mail->AddAttachment('images/phpmailer.png');

    //Send the message, check for errors
    if(!$mail->Send())
    {
        $mail->ErrorInfo;

    }
    else
    {


        echo '
            <script type="text/javascript">

                $(document).ready(function(){

                  swal({
                    position: "top-end",
                    type: "success",
                    title: "Your message has been sent!",
                    showConfirmButton: false,
                    timer: 2500
                  })
                });
            </script>';
    }
}

?>




<nav class="navbar fixed-top navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand name text-primary" href="#">Sinkó Ábel</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto fw-bold links">
                <li class="nav-item">
                    <a class="nav-link" href="#services">WHAT I DO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio">PORTFOLIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#me">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<figure>
    <figcaption>Full-stack<br>web developer</figcaption>

    <div class="text container">
        <a href="#services">Learn more</a>
    </div>
</figure>



<section id="services" class="services">
    <div class="container">
        <h2>WHAT I DO</h2>
        <p class="small_text">Things I'm skilled at and passionate about:</p>


        <div class="row text-center mx-auto topics">
            <div class="container col-md-4">
                <div class="topic_box mx-auto">
                    <p>&lt/&gt</p>
                </div>
                <p class="fw-bold">Web developmet</p>
                <p class="szoveg" style="color: dimgrey">Fast, responsive and engaging apps that bring your ideas to life.</p>
            </div>

            <div class="container col-md-4">
                <div class="topic_box mx-auto">
                    <p style="font-size: 110px; padding-left: 20px">php</p>
                </div>
                <p class="fw-bold">PHP</p>
                <p class="szoveg" style="color: dimgrey">With PHP I have the power to run the page smooth but users don't even notice.</p>
            </div>

            <div class="container col-md-4">
                <div class="topic_box mx-auto">
                    <img src="pictures/css3-logo-png-transparent.png" height="180rem" style="padding-top: 10px">
                </div>
                <p class="fw-bold">HTML5&CSS3</p>
                <p class="szoveg" style="color: dimgrey">Forging your website to one of the best looking things that humans ever seen.</p>
            </div>
        </div>



        <div class="row text-center mx-auto topics second_line">
            <div class="container col-md-4">
                <div class="topic_box mx-auto">
                    <img src="pictures/javascript-icon-png-23.jpg" height="150rem" style="padding-top: 20px">
                </div>
                <p class="fw-bold">JavaScript&jQuery</p>
                <p class="szoveg" style="color: dimgrey">Making the website moving and ready to roll wherever you like.</p>
            </div>

            <div class="container col-md-4">
                <div class="topic_box mx-auto">
                    <img src="pictures/database.png" height="140rem" style="padding-top: 6px; filter: brightness(0) invert(1);">
                </div>
                <p class="fw-bold">MySQL</p>
                <p class="szoveg" style="color: dimgrey">Creating and optimizing databases to achieve the optimal performance.</p>
            </div>

            <div class="container col-md-4">
                <div class="topic_box mx-auto">
                    <img src="pictures/bootstrap.png" height="170rem" style="padding-top: 10px">
                </div>
                <p class="fw-bold">Bootstrap</p>
                <p class="szoveg" style="color: dimgrey">Mobile, tablet, laptop, PC. Not a problem. The website always remain responsive.</p>
            </div>
        </div>
    </div>
</section>





<section id="portfolio" class="portfolio">
    <div class="container works">
        <h2>PORTFOLIO</h2>
        <p class="small_text">Some of my projects.</p>

        <div class="row">
            <div class="col-md-6">
                <div class="portfolio_box">
                    <a href="https://sinkoabel.github.io/IronMaidenFanPage/shop.html" target="_blank"><img src="pictures/page1.jpg"></a>
                    <p class="text_box">Iron Maiden fan webpage project</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="portfolio_box">
                    <a href="https://sinkoabel.github.io/mass-effect-fan_page/" target="_blank"><img src="pictures/page2.jpg"></a>
                    <p class="text_box">Mass Effect Hungary fan page</p>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="me" class="about_me">
    <div class="container about_me">
        <h2>ABOUT ME</h2>
        <p class="small_text">Let's be casual for a momet.</p>

        <img src="pictures/IMG_1480.jpg" alt="avatar">

        <p class="my_name">Ábel Sinkó</p>
        <p class="experties">HTML5&CSS3 | PHP 5.x, 7.x | MySQL</p>

        <div class="description">
            <p>I'm in love with coding and making dreams come true in the virtual world.
                I like to work alone or in a team.</p>
            <p>Currently I'm studying Software Development at Eszterházy Károly University.</p>
            <p>Though I just a beginner in this industry I feel like I'm in love with it. I found something I can be passionate.
                As a maximalist my principle is to give my clients nothing but the best.</p>
            <p>Maybe I'm not that experienced but my motivation is on 110% therefore I can learn new thigs faster than light.
                I believe I can be a valiable asset for a developer company and the team.</p>
            <p>Please feel free to contact me below!</p>
        </div>
    </div>
</section>







<?php
print '
<section id="contact" class="contact">
    <div class="container col-md-6">
    
        <form method="post">
            <h2>CONTACT</h2>
            
            <input type="text" name="name" placeholder="Your name:" class="form-control contact_name" required value="'.$name.'">
            <input type="email" name="email"placeholder="Email:" class="form-control contact_email" required value="'.$email.'">
            <input type="tel" name="phone" placeholder="Phone (optional):" class="form-control contact_phone" value="'.$phone.'">
            <input type="text" name="subject" placeholder="Subject:" class="form-control contact_subject" required value="'.$subject.'">
            <input type="text" name="message" placeholder="Message:" class="form-control contact_message" required value="'.$message.'">
            
            <input type="submit" name="send_button" value="Send" class="btn btn-primary send_button">
            
            <p class="created_by">DESIGNED & CODED BY <strong>ÁBEL SINKÓ</strong></p>                
        </form>
        
    </div>
</section>';

?>



</body>
</html>




