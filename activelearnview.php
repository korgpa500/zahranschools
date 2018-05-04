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
    </head>

    <body>
        <?php
        include './temp/NavBar.php';
        if (isset($_GET['id'])) {
            $Alid = $_GET['id'];
            $FileName = $_GET['active_file'];
            $delFile = unlink($FileName);
            $sqlDel = "DELETE FROM active_learn WHERE id='" . $Alid . "'";
            $resDel = $conn->query($sqlDel);
            if ($resDel) {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ActiveDel').modal('show');
            });
        </script>";
            }
        }
        ?>

        <div class="container text-center">
            <h1 class="textTitleYY">VIEW UPLOADS</h1>
            <h4>Hello Mr/Miss <?php echo $_SESSION['name']; ?>, this is Files you are uploaded</h4>

            <div class="row">
                <?php
                $sql = "SELECT * FROM active_learn";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $id = $row['id'];
                    $AlFile = $row['active_file'];
                    ?>
                    <div class="col-sm-2">
                        <div class="thumbnail">
                            <a href="?id=<?php echo $id; ?>&& active_file=<?php echo $AlFile; ?>" role="button" data-toggle="modal"><span class="btn">&times;</span></a>
                            <a href="<?php echo $AlFile; ?>" target="_blanck">
                                <?php
                                $exAl = substr($AlFile, -4);
                                switch ($exAl) {
                                    case '.pdf':
                                        echo "<img src='image/pdf.png' alt='" . $row['active_title'] . "' style='width:100%' title='" . $row['active_title'] . "' id='you'>";
                                        break;
                                    case '.doc':
                                        echo "<img src='image/Word.png' alt='" . $row['active_title'] . "' style='width:100%' title='" . $row['active_title'] . "' id='you'>";
                                        break;
                                    case 'docx':
                                        echo "<img src='image/Word.png' alt='" . $row['active_title'] . "' style='width:100%' title='" . $row['active_title'] . "' id='you'>";
                                        break;
                                    default :
                                        echo "<img src='" . $AlFile . "' alt='" . $row['active_title'] . "' style='width:100%' title='" . $row['active_title'] . "' id='you'>";
                                        break;
                                }
                                ?>

                                <div class="caption">
                                    <p><?php echo $row['active_title']; ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Modal Active Is Deleted-->
            <div class="modal fade" id="ActiveDel" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label>File Is Deleted</label>
                        </div>
                        <div class="modal-footer">
                            <form action="activelearnview.php" method="post">
                                <input type="submit" value="Close" class="btn btn-default" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Active Is Deleted-->

        </div>
    </body>

</html>
