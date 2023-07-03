CREATE DATABASE prueba_mysqli;


USE prueba_mysqli;


CREATE TABLE users (
    id INT PRIMARY KEY auto_increment,
    user_email VARCHAR(75),
    user_password VARCHAR(35),
    user_nombre VARCHAR(30),
    user_apellido VARCHAR(30),
    fecha DATE
); 
