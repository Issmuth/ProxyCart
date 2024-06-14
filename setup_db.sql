CREATE DATABASE proxy_cart;
CREATE USER 'pc_admin'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'pcadminpass';
GRANT ALL PRIVILEGES ON proxy_cart.* TO 'pc_admin'@'localhost';
