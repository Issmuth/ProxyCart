# Proxy Cart

Proxy Cart is a web application designed to connect travelers and shoppers. Travelers can post their travel routes and shoppers can post their orders, allowing travelers to deliver purchased products along their routes and earn extra cash.

![image](https://github.com/Issmuth/ProxyCart/assets/130219401/a1f503da-bb25-4026-b0d0-eb85e3615e59)


## Table of Contents
- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [Author](#author)
- [License](#license)

## Introduction
Proxy Cart is a platform that facilitates proxy purchases, enabling:
- **Travelers** to earn extra money by delivering items along their travel routes.
- **Shoppers** to get products from locations they cannot access themselves.

This project was developed as part of the foundation phase of the ALX Software Engineering Program. It demonstrates full-stack development skills using PHP, MySQL, the Slim Microframework, HTML, CSS, JavaScript, and jQuery.


## Installation
1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/proxy-cart.git
   cd ProxyCart
   
2. **Install Dependencies:**
   ```bash
   composer install
   
3. **Setup Database:**
     ```bash
     sudo mysql < setup_db.sql
     php setup_db.php
     php database_dumps/city_dump/city_dump.php
     
4. **Start Server (Nginx Script coming soon!)**
     ```bash
    #start the api
    php -S localhost:5000 -t api/public

    #start application
    php -S localhost -t app/public

  ## Usage
### Pretty Straight forward!

1. **Sign in**
![image](https://github.com/Issmuth/ProxyCart/assets/130219401/f330f877-5b3d-4c48-a60e-73013334469a)

2. **Make Order (for shopper)**
![image](https://github.com/Issmuth/ProxyCart/assets/130219401/ca7b0fb6-f943-4c82-a0d0-c7ad928424ab)

3. **Post Route (for travelers)**
![image](https://github.com/Issmuth/ProxyCart/assets/130219401/b9651b0b-b93a-4bba-a71e-cb5bd779cbb5)


## Author
- **LinkedIn:** [Ismael Muzemil](https://www.linkedin.com/in/issmuth/)
