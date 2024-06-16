$(function () {
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
        let deadline = document.getElementById('date').value;
        let name = document.getElementById('name').value;
        let link = document.getElementById('url').value;
        let description = document.getElementById('description').value;
        let price = document.getElementById('price').value; 
        let reward = document.getElementById('reward').value;
        fetch("http://localhost/orderpost", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({origin: origin,
                                destination: destination,
                                deadline: deadline,
                                name: name,
                                link: link,
                                description: description,
                                price: price,
                                reward: reward}),})
            .then((response) => response.json()).then((data) => {
                if(data.post == 'success') {
                    console.log("success");
                $('#success').fadeIn(500);
                setTimeout(() => {
                    $("#success").fadeOut(500);
                }, 3000);
                } else if (data.post == 'failed') {
                    console.log(data.error);
                $('#fail').fadeIn(500);
                setTimeout(() => {
                    $("#fail").fadeOut(500);
                }, 3000);
                }
            });
    });
});