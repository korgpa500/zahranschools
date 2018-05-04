<?php
//session_start();
$userDb = "root";
$passDb = "";
$hostDb = "localhost";
$nameDb = "zahranschool";

//$userDb = "2100622_zahranschool";
//$passDb = "963258741@Aas";
//$hostDb = "fdb12.biz.nf";
//$nameDb = "2100622_zahranschool";

$conn = new mysqli($hostDb, $userDb, $passDb, $nameDb);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->query("SET NAMES utf8");

//$User = "";
