$(function () {
  $("#toggleButton").change(function () {
    if ($(this).prop("checked")) {
      $(".input-box.date.return").removeClass("hidden");
       is_round = true;
    } else {
      $(".input-box.date.return").addClass("hidden");
      is_round = false;
      document.getElementById('return-date').value = "";
    }
  });

  $('.img-icon.swap').click(function(){
    let origin = document.getElementById('from').value;
    let destination = document.getElementById('to').value;

    document.getElementById('from').value = destination;
    document.getElementById('to').value = origin;
  });

  $('#order-form').submit(function (event){
    event.preventDefault();
    let origin = document.getElementById('from').value;
    let destination = document.getElementById('to').value;
    let leaving_date = document.getElementById('leaving-date').value;
    let return_date = document.getElementById('return-date').value;
    
    fetch("http://localhost/travelpost", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({origin: origin,
                            destination: destination,
                            is_round: is_round,
                            leaving_date: leaving_date,
                            return_date: return_date}),})
        .then((response) => response.json()).then((data) => {
            if(data.post == 'success') {
              $('#success').fadeIn(500);
              setTimeout(() => {
                $("#success").fadeOut(500);
              }, 3000);
            } else {
              $('#fail').fadeIn(500);
              setTimeout(() => {
                $("#fail").fadeOut(500);
              }, 3000);
            }
        });
  });
});
