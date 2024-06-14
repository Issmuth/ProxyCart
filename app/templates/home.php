<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../static/styles/home.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>" />
  <link rel="stylesheet" href="../static/styles/login.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>" />
  <link rel="stylesheet" href="../static/styles/navbar.css?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Antipasto Pro:wght@700&display=swap" />
  <link rel="shortcut icon" href="../static/images/favicon.png?" type="image/x-icon">
  <script src="../static/scripts/jquery-3.6.0.min.js"></script>
  <script src="../static/scripts/home.js?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>"></script>
  <script src="../static/scripts/login.js?<?php echo \Ramsey\Uuid\Uuid::uuid4()->__toString()?>"></script>
  <title>Home</title>
</head>

<body>
  <header>
    <img id="bg1" class="bg" src="../static/images/Ellipse 11.png" alt="" />
    <img id="bg2" class="bg" src="../static/images/Group 21.png" alt="" />
    <nav>
      <img id="toplogo" src="../static/images/Logo.png" alt="logo" />
      <div class="navbar-items">
        <a id="nav-item" href="">Order</a>
        <a id="nav-item" href="/travel?ss=<?php echo $_SESSION['session'] . '&user=' . $_SESSION['user']?>">Travel</a>
        <a id="nav-item" class="myspace hidden" href="">My Space</a>
        <button id="signin">Sign in</button>
      </div>
    </nav>
  </header>

  <!-- SignUp/Login -->
  <section class="popup-form hidden">
    <div id="signin-status">Looks like you have an account. Login instead</div>
    <div id="login-status">Invalid email or password. Try Again</div>
    <div class="wrapper">
      <span class="icon-close"><img src="../static/images/exit.png" alt=""></span>
      <div class="form login">
        <h2>Login</h2>
        <form id="login-form">
          <div class="input-box">
            <input type="email" id="email" name="email" required placeholder="&#8203">
            <label>Email</label>
          </div>
          <div class="input-box">
            <input type="password" id="password" name="password" required placeholder="&#8203">
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox">Remember me</label>
            <a href="/">Forgot Password?</a>
          </div>
          <button type="submit" class="btn">Login</button>
          <div class="login-register">
            <p>Don't have an account?<a href="#" class="register-link">Sign up</a></p>
          </div>
        </form>
      </div>

      <div class="form register">
        <h2>Sign Up</h2>
        <form id="signup-form">
          <div class="input-box name">
            <input type="text" id="fullName" required placeholder="&#8203">
            <label>Full Name</label>
          </div>
          <div class="input-box">
            <input type="email" name="email" id="sEmail" required placeholder="&#8203">
            <label>Email</label>
          </div>
          <div class="input-box">
            <input type="password" name="password" id="sPassword" required placeholder="&#8203">
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox" required>I agree to terms & conditions</label>
          </div>
          <button type="submit" class="btn">Sign up</button>
          <div class="login-register">
            <p>Already have an account?<a href="#" class="login-link">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>

  <section class="cards-section">
    <div class="filter">
      <label>Find the route you’re looking for</label>
      <div class="search-bar">
        <div class="field">
          <input type="text" id="from" placeholder="From">
          <input type="text" placeholder="To">
          <img class="swap" src="../static/images/Asset 1.png">
        </div>
        <img id="search" class="swap" src="../static/images/Asset 2.png">
      </div>
    </div>

    <div class="route-page">
      <label class="grid-label">Proxies</label>
      <div id="route-grid" class="card-grid">
        <!--Route Cards -->
      </div>
      <div style="width: 100%; height: 1px; background-color: #e6e6e6;"></div>
      <button class="more">Load more</button>
    </div>

    <div class="route-page">
      <label id="orders-grid" class="grid-label">Orders</label>
      <div class="card-grid">
        <!--Orders cards-->
      </div>

      <div style="width: 100%; height: 1px; background-color: #e6e6e6;"></div>
      <button class="more">Load more</button>
    </div>
  </section>


  <div class="CTA">
    <div class="cta-container">
      <div class="tagline">Join the community</div>
      <div class="cta-button">
        <button>Make an order</button>
        <button>Post your trip</button>
      </div>
    </div>
    <img src="../static/images/image-min.jpg">
  </div>

  <div class="navigation-footer">
    <div class="items1">
      <div class="topic">Learn More</div>
      <div class="page">About Us</div>
      <div class="page">How it Works</div>
      <div class="page">FAQ</div>
    </div>
    <div class="items2">
      <div class="topic">User Agreement</div>
      <div class="page">Terms of Use</div>
      <div class="page">Privacy Policy</div>
      <div class="page">Trust and Safety</div>
    </div>
    <div class="proxy-cart">© Proxy Cart Inc.</div>
    <div class="divider">
    </div>
    <div class="social-icons">
      <img class="buttons-icon" alt="" src="../static/images/Icon.svg">
      <img class="buttons-icon" alt="" src="../static/images/Icon2.svg">
      <img class="buttons-icon" alt="" src="../static/images/Icon3.svg">
      <img class="buttons-icon" alt="" src="../static/images/Icon4.svg">
    </div>
    </footer>
</body>

</html>