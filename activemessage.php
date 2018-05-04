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
        //Delete Message
        if (isset($_POST['delete'])) {
            $msgid = $_POST['msgid'];
            $sql = "DELETE FROM message_active WHERE id=" . $msgid;
            $res = $conn->query($sql);
            if ($res) {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#delMsg').modal('show');
            });
        </script>";
            } else {
                echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#notDelMsg').modal('show');
            });
        </script>";
            }
        }
        //End Delete

        ?>
        <div class="text-center container">
            <h1 class="textTitleYY"> ACTIVE LEARN MESSAGE</h1>
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr class="info">
                        <th>From</th>
                        <th>E-mail</th>
                        <th>Message</th>
                        <th>Section</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM message_active";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $type = $row['typeid'];
                    $sqlType = "SELECT * FROM active_learn_type WHERE id='".$type."'";
                    $resType = $conn->query($sqlType);
                    $rowType = $resType->fetch_assoc();
                    
                    echo "<tr>";
                    echo "<td>" . $row['msgname'] . "</td>";
                    echo "<td>" . $row['msgemail'] . "</td>";
                    echo "<td>" . $row['msgmessage'] . "</td>";
                    echo "<td>" . $rowType['type'] . "</td>";
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='msgid' value='" . $row['id'] . "'> ";
                    echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-primary'></td>";
                    echo "</form>";
                    echo "</tr>";
                    
                }
                ?>
                    </tbody>
            </table>
        </div>

        <!-- Modal Delete Message-->
        <div class="modal fade" id="delMsg" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Information</h4>
                    </div>
                    <div class="modal-body">
                        <label>MESSAGE IS DELETED</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Delete Message-->

        <!-- Modal Not Delete Message-->
        <div class="modal fade" id="notDelMsg" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Information</h4>
                    </div>
                    <div class="modal-body">
                        <label>MESSAGE NOT DELETED</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Not Delete Message-->

    </body>
</html>

