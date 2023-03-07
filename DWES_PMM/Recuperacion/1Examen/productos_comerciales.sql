--
-- Base de datos: `productos_comerciales`
--
CREATE DATABASE IF NOT EXISTS `productos_comerciales` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `productos_comerciales`;

--
-- Estructura de las tablas
--

create table IF NOT EXISTS Productos (
	referencia		varchar(6) primary key,
	nombre		varchar(20) not null,
	descripcion	varchar(20),
	precio		float not null,
	descuento	int not null
);


--
-- Inserci�n de datos
--

insert into Productos values ('AC0001', 'Abrigo Caballero', 'Piel Color Cobrizo',  120.50, 15);
insert into Productos values ('AS0001', 'Abrigo Mujer', 'Piel Color Cobrizo',  110.75, 25);
insert into Productos values ('CC0001', 'Camisa Caballero', 'Cuadros',  35.99, 10);
insert into Productos values ('PC0001', 'Pantal�n Caballero', 'Vaquero',  34.90, 35);
insert into Productos values ('PC0002', 'Pantal�n Caballero', 'Pana',  25.90, 0);
insert into Productos values ('AC0002', 'Abrigo Caballero', 'Piel Color Negro',  120.50, 15);
insert into Productos values ('CC0002', 'Camisa Caballero', 'Lisa Color Blanco',  35.99, 10);
insert into Productos values ('CC0003', 'Camisa Caballero', 'Lisa Color Azul',  35.99, 10);
insert into Productos values ('AS0002', 'Abrigo Mujer', 'Piel Color Negro',  120.75, 15);
insert into Productos values ('AS0003', 'Abrigo Mujer', 'Ante  Color Cobrizo',  90.95, 35);
insert into Productos values ('PS0001', 'Pantal�n Mujer', 'Vaquero',  30.90, 30);
insert into Productos values ('PS0002', 'Pantal�n Mujer', 'Lino',  39.90, 40);
