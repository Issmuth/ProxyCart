<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../static/styles/home.css?<?php echo rand(100, 30000)?>"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Antipasto Pro:wght@700&display=swap"/>
    <link rel="shortcut icon" href="../static/images/favicon.png?" type="image/x-icon">
    <script src="../static/scripts/jquery-3.6.0.min.js"></script>
    <script src="../static/scripts/home.js"></script>
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
          <a id="nav-item" href="">Travel</a>
          <a id="nav-item" href="">My Space</a>
          <button id="signin">Sign in</button>
        </div>
      </nav>
    </header>
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
        <label class="grid-label">Routes</label>
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
