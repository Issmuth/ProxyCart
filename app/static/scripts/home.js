$(function () {
  $(".navbar-items a").click(function (e) {
    let session = new URLSearchParams(window.location.search).get("ss");
    e.preventDefault();
    if (session) {
      window.location.href = e.target.href;
    } else {
      $(".popup-form").removeClass("hidden");
      $("#signin-first").fadeIn(500);
      setTimeout(() => {
        $("#signin-first").fadeOut(500);
      }, 3000);
    }
  });

  let url = "http://localhost:5000/api/routes";
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      let routes = Object.values(data);
      routes.forEach((route) => {
        route.proxy.forEach((proxy) => {
          let datestring = route.leaving_date.date.split(" ")[0];
          $("div#route-grid").append(`
            <div class="card">
              <a href="/route?route=${route.id}"><img class="image-icon" src="../static/images/city-icon.jpg"/></a>
              <div class="copy">
                <div class="product">${proxy.firstName}</div>
                <div class="description-of-first"><img id="icon-img" src="../static/images/location.svg">${route.origin.name} to ${route.destination.name}</div>
                <div class="description-of-first date"><img class="leaving" id="icon-img" src="../static/images/leaving-icon.png"> ${datestring}</div>
              </div>
            </div>`);
        });
      });
    });

  let url2 = "http://localhost:5000/api/orders";
  fetch(url2)
    .then((response) => response.json())
    .then((data) => {
      let orders = Object.values(data);
      orders.forEach((order) => {
        let datestring = order.deadline.date.split(" ")[0];
        $("div#order-grid").append(`
              <div class="card">
                <a href="/order?order=${order.id}"><img class="image-icon" src="../static/images/city-icon.jpg"/></a>
                <div class="copy">
                  <div class="product">${order.product_id.name}</div>
                  <div class="description-of-first"><img id="icon-img" src="../static/images/location.svg">${order.source.name} to ${order.destination.name}</div>
                  <div class="description-of-first date"><img class="leaving" id="icon-img" src="../static/images/leaving-icon.png"> ${datestring}</div>
                </div>
              </div>`);
      });
    });

  $("#order-button").click(() => {
    let user = new URLSearchParams(window.location.search).get("user");
    let session = new URLSearchParams(window.location.search).get("ss");
    if (session && user) {
      window.location.href = "/orderpost?ss=" + session + "&user=" + user;
    } else {
      $(".popup-form").removeClass("hidden");
      $("#signin-first").fadeIn(500);
      setTimeout(() => {
        $("#signin-first").fadeOut(500);
      }, 3000);
    }
  });

  $("#travel-button").click(() => {
    let user = new URLSearchParams(window.location.search).get("user");
    let session = new URLSearchParams(window.location.search).get("ss");
    if (session && user) {
      window.location.href = "/travel?ss=" + session + "&user=" + user;
    } else {
      $(".popup-form").removeClass("hidden");
      $("#signin-first").fadeIn(500);
      setTimeout(() => {
        $("#signin-first").fadeOut(500);
      }, 3000);
    }
  });
});
