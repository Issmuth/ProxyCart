$(function() {
    let url = 'http://127.0.0.1:5000/api/user/fe975810-9fa1-4f2e-89ab-2f306734830c';
    fetch(url).then(response => response.json()).then(data => {
        $('div#route-grid').append(`
        <div class="card">
        <img class="image-icon" src="../static/images/city-icon.jpg" />
        <div class="copy">
          <div class="product">${data.lastName}</div>
          <div class="description-of-first">Description of first product</div>
          <div class="product">$10.99</div>
        </div>
      </div>
        `)
    });
});