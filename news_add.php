<?php
session_start();
if (!isset($_SESSION['type'])) {
    header('Location: logout.php');
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

        $NewsNotAdded = "";

        $MsgForImage = "";

        if (isset($_POST['upload'])) {

            $NewsTitle = $_POST['NewsTitle'];
            $NewsDescription = $_POST['NewsDescription'];
            $News_By = $_SESSION['id'];
            $News_Section = $_SESSION['section'];
            $News_Day = date('Y-m-d');

            $picName = ($_FILES['NewsImage']['name']);
            $picTemp = ($_FILES['NewsImage']['tmp_name']);
            $picType = ($_FILES['NewsImage']['type']);
            $picSize = ($_FILES['NewsImage']['size']);

            if ($picSize == 0) {
                $sqlAdAc = "INSERT INTO `news`(`title`, `description`, `new_file`, `news_by`, `news_day`, `news_section`) VALUES ('" . $NewsTitle . "','" . $NewsDescription . "','','" . $News_By . "','" . $News_Day . "','" . $News_Section . "')";
                $resAdAc = $conn->query($sqlAdAc);
                if ($resAdAc) {
                    $MsgForImage = "News Was Uploadded";
                    echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
                } else {
                    $MsgForImage = "News Not Uploadded<br>" . $conn->error;
                    echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
                }
            } else {

                $target_path = "news/" . basename($picName);

                $uploadOk = 1;
                $imageFileType = pathinfo($target_path, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

                $check = getimagesize($picTemp);
                if ($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $MsgForImage = $MsgForImage . "<br>File is not an image.";
                    $uploadOk = 0;
                }

// Check if file already exists
                if (file_exists($target_path)) {
                    $MsgForImage = $MsgForImage . "<br>Sorry, file already exists.";
                    $uploadOk = 0;
                }
// Check file size
                if ($picSize > 2500000) {
                    $MsgForImage = $MsgForImage . "<br>Sorry, your file is too large. Maxmun Size is 2.5 MB";
                    $uploadOk = 0;
                }
// Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $MsgForImage = $MsgForImage . "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
// Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $MsgForImage = $MsgForImage . "<br>Sorry, your file was not uploaded.";
                    echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
// if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($picTemp, $target_path)) {
                        $MsgForImage = $MsgForImage . "<br>The file " . basename($picName) . " has been uploaded.";

                        $sqlAdAc = "INSERT INTO `news`(`title`, `description`, `new_file`, `news_by`, `news_day`, `news_section`) VALUES ('" . $NewsTitle . "','" . $NewsDescription . "','" . $target_path . "','" . $News_By . "','" . $News_Day . "','" . $News_Section . "')";
                        $resAdAc = $conn->query($sqlAdAc);
                        if ($resAdAc) {
                            echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
                        } else {
                            $MsgForImage = $MsgForImage . "<br>" . $conn->error;
                            echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
                        }
                    } else {
                        $MsgForImage = $MsgForImage . "<br>Sorry, there was an error uploading your file.";
                        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ImageCase').modal('show');
            });
        </script>";
                    }
                }
            }
        }
        ?>
        <div class="text-center container">
            <h1 class="textTitleYY">ADD NEWS</h1>
            <br><br>

            <!-- Form To Add News -->
            <form actioin="" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-4">
                        <label>Title</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="NewsTitle">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Description</label>
                    </div>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="NewsDescription" rows="5"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Choose Your Image</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="file" name="NewsImage" class="btn btn-default">
                    </div>
                </div>
                <br>
                <input type="submit" name="upload" value="Upload" class="btn" id="youssry">
            </form>
            <!-- End Form Add News -->

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


