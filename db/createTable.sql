create database mirido;

CREATE USER 'mirido'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON post.*to mirido@'localhost' with grant option;
use mirido;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);


alter table users default charset = utf8;
ALTER TABLE users CONVERT TO character SET utf8;

