$(function () {
    var months = [ "filler",
        "January", "February", "March",
        "April", "May", "June",
        "July", "August", "September",
        "October", "November", "December"
    ];
  const urlParams = new URLSearchParams(window.location.search);
  let order = urlParams.get("order");
  fetch("http://localhost:5000/api/order/" + order)
    .then((response) => response.json())
    .then((data) => {
        let deadline = data.deadline.date.split(" ")[0].split("-");
          $("#order_sec").append(`<div class="info left">
            <div class="order-info">
                <img class="order-img" src="../static/images/city-icon.jpg">
                <h2>${data.product_id.name}</h2>
                <p class="price">\$${data.product_id.price}</p>
            </div>
        </div>
        <div class="info right">
            <h1>${data.product_id.patron.firstName}'s Order</h1>
            <h3>${data.product_id.description}</h3>
            <a href="${data.product_id.link}" target="_blank">Find where to buy</a>
            <div class="route">
                <img class="icons" src="../static/images/location.svg">
                <p>${data.source.name} to ${data.destination.name}</p>
            </div>
            <div class="route">
                <img class="icons" src="../static/images/clock.svg">
                <p class="deadline">Before ${months[Number(deadline[1])]} ${deadline[2]} ${deadline[0]}</p>
            </div>
            <div class="route">
                <img class="icons" src="../static/images/gift.svg">
                <p class="reward">$${data.reward_sum} in rewards</p>
            </div>
            <button class="order-dispatch">Take Order</button>
        </div>
        <div class="divider"></div>`);
    });
});