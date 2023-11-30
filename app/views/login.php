<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TERMINAL BUS CILACAP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
            text-align: center;
        }

        .login-form h2 {
            margin-bottom: 20px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="submit"],
        .login-form a {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-decoration: none;
            display: block;
            color: #000;
        }

        .login-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-form .back-btn {
            background-color: darkorange;
            font-size: 13px;
            color: white;
        }

        .login-form .back-btn:hover {
            background-color: orangered;
        }

        .login-form img {
            max-width: 20%;
            height: auto;
            display: block;
            margin: 0 auto 20px;
            /* Untuk memberikan ruang antara logo dan judul */
        }

        .password-toggle {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            /* Mengatur jarak dari tepi kanan */
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 20px;
            color: #ccc;
        }

        .toggle-password.active {
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="login-form">
        <img src="../../public/asset/logo.png" alt="Logo Terminal Bus Cilacap">
        <h2>Terminal Bus Cilacap</h2>
        <form action="proses_login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <div class="password-toggle">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                    </svg></span>
            </div>
            <input type="submit" value="Login">
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.querySelector('.toggle-password');

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.add('active');
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove('active');
            }
        }
    </script>

</body>

</html>