<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
    body{
        background-image: linear-gradient(blue,violet);
    }
        .container { margin-top: 200px; }
        .card { width: 300px; }
        .card:hover {
            transform: scale(1.05);
            transition: all .3s ease-in-out;
        }
        .price { font-size: 72px }
        .currency {
            font-size: 25px;
            position: relative;
            top: -30px;
        }
        .list-group-item {
            border: 0px;
            padding: 5px;
        }
        .card-body{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="price"><span class="currency">$</span>0</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="text-center">FREE SUBSCRIPTION</h2>
                        <ul class="list-group">
                            <li class="list-group-item">Feature 1</li>
                            <li class="list-group-item">Feature 2</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <form action="paymentProcess.php?pid=1" method="POST">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_0JpCUYDFRozrRt4iXNCJuJkd0091xRixmq"
                                    data-amount="000"
                                    data-name="CVRR"
                                    data-description="CVRR_SUBSCRIPTION"
                                    data-image="images/test.png"
                                    data-locale="auto"
                                    data-currency="usd">
                            </script>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="price"><span class="currency">$</span>25</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="text-center">COMBO SUBSCRIPTION</h2>
                        <ul class="list-group">
                            <li class="list-group-item">Feature 1</li>
                            <li class="list-group-item">Feature 2</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <form action="paymentProcess.php?pid=2" method="POST">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_0JpCUYDFRozrRt4iXNCJuJkd0091xRixmq"
                                    data-amount="2500"
                                    data-name="CVRR"
                                    data-description="CVRR_SUBSCRIPTION"
                                    data-image="images/test.png"
                                    data-locale="auto"
                                    data-currency="usd">
                            </script>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="price"><span class="currency">$</span>50</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="text-center">ELITE SUBSCRIPTION</h2>
                        <ul class="list-group">
                            <li class="list-group-item">Feature 1</li>
                            <li class="list-group-item">Feature 2</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <form action="paymentProcess.php?pid=3" method="POST">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_0JpCUYDFRozrRt4iXNCJuJkd0091xRixmq"
                                    data-amount="5000"
                                    data-name="CVRR"
                                    data-description="CVRR_SUBSCRIPTION"
                                    data-image="images/test.png"
                                    data-locale="auto"
                                    data-currency="usd">
                            </script>
                        </form>
                    </div>
                </div>
            </div>


             <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="price"><span class="currency">$</span>110</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="text-center">PREMIUM SUBSCRIPTION</h2>
                        <ul class="list-group">
                            <li class="list-group-item">Feature 1</li>
                            <li class="list-group-item">Feature 2</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <form action="paymentProcess.php?pid=1" method="POST">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_0JpCUYDFRozrRt4iXNCJuJkd0091xRixmq"
                                    data-amount="000"
                                    data-name="CVRR"
                                    data-description="CVRR_SUBSCRIPTION"
                                    data-image="images/test.png"
                                    data-locale="auto"
                                    data-currency="usd">
                            </script>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>