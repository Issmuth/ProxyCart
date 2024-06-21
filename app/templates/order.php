<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/orders.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>">
    <link rel="stylesheet" href="../static/styles/navbar.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>">
    <title>Order</title>
    <link rel="shortcut icon" href="../static/images/favicon.png?" type="image/x-icon">
    <script src="../static/scripts/jquery-3.6.0.min.js"></script>
    <script src="../static/scripts/order.js?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>"></script>
</head>

<body>
    <header>
        <img id="bgtop" class="bg" src="../static/images/Group 20.png" alt="" />
        <img id="bg1" class="bg" src="../static/images/Ellipse 11.png" alt="" />
        <img id="bg2" class="bg" src="../static/images/Group 21.png" alt="" />
        <img id="bg3" class="bg" src="../static/images/Ellipse 10.png" alt="" />
        <nav>
            <img id="toplogo" src="../static/images/Logo.png" alt="logo" />
            <div class="navbar-items">
                <a id="nav-item" href="/?ss=<?php echo $_SESSION['session'] . '&user=' . $_SESSION['user']?>">Home</a>
                <a id="nav-item" href="/travel?ss=<?php echo $_SESSION['session'] . '&user=' . $_SESSION['user']?>">Travel</a>
                <a id="nav-item" class="myspace" href="/myspace?ss=<?php echo $_SESSION['session'] . '&user=' . $_SESSION['user'] ?>">My Space</a>
            </div>
        </nav>
    </header>

    <div id="success" class="post-status success">Order Successful</div>
    <div id="fail" class="post-status failure">Failed to make Order. Try Again</div>

    <form id="order-form">
        <div class="info left">
            <div class="order-info">
                <img class="order-img" src="../static/images/city-icon.jpg">
                <div>
                    <textarea pname="description" id="description" placeholder="Description of the product" maxlength="1024"></textarea>
                </div>
            </div>
        <div class="divider"></div>
        </div>
        <div class="info right">
                <div class="form login">
                    <h1>Make your order</h1>
                    <div class="product-info">
                        <div class="input-box">
                            <input type="text" id="name" name="password" required placeholder="&#8203">
                            <label>Name</label>
                        </div>
                        <div class="input-box">
                            <input type="text" id="url" name="url" required placeholder="&#8203">
                            <label><img class="img-icon" src="../static/images/Link.png">Product URL</label>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="input-box" class="price">
                            <input type="text" name="price" id="price" required placeholder="&#8203">
                            <label><img src="../static/images/coin.svg" class="img-icon">Price</label>
                        </div>
                        <div class="input-box" class="price">
                            <input type="text" name="reward" id="reward" required placeholder="&#8203">
                            <label><img src="../static/images/gift.svg" class="img-icon">Reward</label>
                        </div>
                        <div class="input-box date">
                            <img class="img-icon" src="../static/images/clock.svg" alt="">
                            Deadline <input type="date" id="date" name="date" required placeholder="&#8203">
                        </div>
                    </div>
                    <div class="location">
                        <input type="text" name="from" id="from" placeholder="From">
                        <input type="text" name="to" id="to" placeholder="To" required>
                        <img class="img-icon swap" src="../static/images/Asset 1.png" alt="">
                    </div>
                    <button type="submit" class="btn">Order</button>
                </div>
        </div>
    </form>
</body>

</html>