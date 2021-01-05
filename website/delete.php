<?php
require('connect_db.php');
 
    $sql = "DELETE FROM dulieuxevaora WHERE biensoxe='".$_GET['biensoxe']."'";
 

mysqli_query($link, $sql);

$adminURL = 'admin.php';
header('Location: '.$adminURL);
?>