$(function () {
    /********loading page content */

  const urlParams = new URLSearchParams(window.location.search);
  let user = urlParams.get("user");
  let url = "http://localhost:5000/api/user/" + user;
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      $(".user-info").append(`
                <div class="user-info-header">
                    <h2>User Information</h2>
                    <span class="edit-user"><img src="../static/images/edit.png" class="icon"></span>
                </div>
                <form id="user-info-form">
                    <p><strong>Name:</strong> <input type="text" id="user-name" value="${data.firstName} ${data.lastName}" disabled></p>
                    <p><strong>Email:</strong> <input type="email" id="user-email" value="${data.email}" disabled></p>
                    <p><strong>Password:</strong> <input type="password" id="user-password" placeholder="Change Password" disabled></p>
                </form>
                <button class="update-button" id="update-user-button" disabled>Update</button>`);
    });

  let url2 = "http://localhost:5000/api/routes";
  fetch(url2)
    .then((response) => response.json())
    .then((data) => {
      const routes = Object.values(data);
      const userRoutes = routes.filter((route) => {
        return (
          Array.isArray(route.proxy) &&
          route.proxy.length > 0 &&
          route.proxy[0].id == user
        );
      });
      userRoutes.forEach((route) => {
        $("#routes-list").append(`
        <div class="item">
            <div class="item-header">
                <span>${route.origin.name} to ${route.destination.name}</span>
                <div class="icons">
                    <span class="delete"><img src="../static/images/delete.png" class="icon small"></span>
                    <!--<span class="toggle"><img src="../static/images/dropdown.png" class="icon small"></span>-->
                </div>
            </div>
            <div class="item-content">
                <p>More information about Item 1</p>
            </div>
        </div>`);
      });
    });

  let url3 = "http://localhost:5000/api/orders";
  fetch(url3)
    .then((response) => response.json())
    .then((data) => {
      const orders = Object.values(data);
      const userOrders = orders.filter((order) => {
        return order.product_id.patron.id == user;
      });
      userOrders.forEach((order) => {
        console.log(order);
        $("#orders-list").append(`
            <div class="item">
                <div class="item-header">
                    <span>${order.product_id.name}</span>
                    <div class="icons">
                        <span class="delete"><img src="../static/images/delete.png" class="icon small"></span>
                        <!--<span class="toggle"><img src="../static/images/dropdown.png" class="icon small"></span>-->
                    </div>
                </div>
                <div class="item-content">
                    <p>More information about Item 1</p>
                </div>
            </div>`);
      });
    });


    /*******utitlites */

    document.querySelectorAll('.toggle').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const content = this.parentElement.parentElement.nextElementSibling;
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        });
    });
    
    const modal = document.getElementById('modal');
    const modalContent = document.querySelector('.modal-content p');
    const confirmDeleteBtn = document.getElementById('confirm-delete');
    const cancelDeleteBtn = document.getElementById('cancel-delete');
    const closeBtn = document.querySelector('.close');
    
    function showModal(message, confirmCallback) {
        modalContent.textContent = message;
        modal.style.display = 'block';
    
        confirmDeleteBtn.onclick = function() {
            fetch('http://localhost:5000/api/user/' + user, {method: 'DELETE'});
            confirmCallback();
            modal.style.display = 'none';
        };
    
        cancelDeleteBtn.onclick = closeBtn.onclick = function() {
            modal.style.display = 'none';
        };
    
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    }
    
    document.querySelector('.delete-button').addEventListener('click', function() {
        showModal('Are you sure you want to delete the account?', function() {
            alert('User account deleted!');
        });
    });
    
    document.querySelectorAll('.delete').forEach(deleteIcon => {
        deleteIcon.addEventListener('click', function() {
            const itemName = this.parentElement.parentElement.querySelector('span').textContent;
            showModal(`Are you sure you want to delete ${itemName}?`, function() {
                alert(`${itemName} deleted!`);
            });
        });
    });

    // const editUserBtn = document.querySelector('.edit-user');
    const userForm = document.getElementById('user-info-form');
    const updateUserBtn = document.getElementById('update-user-button');

    // editUserBtn.addEventListener('click', function() {
    //     const inputs = userForm.querySelectorAll('input');
    //     inputs.forEach(input => input.disabled = false);
    //     updateUserBtn.disabled = false;
    // });

    updateUserBtn.addEventListener('click', function() {
        const name = document.getElementById('user-name').value;
        const email = document.getElementById('user-email').value;
        const role = document.getElementById('user-role').value;
        const password = document.getElementById('user-password').value;
    
        showModal('Are you sure you want to update your information?', function() {
            alert('User information updated!');
            userForm.querySelectorAll('input').forEach(input => input.disabled = true);
            updateUserBtn.disabled = true;
        });
    });
});
