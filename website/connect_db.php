<html>
<head>
    <title>Kết Nối Database</title>
    <meta charset="utf-8">
</head>
<body>
<?php
    $link = mysqli_connect('localhost:3316', 'root', '', 'doan_kientruc');
    mysqli_set_charset($link, "utf8");


    if(!$link){
        die('Không thể kết nối với database: ' . $mysqli_connect_errno($link));
    }
?>
</body>
</html>