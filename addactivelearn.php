<?php
session_start();
if (!isset($_SESSION['type'])) {
    header('Location: logout.php');
}
$typeUser = $_SESSION['type'];
if (isset($_SESSION['type'])) {
    if ($typeUser == 2 || $typeUser == 1) {
        
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
        <script src="script/yscript.js"></script>
    </head>

    <body>
        <?php
        include './temp/NavBar.php';

        if (isset($_POST['uploadactive'])) {
            $ActivrLearnType = $_POST['ActivrLearnType'];
            $ActivrLearnKind = $_POST['ActivrLearnKind'];
            $ativeTitle = $_POST['ativeTitle'];

            $fileName = ($_FILES['ativeFile']['name']);
            $fileTemp = ($_FILES['ativeFile']['tmp_name']);
            $fileType = ($_FILES['ativeFile']['type']);
            $fileSize = ($_FILES['ativeFile']['size']);

            $target_path = "active_learn/" . basename($fileName);

            if (move_uploaded_file($fileTemp, $target_path)) {
                //$MsgForImage = $MsgForImage ."<br>The file " . basename($picName) . " has been uploaded.";

                $sqlAdAc = "INSERT INTO `active_learn`(`kind_id`, `active_file`, `active_title`) VALUES ('" . $ActivrLearnKind . "','" . $target_path . "','" . $ativeTitle . "')";
                $resAdAc = $conn->query($sqlAdAc);
                if ($resAdAc) {
                    echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ActiveAdd').modal('show');
            });
        </script>";
                }
            }
        }
        ?>

        <div class="text-center container">

            <div class="row">
                <div class="col-sm-6">
                    <h1 class="textTitleYY">Add To Active Learning</h1>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <h3>Select Section</h3>
                            <select name="ActivrLearnType" class="form-control" onchange="showKind(this.value)">
                                <option value="0"></option>
                                <?php
                                $sqlActiveType = "SELECT * FROM active_learn_type";
                                $resActiveType = $conn->query($sqlActiveType);
                                while ($rowActiveType = $resActiveType->fetch_assoc()) {
                                    echo "<option value='" . $rowActiveType['id'] . "'>" . $rowActiveType['type'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div id="selectKind" class="form-group">

                        </div>

                        <div id="inputFile">

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

            <!-- Modal Active Is Added-->
            <div class="modal fade" id="ActiveAdd" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label>File Is Added</label>
                        </div>
                        <div class="modal-footer">
                            <form action="addactivelearn.php" method="post">
                                <input type="submit" value="Close" class="btn btn-default" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Active Is Added-->

        </div>

    </body>
</html>

