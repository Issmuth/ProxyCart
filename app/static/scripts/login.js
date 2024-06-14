$(function () {
  $("#login-status").fadeOut();
  $("#signin-status").fadeOut();

  console.log(decodeURIComponent(document.cookie));
  const urlParams = new URLSearchParams(window.location.search);
  fetch('http://localhost/session').then((response) => response.json()).then(data => {
    if (data) {
      if (data['login']) {
        if (urlParams.get("ss") == data['session'] && urlParams.get("user") == data['user']) {
          $("#signin").addClass("hidden");
          $(".myspace").removeClass("hidden");
        }
      }
    }
  })

  $(".register-link").click(function () {
    $(".wrapper").addClass("active");
  });

  $(".login-link").click(function () {
    $(".wrapper").removeClass("active");
  });

  $(".icon-close").click(function () {
    $(".popup-form").addClass("hidden");
  });

  $("#signin").click(function () {
    $(".popup-form").removeClass("hidden");
  });

  $("#login-form").submit(function (event) {
    event.preventDefault();
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    fetch("http://localhost/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ email: email, password: password }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data["login"]) {
          session = data["session"];
          user = data["user"];
          window.location.href =
            "http://localhost/?ss=" + session + "&user=" + data["user"];
        } else {
          $("#login-status").fadeIn(500);
          setTimeout(function () {
            $("#login-status").fadeOut(500);
          }, 3000);
        }
      });
  });

  $("#signup-form").submit(function (event) {
    event.preventDefault();

    let email = document.getElementById("sEmail").value;
    let password = document.getElementById("sPassword").value;
    let fullname = document.getElementById("fullName").value;

    fetch("http://localhost/signup", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        email: email,
        password: password,
        fullname: fullname,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data["login"]) {
          session = data["session"];
          user = data["user"];
          window.location.href =
            "http://localhost/?ss=" + session + "&user=" + data["user"];
        } else {
          console.log(data["login"]);
          $("#signin-status").fadeIn(500);
          setTimeout(function () {
            $("#signin-status").fadeOut(500);
          }, 3000);
        }
      });
  });
});
