<?php
    use PHPMailer\PHPMailer\PHPMailer;

    $products = array(
        "pids" => ["1", "2", "3" , "4"],
        "1" => "plan_EmYo05DSiqvDUJ",
        "2" => "plan_EmZ6n05CvANQey",
        "3" => "plan_EmZ8gX0fx2dsG2",
        "4" =>"plan_EmZ8FPj68W9pCg"
    );

    if (!isset($_GET['pid']) || !in_array($_GET['pid'], $products['pids']) || !isset($_POST['stripeToken']) || !isset($_POST['stripeEmail'])) {
        header('Location: index.php');
        exit();
    }

    require_once('stripe-php-6.24.0/init.php');

    $stripe = [
        "secret_key"      => "<>",
        "publishable_key" => "<>",
    ];

    \Stripe\Stripe::setApiKey($stripe['secret_key']);

    $pid = $_GET['pid'];
    $token  = $_POST['stripeToken'];
    $email  = $_POST['stripeEmail'];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source'  => $token,
    ]);

    \Stripe\Subscription::create([
        "customer" => $customer->id,
        "items" => [
            [
                "plan" => $products[$pid],
            ],
        ]
    ]);

    $conn = new mysqli("localhost", "root", "", "precur");
    $email = $conn->real_escape_string($email);

    $sql = $conn->query("SELECT id FROM users WHERE email='$email'");

    if ($sql->num_rows > 0) {
        $conn->query("UPDATE users SET plan='$pid' WHERE email='$email'");
        $password = "Your Old Password";
    } else {
        $password = "<>";
        $password = str_shuffle($password);
        $password = strtoupper(substr($password, 0, 10));
        $ePassword = password_hash($password, PASSWORD_BCRYPT);
        $conn->query("INSERT INTO users (email, plan, password, regDate) VALUES ('$email', '$pid', '$ePassword', NOW())");
    }

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();
    $mail->Host = "smtp.gmail.com";
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "";
    $mail->Password = '';
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl";//tls
    $mail->addAddress($email);
    $mail->setFrom("", "cvrr");
    $mail->isHTML(true);
    $mail->Subject = "!!YOU subscribed to CVRROCKET!!";
    $mail->Body = "
        HOWDy,
        <br><br>
        Hi mate you subscribed to CVRR connectworld(SOCIO)<br><br><br><br>
        Following are your details<br><br><br><br>
        <b>username</b>: $email<br>
        <b>password</b>: $password<br><br><br><br>
        
        <a href='http://localhost/Recurring-Payments/login.php'>Click Here To Login</a><br><br>
        
        Thanks,signing off<br>
        CVR.
    ";

    if ($mail->send())
        $error = 0;
    else
        $error = 1;

    header('Location: thank-you.php?ue='.$email.'&e='.$error.'&p='.$password.'&pid='.$pid);
?>
