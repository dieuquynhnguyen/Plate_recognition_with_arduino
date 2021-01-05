<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lí Bãi Đồ Xe</title>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <header class="header">
        <div class="container-fluid bg-info text-center py-2 text-white">
            <div class="row">
                <div class="col-6">
                    <span>Quản Lí Bãi Đỗ Xe</span>
                </div>
                <div class="col-6">
                    <span>Tân-Như-Quỳnh</span>
                </div>
            </div>
        </div>
    </header>


    <section>
        <div class="container py-5">
            <form id="form_id" method="POST" name="myForm">
                <div class="form-group">
                  <label for="email">ID</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <input type="button" value="Login" onclick="validate()" class="btn btn-info">
            </form>
        </div>
    </section>
    







    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        function validate(){
        var username = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        if ( username == "admin@gmail.com" && password == "123456"){
            alert ("Login successfully");
            window.location.replace("admin.php");
        }
        else{
            alert("Invalid username or password");
        }
     return false;
     }    
    </script>
</body>
</html>