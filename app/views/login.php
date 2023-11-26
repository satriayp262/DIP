<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <link rel="stylesheet" href="../../public/css/login.css">
    <div class="wrapper">
        <div class="logo">
            <img src="../../public/asset/logo.png" alt="">
        </div>
        <div class="text-center mt-3 name">
            TERMINAL BUS CILACAP
        </div>
        <form class="p-3 mt-3" action="proses_login.php" method="post">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <a href="index.php" class="btn mt-3" style="background-color: orangered; display: block; text-align: center; text-decoration: none; color: #fff; border: none; border-radius: 25px; height: 40px; line-height: 40px; margin-top: 10px;">Kembali</a>
    </div>
</body>
</html>