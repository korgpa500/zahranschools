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
        
        if(isset($_GET['id'])){
            $Actid = $_GET['id'];
            $imgname = $_GET['img'];
            $delImg = unlink($imgname);
            $sqlDel = "DELETE FROM activites WHERE id='".$Actid."'";
            $resDel = $conn->query($sqlDel);
        }
        ?>
        <div class="container text-center">
            <h1 class="textTitleYY">VIEW ACTIVITIES</h1>
            <h4>Hello Mr/Miss <?php echo $_SESSION['name']; ?>, this is activities you are uploaded</h4>

            <div class="row">
                <?php
                if($_SESSION['id'] == 1){
                    $sql = "SELECT * FROM activites";
                }else{
                    $sql = "SELECT * FROM activites WHERE userid ='" . $_SESSION['id'] . "'";
                }
                
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $id = $row['id'];
                    $img = $row['img'];
                    ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="?id=<?php echo $id; ?>&&img=<?php echo $img; ?>" role="button" data-toggle="modal"><span class="btn">&times;</span></a>
                            <a href="<?php echo $row['img']; ?>" target="_blanck">

                                <img src="<?php echo $row['img']; ?>" alt="<?php echo $row['title']; ?>" style="width:100%" title="<?php echo $row['title']; ?>" id="you">
                                <div class="caption">
                                    <p><?php echo $row['decription']; ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>
