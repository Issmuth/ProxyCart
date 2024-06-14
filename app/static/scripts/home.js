$(function () {
  let url = "http://localhost:5000/api/routes";
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      let routes = Object.values(data);
      routes.forEach((route) => {
        route.proxy.forEach((proxy) =>{
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
        })
      });
    });
});
// document.getElementById('hello').onclick()
// });
