<?php
    session_start();

    if (isset($_SESSION['loggedIn'])) {
        header('Location: dashboard.php');
        exit();
    }

    $msg = "";

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $conn = new mysqli("localhost", "root", "", "precur");
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        $sql = $conn->query("SELECT id, password, plan FROM users WHERE email='$email'");

        if ($sql->num_rows > 0) {
            $data = $sql->fetch_assoc();

            if (password_verify($password, $data['password'])) {
                $_SESSION['plan'] = $data['plan'];
                $_SESSION['userID'] = $data['id'];
                $_SESSION['loggedIn'] = '1';

                header('Location: dashboard.php');
                exit();
            }
        }

        $msg = "<span style='color:red'>Please Check Your Login Details</span>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        .container { margin-top: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <img src="images/test.png" /><br><br>
                <form method="POST">
                    <input class="form-control" name="email" placeholder="Email..."><br>
                    <input class="form-control" name="password" placeholder="Password..." type="password"><br>
                    <input type="submit" class="btn btn-primary" value="Log In">
                </form>
                <br><br>
                <?php echo $msg ?>
            </div>
        </div>
    </div>
</body>
</html>