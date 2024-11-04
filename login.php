<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>WiradaMotor</title>
    <link rel="stylesheet" href="./css/login.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>
    <div class="body"></div>
    <div class="grad"></div>
    <form action="./process/login.php" method="post">
        <div class="header">
            <div>Wiradara<b>Motor</b></div>
        </div>
        <br />
        <div class="login">
            <input type="text" placeholder="username" name="username" required /><br />
            <input type="password" placeholder="password" name="password" required /><br />
            <input type="submit" name="submit" value="Login" />
        </div>
        <?php
        if (isset($_GET['error'])) {
            echo "<p style='color:red'>Username atau password salah</p>";
        }
        ?>
    </form>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>

</html>