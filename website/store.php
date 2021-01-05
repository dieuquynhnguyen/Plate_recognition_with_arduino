<?php
require('connect_db.php');

$biensoxe = "";
$tenchuxe = "";
$gioxevao = "";
$sodienthoai = "";


if ($_SERVER["REQUEST_METHOD"] == "POST")
    if(isset($_POST["biensoxe"])) { $biensoxe = $_POST['biensoxe']; }
    if(isset($_POST["tenchuxe"])) { $tenchuxe = $_POST['tenchuxe']; }
    if(isset($_POST["gioxevao"])) { $gioxevao = $_POST['gioxevao']; }
    if(isset($_POST["sodienthoai"])) { $sodienthoai = $_POST['sodienthoai'];
        
    $sql = "INSERT INTO dulieuxevaora(biensoxe, tenchuxe, gioxevao, sodienthoai) VALUES('$biensoxe', '$tenchuxe', '$gioxevao', '$sodienthoai')";
}

   

    mysqli_query($link, $sql);

    $adminURL = 'admin.php';
    header('Location: '.$adminURL);
?>