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
        ?>
        <div class="container text-center">
            <h1 class="textTitleY">ZAHRAN LANGUAGE SCHOOLS</h1>
            <h1 class="textTitleY">GALLERY</h1>

            <div class="tz-gallery">

                <div class="row">

                    <?php
                    $sqlAll = "SELECT * FROM activites";
                    $resAll = $conn->query($sqlAll);
                    while ($rowAll = $resAll->fetch_assoc()) {

                        echo "<div class='col-sm-6 col-md-4'>";
                        echo "<div class='thumbnail'>";
                        echo "<a class='lightbox' href='" . $rowAll['img'] . "'>";
                        echo "<img src='" . $rowAll['img'] . "' alt='" . $rowAll['title'] . ">'>";
                        echo "</a>";
                        echo "<div class='caption'>";
                        echo "<h3>" . $rowAll['title'] . "</h3>";
                        echo "<p>" . $rowAll['decription'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
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