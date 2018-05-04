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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
        <link rel="stylesheet" href="style/thumbnail-gallery.css">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/kgstyle.css">
        <link href="image/logo.jpg" rel="icon" type="jpg">
    </head>

    <body>

        <?php
        include './temp/NavBar.php';
        include './temp/config.php';

        //send message
        if (isset($_POST['sendMsg'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $msg = $_POST['msg'];
            $type = $_POST['type'];
            $sql = "INSERT INTO message_active(msgname ,msgemail ,msgmessage ,typeid)VALUES('" . $name . "' ,'" . $email . "' ,'" . $msg . "' ,'" . $type . "')";
            $res = $conn->query($sql);
            $conn->close();
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
        <div class="container text-center">
            <h1 class="textTitleY">ZAHRAN LANGUAGE SCHOOLS</h1>
            <img src="image/Logot.png" alt="Logo" id="logoT">
            <h1 class="textTitleYY">Active Learning</h1>
            <br>
            <h2>I hear I forget, I see I remember, I work I understand</h2>
            <h3>I'm creative, Initiative I am creative and I love my language</h3>
            <H4>Under the auspices of the Active Learning Department</H4>
            <br>

            <div class="row">
                <div class="col-sm-4">
                    <p class="text-center"><strong>Teacher</strong></p><br>
                    <a href="#demo" data-toggle="collapse">
                        <img src="image/teacher.png" class="img-circle person" alt="Teacher" id="imgcircle">
                    </a>
                    <div id="demo" class="collapse">
                        <p><a href="alview.php?kind=Teaching bags && type=Teacher">Teaching bags</a></p>
                        <p><a href="alview.php?kind=Worksheets && type=Teacher">Worksheets</a></p>
                        <p><a href="alview.php?kind=Learning strategies && type=Teacher">Learning strategies</a></p>
                        <p><a href="alview.php?kind=Experiences and Events && type=Teacher">Experiences and Events</a></p>
                        <p><a href="#TecaherMsg" data-toggle='modal'>Posts and opinions</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <p class="text-center"><strong>Student</strong></p><br>
                    <a href="#demo2" data-toggle="collapse">
                        <img src="image/student.png" class="img-circle person" alt="Student" id="imgcircle">
                    </a>
                    <div id="demo2" class="collapse">
                        <p><a href="alview.php?kind=Use active learning && type=Student">Use active learning</a></p>
                        <p><a href="alview.php?kind=Active learning activities && type=Student">Active learning activities</a></p>
                        <p><a href="alview.php?kind=Active Learning Exhibitions && type=Student">Active Learning Exhibitions</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <p class="text-center"><strong>Parent</strong></p><br>
                    <a href="#demo3" data-toggle="collapse">
                        <img src="image/parent.png" class="img-circle person" alt="Parent" id="imgcircle">
                    </a>
                    <div id="demo3" class="collapse">
                        <p><a href="alview.php?kind=The importance of active learning && type=Student">The importance of active learning</a></p>
                        <p><a href="alview.php?kind=Ideas and projects in activating active learning && type=Student">Ideas and projects in activating active learning</a></p>
                        <p><a href="#ParentMsg" data-toggle='modal'>Suggestions and innovations</a></p>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="textTitleYY" style="font-size:18px;">Active Learning Officer</h2>
                    <h4>Miss : Marwa Alsayid</h4>
                    <h5>Primary Stage For Boys</h5>
                </div>
                <div class="col-sm-6">
                    <h2 class="textTitleYY" style="font-size:18px;">Under supervision and care</h2>
                    <h4>Miss : Nahed Kamal</h4>
                    <h5>Deputy of the primary department</h5>
                </div>

            </div>

        </div>

        <!-- start Message Teacher -->
        <div class="modal fade" id="TecaherMsg" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Posts and opinions</h4>
                        <h5>Please Fill This Fields</h5>
                    </div>
                    <div class="modal-body">

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
                                <input type="hidden" name="type" value="1">
                                <input type="submit" name="sendMsg" value="submit" id="youssry">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- start Message Teacher -->
        
        <!-- start Message Parent -->
        <div class="modal fade" id="ParentMsg" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Suggestions and innovations</h4>
                        <h5>Please Fill This Fields</h5>
                    </div>
                    <div class="modal-body">

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
                                <input type="hidden" name="type" value="3">
                                <input type="submit" name="sendMsg" value="submit" id="youssry">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- start Message Parent -->

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
                        <form action="activelearn.php" method="post">
                            <input type="submit" value="Close" class="btn btn-default" >
                        </form>
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
                        <form action="activelearn.php" method="post">
                            <input type="submit" value="Close" class="btn btn-default" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End not sent Message-->



    </body>
</html>