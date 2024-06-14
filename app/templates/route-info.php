<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/route-info.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>">
    <link rel="stylesheet" href="../static/styles/navbar.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>">
    <script src="../static/scripts/jquery-3.6.0.min.js?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>"></script>
    <script src="../static/scripts/route.js?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>"></script>
    <title>Route</title>
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
            <a id="nav-item" href="">Orders</a>
            <a id="nav-item" href="">Routes</a>
            <a id="nav-item" href="">My Space</a>
            <button id="signin">Sign in</button>
          </div>
        </nav>
    </header>
    <section id="route_sec" class="route">
    </section>
</body>
</html>