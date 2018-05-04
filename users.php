<?php
session_start();
if (!isset($_SESSION['type'])) {
    header('Location: logout.php');
}
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] != 1) {
        header('Location: logout.php');
    }
}
include './temp/config.php';

$userNotAdded = "";
$userNotDelete = "";
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
        //Add User
        if (isset($_POST['AddUser'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $typeid = $_POST['typeid'];
            $sectionid = $_POST['sectionid'];

            $sqlAdd = "INSERT INTO `users`(`fname`, `lname`, `email`, `phone`, `password`, `typeid`, `sectionid`) VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $phone . "','" . $password . "','" . $typeid . "','" . $sectionid . "')";
            $resAdd = $conn->query($sqlAdd);
            if ($resAdd) {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#UserAdded').modal('show');
            });
        </script>";
            } else {
                $userNotAdded = $conn->error;
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#UserNotAdded').modal('show');
            });
        </script>";
            }
        }
        //End Add User
        //Delete User
        if (isset($_POST['delete'])) {
            $userID = $_POST['userID'];
            $sqlDelete = "DELETE FROM users WHERE id=" . $userID;
            $resDelete = $conn->query($sqlDelete);
            if ($resDelete) {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#UserDeleted').modal('show');
            });
        </script>";
            } else {
                $userNotDelete = $conn->error;
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#UserNotDelete').modal('show');
            });
        </script>";
            }
        }
        //End Delete User
        //Open Modal Update And Set User feild
        if (isset($_POST['update'])) {
            $userID = $_POST['userID'];
            $sqlGetUser = "SELECT * FROM users WHERE id=" . $userID;
            $resGetUser = $conn->query($sqlGetUser);
            $rowGetUser = $resGetUser->fetch_assoc();

            $userIdU = $userID;
            $userFNU = $rowGetUser['fname'];
            $userLNU = $rowGetUser['lname'];
            $userEU = $rowGetUser['email'];
            $userPhoneU = $rowGetUser['phone'];
            $userPassU = $rowGetUser['password'];
            $sqlT = "SELECT * FROM types WHERE typeid=" . $rowGetUser['typeid'];
            $resT = $conn->query($sqlT);
            $rowT = $resT->fetch_assoc();
            $userTypeU = $rowT['typename'];
            $sqlS = "SELECT * FROM section_type WHERE sectionid=" . $rowGetUser['sectionid'];
            $resS = $conn->query($sqlS);
            $rowS = $resS->fetch_assoc();
            $userSectionU = $rowS['sectionname'];

            echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#UpdateUser').modal('show');
            });
        </script>";
        }
        //End Open Modal Update And Set User feild
        //update User
        if (isset($_POST['FinalUpdate'])) {
            $idu = $_POST['idu'];
            $fnameu = $_POST['fnameu'];
            $lnameu = $_POST['lnameu'];
            $emailu = $_POST['emailu'];
            $phoneu = $_POST['phoneu'];
            $passwordu = $_POST['passwordu'];
            $typeidu = $_POST['typeidu'];
            $sectionidu = $_POST['sectionidu'];

            $sqlUpdate = "UPDATE `users` SET `fname`='" . $fnameu . "',`lname`='" . $lnameu . "',`email`='" . $emailu . "',`phone`='" . $phoneu . "',`password`='" . $passwordu . "',`typeid`='" . $typeidu . "',`sectionid`='" . $sectionidu . "' WHERE id =" . $idu;
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
            <h1 class="textTitleYY">USERS</h1>
            <!-- View Users -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                $sqlUser = "SELECT * FROM users";
                $resUser = $conn->query($sqlUser);
                $a = 1;
                while ($rowUser = $resUser->fetch_assoc()) {
                    $typeid = $rowUser['typeid'];
                    $sqlGetType = "SELECT * FROM types WHERE typeid='" . $typeid . "'";
                    $resGetType = $conn->query($sqlGetType);
                    $rowGetType = $resGetType->fetch_assoc();
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $a++ . "</td>";
                    echo "<td>" . $rowUser['fname'] . " " . $rowUser['lname'] . "</td>";
                    echo "<td>" . $rowGetType['typename'] . "</td>";
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='userID' value='" . $rowUser['id'] . "'> ";
                    echo "<td><input type='submit' name='update' value='Update' class='btn btn-primary'></td>";
                    echo "</form>";
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='userID' value='" . $rowUser['id'] . "'> ";
                    echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-primary'></td>";
                    echo "</form>";
                    echo "</tr>";
                    echo "</tbody>";
                }
                ?>
            </table>
            <!-- End View Users -->

            <!-- Button Add User -->
            <a href="#AddUser" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-primaViery btnLogin">Add New User</span></a>
            <!-- End Button Add User -->

            <!-- Modal Add user-->
            <div class="modal fade" id="AddUser" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add new User</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="First Name" class="form-control" name="fname">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Last Name" class="form-control" name="lname">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="E-mail Address" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="phone" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <select name="typeid" class="form-control">
                                        <?php
                                        $sqltype = "SELECT * FROM types";
                                        $restype = $conn->query($sqltype);
                                        while ($rowtype = $restype->fetch_assoc()) {
                                            echo "<option value='" . $rowtype['typeid'] . "'>" . $rowtype['typename'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="sectionid" class="form-control">
                                        <?php
                                        $sqltype = "SELECT * FROM section_type";
                                        $restype = $conn->query($sqltype);
                                        while ($rowtype = $restype->fetch_assoc()) {
                                            echo "<option value='" . $rowtype['sectionid'] . "'>" . $rowtype['sectionname'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add" class="btn btn-success btnLogin" name="AddUser">
                                </div>
                            </form>		
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Model Add User-->

            <!-- Modal User Is Added-->
            <div class="modal fade" id="UserAdded" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label>User Is Added</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Is Added-->

            <!-- Modal User Not Added-->
            <div class="modal fade" id="UserNotAdded" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label style="color:red;"><?php echo $userNotAdded; ?><br>User Not Added</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Not Added-->

            <!-- Modal User Is Delete-->
            <div class="modal fade" id="UserDeleted" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label>User Is Deleted</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Is Delete-->

            <!-- Modal User Not Delete-->
            <div class="modal fade" id="UserNotDelete" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label style="color:red;"><?php echo $userNotDelete; ?><br>User Not Deleted</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Not Added-->


            <!-- Modal update user-->
            <div class="modal fade" id="UpdateUser" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="First Name" class="form-control" name="fnameu" value="<?php echo $userFNU; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Last Name" class="form-control" name="lnameu" value="<?php echo $userLNU; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="E-mail Address" class="form-control" name="emailu" value="<?php echo $userEU; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="phone" class="form-control" name="phoneu" value="<?php echo $userPhoneU; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Password" class="form-control" name="passwordu"  value="<?php echo $userPassU; ?>">
                                </div>
                                <div class="form-group">
                                    <select name="typeidu" class="form-control">
                                        <?php
                                        $sqlty = "SELECT * FROM types";
                                        $resty = $conn->query($sqlty);
                                        while ($rowty = $resty->fetch_assoc()) {
                                            echo "<option value='" . $rowty['typeid'] . "'>" . $rowty['typename'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="sectionidu" class="form-control">
                                        <?php
                                        $sqlse = "SELECT * FROM section_type";
                                        $resse = $conn->query($sqlse);
                                        while ($rowse = $resse->fetch_assoc()) {
                                            echo "<option value='" . $rowse['sectionid'] . "'>" . $rowse['sectionname'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="idu" value="<?php echo $userIdU; ?>">
                                    <input type="submit" value="Update" class="btn btn-success btnLogin" name="FinalUpdate">
                                </div>
                            </form>		
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Model Update User-->

            <!-- Modal User Is Update-->
            <div class="modal fade" id="UserUpdated" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label>User Is Updated</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Not Update-->


        </div>
    </body>
</html>
