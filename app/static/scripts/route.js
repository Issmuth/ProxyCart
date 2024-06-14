$(function () {

    var months = [ "filler",
        "January", "February", "March",
        "April", "May", "June",
        "July", "August", "September",
        "October", "November", "December"
    ];
  const urlParams = new URLSearchParams(window.location.search);
  let route = urlParams.get("route");
  console.log(route);
  fetch("http://localhost:5000/api/route/" + route)
    .then((response) => response.json())
    .then((data) => {
        let dateLeaving = data.leaving_date.date.split(" ")[0].split("-");
        let dateReturn = data.return_date.date.split(" ")[0].split("-");
      $("#route_sec").append(`
        <div class="info left">
    <div class="order-info">
        <img class="order-img" src="../static/images/city-icon.jpg">
    </div>
</div>
<div class="info right">
    <h1>${data.proxy[0].firstName}'s Route</h1>
    <h3>Some information about me, maybe some groundrules...</h3>
    <a href="#">read more</a>
    <div class="route-path">
        <div class="icon-container">
            <img class="icons" src="../static/images/location.svg">
        </div>
        <p>${data.origin.name} to ${data.destination.name}</p>
    </div>
    <div class="route-path">
        <div class="icon-container">
            <img class="icons date" src="../static/images/leaving-icon.png">
            </div>
        <p class="deadline">Leaving on ${months[Number(dateLeaving[1])]} ${dateLeaving[2]} ${dateLeaving[0]}</p>
    </div>
    <div class="route-path">
        <div class="icon-container">
            <img class="icons date" src="../static/images/return-icon.png">
        </div>
        <p class="deadline">Back on ${months[Number(dateReturn[1])]} ${dateReturn[2]} ${dateReturn[0]}</p>
    </div>
    <div class="route-path">
        <div class="icon-container">
            <img class="icons" src="../static/images/coin.svg">
        </div>
        <p class="reward">$10 earned in rewards</p>
    </div>
    <button class="order-dispatch">Dispatch</button>
</div>
<div class="divider"></div>`);
    });
});
