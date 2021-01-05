<html>
<head>
    <title>Chèn Dữ Liệu</title>
    <meta charset="utf-8">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php
    require('connect_db.php');
?>

<!-- <form method="POST" action="store.php">
    <p>
        <label for="biensoxe">BSX:</label>
        <input id="biensoxe" name="biensoxe" type="text" value="" required="true">
    </p>
    <p>
        <label for="tenchuxe">Họ & Tên:</label>
        <input id="tenchuxe" name="tenchuxe" type="text" value="" required="true">
    </p>
    <p>
        <label for="gioxevao">Ngày Giờ Xe Vào:</label>
        <input id="gioxevao" name="gioxevao" type="text" value="" required="true">
    </p>
    <p>
        <label for="sodienthoai">SDT:</label>
        <input id="sodienthoai" name="sodienthoai" type="text" value="" required="true">
    </p>
    <p>
        <input type="submit" value="Cập nhật">
    </p>
</form> -->

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 text-info">
                <h2>Chèn Dữ Liệu</h2>
            </div>
            <div class="col-12">
                <form method="POST" action="store.php">
                    <div class="form-group w-50">
                        <label for="biensoxe">Biển Số Xe</label>
                        <input name="biensoxe" type="text" class="form-control" id="biensoxe" placeholder="Nhập Biển Số Xe" required="true">   
                    </div>
                    <div class="form-group w-50">
                        <label for="tenchuxe">Họ & Tên</label>
                        <input name="tenchuxe" type="text" class="form-control" id="tenchuxe" placeholder="Nhập Tên" required="true">
                    </div>
                    <div class="form-group w-50">
                        <label for="gioxevao">Ngày Giờ Vào</label>
                        <input name="gioxevao" type="text" class="form-control" id="gioxevao" placeholder="Nhập Thời Gian" required="true">
                    </div>
                    <div class="form-group w-50">
                        <label for="sodienthoai">Số Điện Thoại</label>
                        <input name="sodienthoai" type="text" class="form-control" id="sodienthoai" placeholder="Nhập SĐT" required="true">
                    </div>
                    <input class="btn btn-info" type="submit" value="Cập nhật">
                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>