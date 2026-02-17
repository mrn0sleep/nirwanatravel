<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="login.css">
</head>
  <body>

    <div class="container">
        <div class="form-box active" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <input type="email" name="email" maxlength="80" placeholder="EMAIL" required>
                <input type="password" name="password" placeholder="PASSWORD" required>
                <button type="submit" name="login">Login</button>   
                <p>Tidak mempunyai akun? <a href="#" onclick="showForm('register-form')">Registrasi</a></p>
            </form>
        </div>

        <div class="form-box" id="register-form">
            <form action="login_register.php" method="post">
                <h2>Registrasi</h2>
                <input type="text" name="name" placeholder="NAMA" required>
                <input type="email" name="email" placeholder="EMAIL" required>
                <input type="password" name="password" placeholder="PASSWORD" required>
                <button type="submit" name="login">Registrasi</button>
                <p>Sudah mempunyai akun? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>
    <script src="scriptlog.js"></script>
  </body>
</html>