DROP DATABASE IF EXISTS clientes;
CREATE DATABASE IF NOT EXISTS clientes;
USE clientes;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

DROP TABLE IF EXISTS clientes;

CREATE TABLE clientes (
    id         INT     PRIMARY KEY            NOT NULL,
    imagen      VARCHAR(100)      NOT NULL,
    nombre      VARCHAR(14)     NOT NULL  
    
);

SELECT 'LOADING clientes' as 'INFO';
