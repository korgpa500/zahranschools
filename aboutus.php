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
        <link rel="stylesheet" href="style/gallery-grid.css">
        <link rel="stylesheet" href="style/style.css">
        <link href="image/logo.jpg" rel="icon" type="jpg">
    </head>

    <body>

        <?php
        include './temp/NavBar.php';
        ?>
        <div class="container text-center">
            <div class="left"><h1 class="textTitleY">ZAHRAN LANGUAGE SCHOOLS</h1></div>
            <div class="left"><h1 class="textTitleY">ABOUT US</h1></div>
            <br><br>
            <h4>Zahran Language Schools [Z.L.S]</h4>
            <h4>Opened 1998 accepting students from all schools Upto Senior 1 grade.</h4>
            <h4>First class graduated at 2001.</h4>
            <h4>Zahran Boys School won the Pioneers Competition against all Alexandria Schools on 2002.</h4>
            <h4>Zahran Girls School won it on 2008.</h4>
            <br><br>

            <h1 class="textTitleY" style="font-size:46px;">School Planning</h1>

            <div class="tz-gallery">

                <div class="row">
                    <?php
                    for ($x = 1; $x <= 10; $x++) {
                        echo "<div class='col-sm-6 col-md-4'>";
                            echo "<a class='lightbox' href='image/drwa/" . $x . ".jpg'>";
                                echo "<img src='image/drwa/" . $x . ".jpg' alt='Park'>";
                            echo "</a>";
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

