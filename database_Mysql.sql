DROP DATABASE IF EXISTS dataTable;
CREATE DATABASE dataTable; 
USE dataTable; 


DROP TABLE IF EXISTS individu;


CREATE TABLE individu (
    id INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom TEXT(255), 
    prenom TEXT(255) NOT NULL, 
    mail TEXT(255) NOT NULL, 
    telephone TEXT(255) NOT NULL 
);

ALTER TABLE individu 
ADD CONSTRAINT uniqueMail UNIQUE (mail); 

ALTER TABLE individu 
ADD CONSTRAINT uniqueTelephone UNIQUE (telephone);
