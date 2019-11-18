<?php
    session_start();

    if (!isset($_SESSION['loggedIn'])) {
        header('Location: login.php');
        exit();
    }

    $plan = $_SESSION['plan'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        .container { margin-top: 100px; }

        .col-md-9 {
            border: 1px solid gray;
            border-radius: 5px;
        }

        img {
    
            border-radius: 50px;
        }

        .list-item {
            list-style: none;
            background: #0088cc;

            padding: 8px;
            border: 1px solid white;
        }

        .list-item a {
            color: #fff;
        }

        .list-item:hover {
            transition: all .3s ease-in-out;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="logout.php" style="float: right; margin-right: -15px;">Log Out</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" align="center">
                <img src="images/user.png" /><br><br>
                <ul class="list-group">
                    <li class="list-item">
                        <a href="#">
                            Feature 1
                        </a>
                    </li>
                    <?php
                        if ($plan >= 2) {
                            ?>
                            <li class="list-item">
                                <a href="#">
                                    Feature 2
                                </a>
                            </li>
                            <?php
                        }

                        if ($plan == 3) {
                            ?>
                            <li class="list-item">
                                <a href="#">
                                    Feature 3
                                </a>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-9" align="center">
                Content
            </div>
        </div>
    </div>
</body>
</html>