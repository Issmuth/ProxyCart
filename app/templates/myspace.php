<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/myspace.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString() ?>">
    <link rel="stylesheet" href="../static/styles/navbar.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString() ?>">
    <script src="../static/scripts/jquery-3.6.0.min.js"></script>
    <script src="../static/scripts/myspaceload.js?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString() ?>"></script>
    <title>My space</title>
</head>

<header>
    <img id="bg1" class="bg" src="../static/images/Ellipse 11.png" alt="" />
    <img id="bg2" class="bg" src="../static/images/Group 21.png" alt="" />
    <nav>
        <img id="toplogo" src="../static/images/Logo.png" alt="logo" />
        <div class="navbar-items">
            <a id="nav-item" href="/orderpost?ss=<?php echo $_SESSION['session'] . '&user=' . $_SESSION['user'] ?>">Order</a>
            <a id="nav-item" href="/travel?ss=<?php echo $_SESSION['session'] . '&user=' . $_SESSION['user'] ?>">Travel</a>
            <a id="nav-item" class="myspace hidden" href="">My Space</a>
            <a href="/"><button id="signin">Log out</button></a>
        </div>
    </nav>
</header>

<body>

    <body>
        <div class="container">
            <h1>My Space</h1>

            <div class="user-info">
            </div>

            <div class="list-container">
                <div id="routes-list" class="list">
                    <h2>Your Routes</h2>
                </div>

                <div id="orders-list" class="list">
                    <h2>Your Orders</h2>
                </div>
            </div>

            <button class="delete-button">Delete Account</button>
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Are you sure you want to delete this?</p>
                <button id="confirm-delete">Yes</button>
                <button id="cancel-delete">No</button>
            </div>
        </div>
    </body>

</html>