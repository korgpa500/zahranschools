<?php
session_start();
$id_news = $_GET['id'];
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
        ?>
        <div class="container text-center">
            <div><h1 class="textTitleY">ZAHRAN LANGUAGE SCHOOLS</h1></div>
            <div><h1 class="textTitleY">NEWS</h1></div>
            <br>

                <?php
                $sqlNews = "SELECT * FROM news WHERE id=".$id_news;
                $resNews = $conn->query($sqlNews);
                while ($rowNews = $resNews->fetch_assoc()) {
                    $sqlUser = "SELECT * FROM users WHERE id=".$rowNews['news_by'];
                    $resUser = $conn->query($sqlUser);
                    $rowUser = $resUser->fetch_assoc();
                    echo "<h2>" .$rowNews['title']. "</h2>";
                    if($rowNews['new_file'] != '' ){
                        echo "<img src='".$rowNews['new_file']."' class='imgNews'>";
                    }
                    echo "<h3>" .$rowNews['description']. "</h3>";
                    echo "<h4>By : " .$rowUser['fname']. " " . $rowUser['lname']. "</h4>";
                    echo "<h4>In :" .$rowNews['news_day']. "</h4>";
                }
                ?>

        </div>
    </body>
</html>