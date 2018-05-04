<?php
session_start();
$msgDel = "";
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
        <link rel="stylesheet" href="style/style.css">
        <link href="image/logo.jpg" rel="icon" type="jpg">
    </head>

    <body>

        <?php
        include './temp/NavBar.php';
        if (isset($_GET['id'])) {
            $idNews = $_GET['id'];

            $sqlFile = "SELECT * FROM news WHERE id=" . $idNews;
            $resFile = $conn->query($sqlFile);
            $rowFile = $resFile->fetch_Assoc();

            $sqlDel = "DELETE FROM news WHERE id=" . $idNews;
            $resDel = $conn->query($sqlDel);
            if ($resDel) {
                if ($rowFile['new_file'] != "") {
                    unlink($rowFile['new_file']);
                }
                $msgDel = "Delete Completed";
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#DelNews').modal('show');
            });
        </script>";
            } else {
                $msgDel = "News Not Deleted" . $conn->error;
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#DelNews').modal('show');
            });
        </script>";
            }
        }
        ?>
        <div class="container text-center">
            <div class="left"><h1 class="textTitleY">ZAHRAN LANGUAGE SCHOOLS</h1></div>
            <div class="left"><h1 class="textTitleY">NEWS</h1></div>
            <br><br>
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr class="info">
                        <th class="text-center">Title</th>
                        <th class="text-center">Date</th>
                        <?php
                        if (isset($_SESSION['type']) AND $_SESSION['type'] == 1) {
                            echo "<th class='text-center'>Delete</th>";
                        }
                        ?>
                    </tr>
                </thead>

                <?php
                $sqlNews = "SELECT * FROM news";
                $resNews = $conn->query($sqlNews);
                while ($rowNews = $resNews->fetch_assoc()) {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td><a href='news_des.php?id=" . $rowNews['id'] . "'>" . $rowNews['title'] . "</a></td>";
                    echo "<td>" . $rowNews['news_day'] . "</td>";
                    if (isset($_SESSION['type']) AND $_SESSION['type'] == 1) {
                        echo "<td class='text-center'><a href='?id=" . $rowNews['id'] . "'>Delete</a></td>";
                    }
                    echo "</tr>";
                    echo "</tbody>";
                }
                ?>
            </table>


            <!-- Modal For Del News-->
            <div class="modal fade" id="DelNews" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Information</h4>
                        </div>
                        <div class="modal-body">
                            <label style="color:red;"><?php echo $msgDel; ?></label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Del News-->

        </div>
    </body>
</html>