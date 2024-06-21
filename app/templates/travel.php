<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/travel.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>">
    <link rel="stylesheet" href="../static/styles/navbar.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>">
    <link rel="stylesheet" href="../static/styles/login.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>">
    <script src="../static/scripts/jquery-3.6.0.min.js"></script>
    <script src="../static/scripts/travel.js?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <img id="bg1" class="bg" src="../static/images/Ellipse 11.png" alt="" />
        <img id="bg2" class="bg" src="../static/images/Group 21.png" alt="" />
        <nav>
            <img id="toplogo" src="../static/images/Logo.png" alt="logo" />
            <div class="navbar-items">
                <a id="nav-item" href="/?ss=<?php echo $_SESSION['session'] . '&user=' . $_SESSION['user']?>">Home</a>
                <a id="nav-item" href="">Order</a>
                <a id="nav-item" class="myspace " href="/myspace?ss=<?php echo $_SESSION['session'] . '&user=' . $_SESSION['user'] ?>">My Space</a>
            </div>
        </nav>
    </header>

    <!--form status-->
    <div id="success" class="post-status success">Post Successful</div>
    <div id="fail" class="post-status failure">Route already exists</div>

    <form id="order-form">
        <div class="info right">
            <div class="form login">
                <h1>Planning to go somewhere?</h1>
                <div class="location">
                    <input type="text" name="from" id="from" placeholder="Origin">
                    <input type="text" name="to" id="to" placeholder="Destination" required>
                    <img class="img-icon swap" src="../static/images/Asset 1.png" alt="">
                </div>

                <div class="product-info">
                    <div class="input-box date">
                        <img class="img-icon date" src="../static/images/leaving-icon.png" alt="">
                        Departure <input type="date" id="leaving-date" name="date" required placeholder="&#8203">
                    </div>
                    <div class="toggle-container">
                        <input type="checkbox" id="toggleButton" class="toggle-checkbox" value="round">
                        <label for="toggleButton" class="toggle-label"></label>
                    </div>
                    <p>Round Trip</p>
                </div>
                <div class="input-box date return hidden">
                    <img class="img-icon date" src="../static/images/return-icon.png" alt="">
                    Return <input type="date" id="return-date" name="date" placeholder="&#8203">
                </div>
                <button type="submit" class="btn">Post</button>
            </div>
        </div>
        <div class="divider"></div>


        <div class="info left">
            <div class="order-info">
                <img class="order-img" src="../static/images/city-icon.jpg">
                <div>
                    <textarea pname="description" id="description" placeholder="Anything you want our patrons to know"></textarea>
                </div>
            </div>
        </div>
    </form>
</body>

</html>