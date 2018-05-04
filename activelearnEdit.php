<?php
session_start();
if (!isset($_SESSION['type'])) {
    header('Location: logout.php');
}
//if (isset($_SESSION['type'])) {
//    if ($_SESSION['type'] != 1) {
//        header('Location: logout.php');
//    }
//}
include './temp/config.php';

$userNotUpdate = "";

//user empty var
$userIdU = "";
$userFNU = "";
$userLNU = "";
$userEU = "";
$userPhoneU = "";
$userPassU = "";
$userTypeU = "";
$userSectionU = "";
?>

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
        <link rel="stylesheet" href="./style/style.css">
        <link href="./image/logo.jpg" rel="icon" type="jpg">
    </head>

    <body>
        <?php
        include './temp/NavBar.php';
        //view modal information and set data
        if (isset($_POST['view'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            if ($user == $_SESSION['phone'] AND $pass == $_SESSION['password']) {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#viewInfo').modal('show');
            });
        </script>";
                $userID = $_SESSION['id'];
                $sqlGetUser = "SELECT * FROM users WHERE id=" . $userID;
                $resGetUser = $conn->query($sqlGetUser);
                $rowGetUser = $resGetUser->fetch_assoc();

                $userIdU = $userID;
                $userFNU = $rowGetUser['fname'];
                $userLNU = $rowGetUser['lname'];
                $userEU = $rowGetUser['email'];
                $userPhoneU = $rowGetUser['phone'];
                $userPassU = $rowGetUser['password'];
                //end vie information and set data
            } else {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#notAccess').modal('show');
            });
        </script>";
            }
        }
        //end view
        //update User
        if (isset($_POST['FinalUpdate'])) {
            $idu = $_POST['idu'];
            $fnameu = $_POST['fnameu'];
            $lnameu = $_POST['lnameu'];
            $emailu = $_POST['emailu'];
            $phoneu = $_POST['phoneu'];
            $passwordu = $_POST['passwordu'];

            $sqlUpdate = "UPDATE `users` SET `fname`='" . $fnameu . "',`lname`='" . $lnameu . "',`email`='" . $emailu . "',`phone`='" . $phoneu . "',`password`='" . $passwordu . "' WHERE id =" . $idu;
            $resUpdate = $conn->query($sqlUpdate);
            if ($resUpdate) {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#UserUpdated').modal('show');
            });
        </script>";
            } else {
                $userNotUpdate = $conn->error;
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#UserNotUpdated').modal('show');
            });
        </script>";
            }
        }
        //End update User
        
        ?>
        <div class="text-center container">
            <h1 class="textTitleYY">Edit Account</h1>
            <div class="row">
                <div class="col-sm-6">
                    <form action="" method="post">
                        <div class="form-group">
                            <h3>Please Enter Your Email Or Phone</h3>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <h3>Please Enter Your Password</h3>
                            <input type="password" name="pass" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="View Information" name="view" class="btn btn-default" id="youssry">
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <div id="myCarousel" class="carousel" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <img src="image/al.png" alt="Active Learning">
                        </div>
                    </div>
                </div>

            </div>

            <!-- view Info-->
            <div class="modal fade" id="viewInfo" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        First Name
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" placeholder="First Name" class="form-control" name="fnameu" value="<?php echo $userFNU; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        Last Name
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" placeholder="Last Name" class="form-control" name="lnameu" value="<?php echo $userLNU; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        E-mail Address
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" placeholder="E-mail Address" class="form-control" name="emailu" value="<?php echo $userEU; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        phone
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" placeholder="phone" class="form-control" name="phoneu" value="<?php echo $userPhoneU; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        Password
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" placeholder="Password" class="form-control" name="passwordu"  value="<?php echo $userPassU; ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <input type="hidden" name="idu" value="<?php echo $userIdU; ?>">
                                    <input type="submit" value="Update" class="btn btn-success btnLogin" name="FinalUpdate">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <form action="" method="post">
                                <input type="submit" value="Close" class="btn btn-default" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End View Info-->

            <!-- not Access -->
            <div class="modal fade" id="notAccess" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <h4 style="color:red;">Wrong Data<br>Please Try Again</h4>
                        </div>
                        <div class="modal-footer">
                            <form action="" method="post">
                                <input type="submit" value="Close" class="btn btn-default" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End not Access -->


            <!-- Modal User Is Update-->
            <div class="modal fade" id="UserUpdated" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label>User Is Updated</label>
                            <br>
                            <label>You should Logout And Login Again</label>
                        </div>
                        <div class="modal-footer">
                            <form action="logout.php" method="post">
                                <input type="submit" value="Close" class="btn btn-default">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Is Update-->

            <!-- Modal User Not Update-->
            <div class="modal fade" id="UserNotUpdated" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label style="color:red;"><?php echo $userNotUpdate; ?><br>User Not Updated</label>
                        </div>
                        <div class="modal-footer">
                            <form action="" method="post">
                                <input type="submit" value="Close" class="btn btn-default" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Not Update-->

        </div>
    </body>
</html>
