<html>
<head>
    <title>Trang admin</title>
    <meta charset="utf-8">
</head>
<body>
<h2>Quản Lý Bãi Đỗ Xe</h2>
<?php
    require('connect_db.php');

    // query chuyen table
    $sql = 'SELECT * FROM `chuyenXe`';

    $result = mysqli_query($link, $sql);

    if(!$result) {
        die('Query error: [' . $db->error . ']');
    }

    echo mysqli_num_rows($result);
?>
</body>
</html>