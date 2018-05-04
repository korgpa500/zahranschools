<?php
session_start();
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
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style/animate.min.css">
        <link rel="stylesheet" href="style/style.css">
        <link href="image/logo.jpg" rel="icon" type="jpg">
    </head>

    <body>

        <?php
        include './temp/NavBar.php';
        //send message
        if (isset($_POST['sendMsgKg'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $msg = $_POST['msg'];
            $section = $_POST['section'];
            $sql = "INSERT INTO message(msgname ,msgemail ,msgmessage ,sectionid)VALUES('" . $name . "' ,'" . $email . "' ,'" . $msg . "' ,'" . $section . "')";
            $res = $conn->query($sql);
            if ($res) {
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
        <!-- Home -->
        <div id="home">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active picsize">
                        <img src="image/555.png" alt="Zahran Schools Pics">
                        <div class="carousel-caption">
                            <h2>Zahran Language Schools</h2>
                        </div> 
                    </div>

                    <div class="item">
                        <img src="image/444.png" alt="Zahran Schools Pics">
                        <div class="carousel-caption">
                            <h2>Zahran Language Schools</h2>
                        </div> 
                    </div>

                    <div class="item">
                        <img src="image/111.png" alt="Zahran Schools Pics">
                        <div class="carousel-caption">
                            <h2>Zahran Language Schools</h2>
                        </div> 
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- End Home -->

        <!-- Sections-->
        <div id="Sections" class="text-center container">
            <h1 class="textTitleY">ZAHRAN LANGUAGE SCHOOLS</h1>
            <div class="row">
                <div class="col-sm-2">
                    <a href="kg.php"><button class="btnStage animated infinite pulse" id="kg">K.G</button></a>
                </div>
                <div class="col-sm-2">
                    <a href="junior.php"><button class="btnStage animated infinite pulse" id="ps">Primary Stage</button></a>
                </div>
                <div class="col-sm-2">
                    <a href="m_girls.php"><button class="btnStage animated infinite pulse" id="mg">Middle Girls</button></a>
                </div>
                <div class="col-sm-2">
                    <a href="m_boys.php"><button class="btnStage animated infinite pulse" id="mb">Middle Boys</button></a>
                </div>
                <div class="col-sm-2">
                    <a href="s_girls.php"><button class="btnStage animated infinite pulse" id="sg">Secondary Girls</button></a>
                </div>
                <div class="col-sm-2">
                    <a href="s_boys.php"><button class="btnStage animated infinite pulse" id="sb">Secondary Boys</button></a>
                </div>
            </div>
        </div>
        <!-- End Sections-->

        <!--News-->
        <?php
        $sqlNews = "SELECT * FROM news";
        $resNews = $conn->query($sqlNews);
        if ($resNews->num_rows > 0) {
            ?>
            <div id="newsIndex">
                <div class="text-center container">
                    <div class="textTitleY">SCHOOL NEWS</div>

                    <marquee direction="up" scrollamount="2" class="text-center" onMouseOver="this.stop()" onMouseOut="this.start()">
                        <?php
                        while ($rowNews = $resNews->fetch_assoc()) {
                            echo "-";
                            echo "<a href='news_des.php?id=" . $rowNews['id'] . "'>" . $rowNews['title'] . "</a>";
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                            echo $rowNews['news_day'];
                            echo "<br>";
                        }
                        ?>
                        <a href="news_view.php">more......</a>
                    </marquee>
                </div>
            </div>
            <?php
        }
        ?>
        <!--End News-->


        <!-- Bout US -->
        <div id="aboutus" class="text-center containerY">
            <h1 class="textTitleY">About School</h1>
            <h4>Zahran Language Schools [Z.L.S]</h4>
            <h4>Opened 1998 accepting students from all schools Upto Senior 1 grade.</h4>
            <h4>First class graduated at 2001.</h4>
            <h4>Zahran Boys School won the Pioneers Competition against all Alexandria Schools on 2002.</h4>
            <h4>Zahran Girls School won it on 2008.</h4>
            <h4><a href="aboutus.php">More</a></h4>
        </div>
        <!-- End About Us -->

        <!-- TOUR -->
        <div id="tour">
            <div class="text-center container">
                <h1 class="textTitleY">MISSION AND VISION</h1>
                <br>
                <h2 class="textTitleY">OUR VISION</h2>
                <h4>We aspire to be pioneers in distinguish quality education and develop innovative student who are capable of meeting the requirements of the age under the umbrella of effective community service</h4>
                <br>
                <h2 class="textTitleY">OUR MISSION</h2>
                <h4>Providing an attractive education & technological environment to build a good citizen with mature and sound personality through :
                    <br>
                    <ol>
                        <li>Implementing the latest technology and most up-to-date education programs.</li>
                        <li>Updating the knowledge and skills of teaching and support staffs through ongoing training and professional development programs.</li>
                        <li>Encouraging teamwork and self-learning skills.</li>
                        <li>Activating interaction and cooperation between MCILS and parents and civil community institutions.</li>
                        <li>Developing positive and ethical values and consolidating the concept of citizenship and commitment.</li>
                        <li>Providing good medical ,psychological and social care for all students, teacher and support staff.</li>
                        <li>Giving due care to all curricular and extracurricular activities to detect talents, encourage and boost innovations.</li>
                    </ol>
                </h4>

            </div>
        </div>
        <!-- END TOUR -->

        <!-- Contact -->
        <div id="contact" class="text-center container">
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
                            <input type="hidden" name="section" value="5">
                            <input type="submit" name="sendMsgKg" value="submit" id="youssry">
                        </div>
                    </form>
                    <h5>You can contact with us in</h5>
                    <h5><b>FAX : 03 - 4249620</b></h5>
                    <h5><b>FAX : 03 - 4249620</b></h5>
                    <h5><b>Email : zahranschools1998@yahoo.com</b></h5>
                    <a href="https://www.facebook.com/ZAHRAN.SCHOOLS"><i class="fa fa-facebook-square" style="font-size:48px;"></i></a>
                    <!--<a href=""><i class="fa fa-google-plus-square" style="font-size:48px"></i></a>
                    <a href=""><i class="fa fa-twitter-square" style="font-size:48px;"></i></a>-->
                </div>
                <div class="col-sm-6">
                    <!-- Add Google Maps -->
                    <div id="googleMap"></div>
                    <script>
                        function myMap() {
                            var myCenter = new google.maps.LatLng(31.2136642, 29.9458012);
                            var mapProp = {center: myCenter, zoom: 18, scrollwheel: false, draggable: false, mapTypeId: google.maps.MapTypeId.ROADMAP};
                            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                            var marker = new google.maps.Marker({position: myCenter});
                            marker.setMap(map);
                        }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA969mxX2sK9WNAP5BSxNkP7IQLsuO5p4Q&callback=myMap"></script>
                    <!-- End Google Maps -->
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