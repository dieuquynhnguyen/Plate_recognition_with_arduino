<html>
<head>
    <title>Trang Admin</title>
    <meta charset="utf-8">


    <style>
        .icon{
            font-size: 20px;
        }
        .row{
            font-size: 25px;
        }
        .text-info{
            font-size: 18px;
        }
        .text-add a{
            text-decoration: none;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <header class="header mb-5">
        <div class="container-fluid bg-info text-center py-2 text-white">
            <div class="row">
                <div class="col-6">
                    <span>QUẢN LÍ BÃI ĐỖ XE</span>
                </div>
                <div class="col-6">
                    <span>Admin: Lê Nhật Tân</span>
                </div>
            </div>
        </div>
    </header>

    
    <?php
        require('connect_db.php');

        // query students table
        $sql = 'SELECT * FROM `dulieuxevaora`';

        $result = mysqli_query($link, $sql);

        if(!$result) {
            die('Query error: [' . $db->error . ']');
        }
    ?>

    <div class="text-add container d-flex justify-content-end">
        <a href="create.php" class="text-info">
            <i class="icon fa fa-plus-circle mr-2"><span> Thêm</span></i>
        </a>
    </div>

    <div class="container pt-5">
        <table class="table table-striped">
            <thead class="text-info font-weight-bold">
              <tr>
                <th>Tên</th>
                <th>Biển Số Xe</th>
                <th>Giờ Xe Vào</th>
                <th>Số Điện Thoại</th>
                <th>Quản Lí</th>
              </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $row['tenchuxe']; ?></td>
                        <td class="font-weight-bold"><?php echo $row['biensoxe']; ?></td>
                        <td><?php echo $row['gioxevao']; ?></td>
                        <td><?php echo $row['sodienthoai']; ?></td>
                        <td>
                            <a href="delete.php?biensoxe=<?php echo $row['biensoxe']; ?>" class="delete">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    
    <script type="text/javascript">
        init_reload();
        function init_reload(){
            setInterval( function() {
            window.location.reload();
 
          },1000);
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>