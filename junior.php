<?php
session_start();
include './temp/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Zahran Schools</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
        <link rel="stylesheet" href="style/thumbnail-gallery.css">
        <link rel="stylesheet" href="style/gallery-grid.css">
        <link rel="stylesheet" href="style/kgstyle.css">
        <link rel="stylesheet" href="style/style.css">
        <link href="image/logo.jpg" rel="icon" type="jpg">
    </head>

    <body>

        <?php
        include './temp/NavBar.php';
        
        //send message
        if (isset($_POST['sendMsg'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $msg = $_POST['msg'];
            $sectionMsg = $_POST['sectionMsg'];
            $sqlMsg = "INSERT INTO message(msgname ,msgemail ,msgmessage ,sectionid)VALUES('" . $name . "' ,'" . $email . "' ,'" . $msg . "' ,'".$sectionMsg."')";
            $resMsg = $conn->query($sqlMsg);
            if ($resMsg) {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#sendMsg').modal('show');
            });
        </script>";
            } else {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#notsendMsg').modal('show');
            });
        </script>";
            }
        }
        //End Send Message
        
        ?>
        <!-- home -->
        <div id="home">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="active">
                        <img src="image/junior.png" alt="Primary Stage">
                        <div class="carousel-caption">
                            <img src="image/Logot.png" id="logoT">
                            <h2 class="textTitleYY">Primary Stage</h2>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <!-- side bar -->
            <div id="mySidenav" class="sidenav">

                <a href="#aboutSec" id="about">About</a>
                <a href="#newSec" id="news">Mission</a>
                <a href="#acivitySec" id="activities">Activities</a>
                <a href="#qualitySec" id="quality">Quality</a>
                <a href="#contactSec" id="contact">Contact Us</a>

            </div>
            <!-- end side bar -->

        </div>
        <!-- end home -->

        <!-- about -->
        <div id="aboutSec">
            <div class="containerY text-center">
                <h2 class="textTitleY" >ZAHRAN PRIMARY SCHOOL</h2>
                <h2 class="textTitleY">ABOUT</h2>
                <h4>The primary stage in Mohammed Zahran School is the stage of personal, intellectual, skillful and informative formation of the student or student. This stage is considered the stage of the national formation of the student and his belonging to the local community in particular and the international community in general</h4>
                <br>
                <h4>Primary Stage</h4>
                <h4>A message of love and respect for each student</h4>
                <h4>Think and learn and grow up</h4>
                <h4>Her sunshine is shining everywhere</h4>
                <h4>New life and hope in all her students</h4>

            </div>
        </div>
        <!-- end about -->

        <!-- mission -->
        <div id="newSec">
            <div class="container text-center">
                <h2 class="textTitleY">MISSION AND VISION</h2>
                <h2>Vision</h2>
                <h4>Raising a creative for student, intellectually conscious, interacting with his community</h4>
                <h2>Mission</h2>
                <h4>
                    <ol>
                        <li>Student development Comprehensive development from all aspects of growth</li>
                        <li>Developing the talents of our Students through participation in competitions and various activities</li>
                        <li>Continuing training for the teacher in order to achieve comprehensive and sustainable development</li>
                        <li>Involve parents with students in activities</li>
                        <li>Students visiting the surrounding environment</li>
                        <li>Training both the Students and the teacher on modern technology</li>
                    </ol>
                </h4>
            </div>
        </div>
        <!--end mission -->
        
        <?php
        $sqlAct = "SELECT * FROM activites WHERE sectionid=2 GROUP BY title";
        $resAct = $conn->query($sqlAct);
        if($resAct->num_rows == 0){
            
        }else{
            
        
        ?>

        <!-- activity -->
        <div class="container text-center" id="acivitySec">
            <h2 class="textTitleY">ACTIVITIES</h2>
            <div class="tz-gallery">
                <div class="row">
                    <?php
                    
                    
                    while ($rowAct = $resAct->fetch_assoc()) {

                        echo "<div class='col-sm-6 col-md-4'>";
                        echo "<div class='thumbnail'>";
                        echo "<div class='row'>";
                        $sqlPic = "SELECT * FROM activites WHERE sectionid=2 AND title='" . $rowAct['title'] . "'";
                        $resPic = $conn->query($sqlPic);
                        while ($rowPic = $resPic->fetch_assoc()) {
                            echo "<div class='col-sm-6 col-md-4'>";
                            echo "<a class='lightbox' href='" . $rowPic['img'] . "'>";
                            echo "<img src='" . $rowPic['img'] . "' alt='" . $rowPic['title'] . "'>";
                            echo "</a>";
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "<div class='caption'>";
                        echo "<h3>" . $rowAct['title'] . "</h3>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <script>
                baguetteBox.run('.tz-gallery');
            </script>
        </div>
        <!-- end activity -->
        <?php
        }
        ?>

        <!-- quality -->
        <div id="qualitySec">
            <div class="container text-center">
                <h2 class="textTitleY">QUALITY</h2>
                <br>
                <h4>Quality Certificate in Education</h4>
                <h4>Renewal of the certificate of accreditation and quality in education 2016</h4>
                <h4>The first place in the music education competition for 14 consecutive years</h4>
                <h4>The first place and the police shield for the competition to develop the child's traffic awareness</h4>
                <h4>First place for the kindergarten competition for 6 years</h4>
            </div>
        </div>
        <!-- end quality -->

        <!-- Contact -->
        <div class="container text-center">

            <div id="contactSec">
                <h1 class="textTitleY">CONTACT US</h1>
                <br><br>
                <div class="row">
                    <div class="col-sm-6">
                        <h5>We will be happy with your suggestions and opinions</h5>
                        <h5>Pleases fill This Fields</h5>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" name="name" placeholder="Your Name" id="youssry" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>E-mail :</label>
                                <input type="text" name="email" placeholder="Your E-mail" id="youssry" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Message :</label>
                                <textarea class="form-control textareaY" rows="5" placeholder="Your Message......" name="msg"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="sectionMsg" value="2">
                                <input type="submit" name="sendMsg" value="submit" id="youssry">
                            </div>
                        </form>

                    </div>
                    <div class="col-sm-6">
                        <h3>Tel : 03 4269675</h3>
                        <h3>Email : zahran.primary@windowslive.com</h3>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Contact -->
        
        <!-- Modal send Message-->
        <div class="modal fade" id="sendMsg" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Information</h4>
                    </div>
                    <div class="modal-body">
                        <label>YOUR MESSAGE HAS BEEN SENT<br>THANK YOU</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End send Message-->

        <!-- Modal not send Message-->
        <div class="modal fade" id="notsendMsg" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Information</h4>
                    </div>
                    <div class="modal-body">
                        <label>YOUR MESSAGE NOT SENT<br>PLEASE TRY AGAIN</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End not sent Message-->

    </body>
</html>