CREATE DATABASE jhossweb;
USE jhossweb;

CREATE TABLE img (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameImg VARCHAR(15) NOT NULL,
    imgExten VARCHAR(5) NOT NULL,
    fecha TIMESTAMP
);