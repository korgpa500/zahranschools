<?php
include 'config.php';
//Login and Make Session

if (isset($_POST['login'])) {
    //session_start();
    $teacherUser = $_POST['teacherUser'];
    $teacherPass = $_POST['teacherPass'];

    $sql = "SELECT * FROM users WHERE (email='" . $teacherUser . "' || phone='" . $teacherUser . "') && password='" . $teacherPass . "'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['fname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['type'] = $row['typeid'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['section'] = $row['sectionid'];
    } else {
        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#checkPass').modal('show');
            });
        </script>";
    }
}
//End Login
?>

<!-- Nav bar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <?php
            if (isset($_SESSION['name'])) {
                echo "<a href='#logout' role='button' data-toggle='modal' style='padding-right:0'><span class='btn btn-large btn-primary btnLogin'>Logout</span></a> &nbsp;&nbsp;<span class='textTitleYY' style='font-size:14px;color:#ffffff;text-shadow:#000000 1px 1px 1px;font-weight:normal;'>Hello:" . $_SESSION['name'] . "</span>";
            } else {
                ?>
                <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-primary btnLogin">Login</span></a>
                <?php
            }
            ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">HOME</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
                <li><a href="activity.php">GALLERY</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href='#'>SECTIONS
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="kg.php">K.G</a></li>
                        <li><a href='junior.php'>PRIMARY STAGE</a></li>
                        <li><a href='m_girls.php'>MIDDLE GIRLS</a></li>
                        <li><a href='m_boys.php'>MIDDLE BOYS</a></li>
                        <li><a href='s_girls.php'>SECONDARY GIRLS</a></li>
                        <li><a href='s_boys.php'>SECONDARY BOYS</a></li>
                    </ul>
                </li>
                <?php
                $sqlNews = "SELECT * FROM news";
                $resNews = $conn->query($sqlNews);
                if ($resNews->num_rows > 0) {
                    ?>
                    <li><a href="news_view.php">NEWS</a></li>
                    <?php
                }
                ?>
                <li><a href="index.php#contact">CONTACT</a></li>
                <?php
                if (isset($_SESSION['type'])) {
                    if ($_SESSION['type'] == 1) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href='#'>ADMINISTRATOR
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="users.php">USERS</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    if ($_SESSION['type'] == 3 || $_SESSION['type'] == 1) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href='#'>CONTROL
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="addactivities.php">ADD NEW ACTIVITY</a></li>
                                <li><a href="news_add.php">ADD NEWS</a></li>
                                <li><a href="viewactivities.php">VIEW ACTIVITIES</a></li>
                                <li><a href='message.php'>READ MESSAGE</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    if ($_SESSION['type'] == 2 || $_SESSION['type'] == 1) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href='#'>ACTIVE LEARN
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="addactivelearn.php">ADD NEW</a></li>
                                <li><a href="activelearnview.php">VIEW UPLOADS</a></li>
                                <li><a href="activemessage.php">VIEW MESSAGE</a></li>
                                <li><a href="activelearnEdit.php">EDIT USER INFO</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- End Nav Bar -->

<!-- Modal Login-->
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="User Name" class="form-control" name="teacherUser">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="teacherPass">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-success btnLogin" name="login">
                    </div>
                </form>		
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Model Login-->

<!-- Modal Logout-->
<div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Logout</h4>
            </div>
            <div class="modal-body">
                <form action="logout.php" method="post">
                    <div class="form-group">
                        <label>ARE YOU SURE YOU WANT TO LEAVE?</label>
                        <input type="submit" value="Logout" class="btn btn-warning btnLogin" name="logout">
                    </div>
                </form>		
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Model Logout-->

<!-- check your pass -->
<div class="modal fade" id="checkPass" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Message</h4>
            </div>
            <div class="modal-body">
                <label style="color:red">Username or password is INVALID</label>          	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end check -->