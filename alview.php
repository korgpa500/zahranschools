<?php
session_start();

$kind = $_GET['kind'];
$type = $_GET['type'];
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
        <link rel="stylesheet" href="style/gallery-grid.css">
        <link rel="stylesheet" href="style/kgstyle.css">
        <link rel="stylesheet" href="style/style.css">
        <link href="image/logo.jpg" rel="icon" type="jpg">
    </head>

    <body>

        <?php
        include './temp/NavBar.php';
        include './temp/config.php';
        ?>
        <div class="container text-center">
            <h1 class="textTitleY">ZAHRAN LANGUAGE SCHOOLS</h1>
            <img src="image/Logot.png" alt="Logo" id="logoT">
            <h1 class="textTitleYY" style='font-size:25px;'>Active Learning</h1>
            <h1 class="textTitleYY" style='font-size:25px;'><?php echo $type; ?></h1>
            <h1 class="textTitleYY" style='font-size:25px;'><?php echo $kind; ?></h1>
            <br>

            <?php
            $sqlKind = "SELECT * FROM `active_learn_kind` WHERE `kind_name`='" . $kind . "'";
            $resKind = $conn->query($sqlKind);
            $rowKind = $resKind->fetch_assoc();
            $KindId = $rowKind['id'];
            ?>
            <div class="tz-gallery">
                <div class="row">

                    <?php
                    $sqlALWX = "SELECT * FROM `active_learn` WHERE `kind_id`='" . $KindId . "' AND (`active_file` LIKE '%.docx' OR `active_file` LIKE '%.doc')";
                    $resALWX = $conn->query($sqlALWX);
                    if ($resALWX->num_rows > 0) {
                        ?>
                        <div class='col-sm-6 col-md-12'>
                            <div class='thumbnail'>
                                <div class='row text-center'>
                                    <?php
                                    while ($rowALWX = $resALWX->fetch_assoc()) {
                                        echo "<div class='col-sm-2 col-md-2'>";
                                        echo "<div class='thumbnail'>";
                                        echo "<a class='lightbox' href='" . $rowALWX['active_file'] . "'>";
                                        echo "<img src='image/Word.png' alt='" . $rowALWX['active_title'] . "' title='" . $rowALWX['active_title'] . "'>";
                                        echo "</a>";
                                        echo "<div class='caption' style='padding:0px;'>";
                                        echo "<h3>" . $rowALWX['active_title'] . "</h3>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                                <div class='caption'>
                                    <h3 class="textTitleYY" style="font-size:20px;">Word File</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    $sqlALP = "SELECT * FROM `active_learn` WHERE `kind_id`='" . $KindId . "' AND `active_file` LIKE '%.pdf'";
                    $resALP = $conn->query($sqlALP);
                    if ($resALP->num_rows > 0) {
                        ?>

                        <div class='col-sm-6 col-md-12'>
                            <div class='thumbnail'>
                                <div class='row'>
                                    <?php
                                    while ($rowALP = $resALP->fetch_assoc()) {
                                        echo "<div class='col-sm-2 col-md-2'>";
                                        echo "<div class='thumbnail'>";
                                        echo "<a class='lightbox' href='" . $rowALP['active_file'] . "'>";
                                        echo "<img src='image/pdf.png' alt='" . $rowALP['active_title'] . "' title='" . $rowALP['active_title'] . "'>";
                                        echo "</a>";
                                        echo "<div class='caption' style='padding:0px;'>";
                                        echo "<h3>" . $rowALP['active_title'] . "</h3>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                                <div class='caption'>
                                    <h3 class="textTitleYY" style="font-size:20px;">PDF File</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    $sqlALPic = "SELECT * FROM `active_learn` WHERE `kind_id`='" . $KindId . "' AND `active_file` LIKE '%.jpg' || '%.png' || '&.bmp' || '%.gif' || '%.JPG' || '%.PNG' || '%.BMP' || '%.GIF'";
                    $resALPic = $conn->query($sqlALPic);
                    if ($resALPic->num_rows > 0) {
                        ?>

                        <div class='col-sm-6 col-md-12'>
                            <div class='thumbnail'>
                                <div class='row'>
                                    <?php
                                    while ($rowALPic = $resALPic->fetch_assoc()) {
                                        echo "<div class='col-sm-2 col-md-2'>";
                                        echo "<div class='thumbnail'>";
                                        echo "<a class='lightbox' href='" . $rowALPic['active_file'] . "'>";
                                        echo "<img src='" . $rowALPic['active_file'] . "' alt='" . $rowALPic['active_title'] . "' title='" . $rowALPic['active_title'] . "'>";
                                        echo "</a>";
                                        echo "<div class='caption' style='padding:0px;'>";
                                        echo "<h3>" . $rowALPic['active_title'] . "</h3>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                                <div class='caption'>
                                    <h3 class="textTitleYY" style="font-size:20px;">PHOTOS</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <script>
                baguetteBox.run('.tz-gallery');
            </script>


        </div>

    </body>
</html>

