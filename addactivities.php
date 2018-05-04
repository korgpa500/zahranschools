<?php
session_start();
if (!isset($_SESSION['type'])) {
    header('Location: logout.php');
}
$typeUser = $_SESSION['type'];
if (isset($_SESSION['type'])) {
    if ($typeUser == 3 || $typeUser == 1) {
        
    } else {
        header('Location: logout.php');
    }
}
include './temp/config.php';
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

        $ActivityNotAdded = "";

        $MsgForImage = "";
        //Add new Activity type
        if (isset($_POST['addAct'])) {
            $activityname = $_POST['activityname'];
            $sqlAddAct = "INSERT INTO activity_type (activityname)VALUES('" . $activityname . "')";
            $resAddAct = $conn->query($sqlAddAct);
            if ($resAddAct) {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ActivityAdded').modal('show');
            });
        </script>";
            } else {
                $ActivityNotAdded = $conn->error;
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ActivityNotAdded').modal('show');
            });
        </script>";
            }
        }
        // End Add Activity Type

        if (isset($_POST['upload'])) {

            $ActivityName = $_POST['ActivityName'];
            $SectionName = $_POST['SectionName'];
            $ActivityTitle = $_POST['ActivityTitle'];
            $ActivityDescription = $_POST['ActivityDescription'];
            $UserId = $_SESSION['id'];
            $ActivityDate = date('Y-m-d');

            $picName = ($_FILES['AcitivtyImage']['name']);
            $picTemp = ($_FILES['AcitivtyImage']['tmp_name']);
            $picType = ($_FILES['AcitivtyImage']['type']);
            $picSize = ($_FILES['AcitivtyImage']['size']);

            $target_path = "upload/" . basename($picName);

            $uploadOk = 1;
            $imageFileType = pathinfo($target_path, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

            $check = getimagesize($picTemp);
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $MsgForImage = $MsgForImage ."<br>File is not an image.";
                $uploadOk = 0;
            }

// Check if file already exists
            if (file_exists($target_path)) {
                $MsgForImage = $MsgForImage ."<br>Sorry, file already exists.";
                $uploadOk = 0;
            }
// Check file size
            if ($picSize > 2500000) {
                $MsgForImage = $MsgForImage ."<br>Sorry, your file is too large. Maxmun Size is 2.5 MB";
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                $MsgForImage = $MsgForImage ."<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $MsgForImage = $MsgForImage ."<br>Sorry, your file was not uploaded.";
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($picTemp, $target_path)) {
                    $MsgForImage = $MsgForImage ."<br>The file " . basename($picName) . " has been uploaded.";

                    $sqlAdAc = "INSERT INTO `activites`(`activityid`, `sectionid`, `title`, `decription`, `img`, `userid`, `activitydate`) VALUES ('" . $ActivityName . "','" . $SectionName . "','" . $ActivityTitle . "','" . $ActivityDescription . "','" . $target_path . "','" . $UserId . "','" . $ActivityDate . "') ";
                    $resAdAc = $conn->query($sqlAdAc);
                    if ($resAdAc) {
                        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
                    } else {
                        $MsgForImage = $MsgForImage ."<br>" . $conn->error;
                        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
                    }
                } else {
                    $MsgForImage = $MsgForImage ."<br>Sorry, there was an error uploading your file.";
                    echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
                }
            }
        }
        ?>
        <div class="text-center container">
            <h1 class="textTitleYY">ADD ACTIVITIES</h1>
            <br><br>

            <!-- Form To Add Activities -->
            <form actioin="" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-4">
                        <label>Select Activity</label>
                    </div>
                    <div class="col-sm-4">
                        <select name="ActivityName" class="form-control">
                            <?php
                            $sqlAct = "SELECT * FROM activity_type GROUP BY activityname";
                            $resAct = $conn->query($sqlAct);
                            while ($rowAct = $resAct->fetch_assoc()) {
                                echo "<option value='" . $rowAct['activityid'] . "'>" . $rowAct['activityname'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <a href="#AddNewActivity" role="button" data-toggle="modal"><span class="btn btn-default">+</span></a>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Select Section</label>
                    </div>
                    <div class="col-sm-4">
                        <select name="SectionName" class="form-control">
                            <?php
                            $sqlSec = "SELECT * FROM section_type";
                            $resSec = $conn->query($sqlSec);
                            while ($rowSec = $resSec->fetch_assoc()) {
                                echo "<option value='" . $rowSec['sectionid'] . "'>" . $rowSec['sectionname'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Title</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="ActivityTitle">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Description</label>
                    </div>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="ActivityDescription" rows="5"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Choose Your Image</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="file" name="AcitivtyImage" class="btn btn-default">
                    </div>
                </div>
                <br>
                <input type="submit" name="upload" value="Upload" class="btn" id="youssry">
            </form>
            <!-- End Form Add Activities -->

            <!-- Modal Add New Activity-->
            <div class="modal fade" id="AddNewActivity" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label>Add New Activity</label>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Activity Name</label>
                                    <input type="text" name="activityname" class="form-control">
                                </div>
                                <input type="submit" name="addAct" Value="Add" class="btn btnLogin">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Add New Activity-->

            <!-- Modal Activity Is Added-->
            <div class="modal fade" id="ActivityAdded" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label>Activity Is Added</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Activity Is Added-->

            <!-- Modal Activity Not Added-->
            <div class="modal fade" id="ActivityNotAdded" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label style="color:red;"><?php echo $ActivityNotAdded; ?><br>Activity Not Added</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Activity Not Added-->

            <!-- Modal For Image-->
            <div class="modal fade" id="ImageCase" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label style="color:red;"><?php echo $MsgForImage; ?></label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal For Image-->
        </div>
    </body>
</html>

