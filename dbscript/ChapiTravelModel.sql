CREATE TABLE `Viajes` (
`ViajeID` int NOT NULL,
`Nombre` varchar(50) NOT NULL,
`CantidadPlazas` int NOT NULL,
`FechaPartida` datetime NOT NULL,
`FechaLlegada` datetime NOT NULL,
PRIMARY KEY (`ViajeID`) 
);

CREATE TABLE `Destinos` (
`DestinoID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(50) NOT NULL,
`Lugar` varchar(50) NOT NULL,
`Descripcion` varchar(255) NOT NULL,
`Foto` varchar(255) NOT NULL,
PRIMARY KEY (`DestinoID`) 
);

CREATE TABLE `ServiciosEnViaje` (
`ViajeID` int NOT NULL,
`ServicioID` int NOT NULL,
PRIMARY KEY (`ViajeID`, `ServicioID`) 
);

CREATE TABLE `Servicios` (
`ServicioID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(50) NOT NULL,
`Precio` double NOT NULL,
`ProveedorID` int NOT NULL,
PRIMARY KEY (`ServicioID`) 
);

CREATE TABLE `Rutas` (
`ViajeID` int NOT NULL,
`DestinoID` int NOT NULL,
`Orden` int NOT NULL,
PRIMARY KEY (`DestinoID`, `ViajeID`) 
);

CREATE TABLE `Reservaciones` (
`ReservacionID` int NOT NULL,
`Cantidad` int NOT NULL,
`Estado` int NOT NULL,
`PersonaID` int NOT NULL,
`ViajeID` int NOT NULL,
PRIMARY KEY (`ReservacionID`) 
);

CREATE TABLE `ServiciosAdicionales` (
`ServicioID` int NOT NULL,
`ReservacionID` int NOT NULL,
PRIMARY KEY (`ReservacionID`, `ServicioID`) 
);

CREATE TABLE `Facturas` (
`FacturaID` int UNSIGNED NOT NULL AUTO_INCREMENT,
`Fecha` datetime NOT NULL,
`Monto` double NOT NULL,
`Impuesto` double NOT NULL,
`ReservacionID` int NOT NULL,
PRIMARY KEY (`FacturaID`) 
);

CREATE TABLE `Personas` (
`PersonaID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(255) NOT NULL,
`Documento` varchar(50) NOT NULL,
`Email` varchar(255) NULL,
`Telefono` varchar(11) NOT NULL,
`Rol` varchar(3) NOT NULL,
`CuentaPaypal` varchar(255) NULL,
`Clave` varchar(50) NULL,
PRIMARY KEY (`PersonaID`) 
);


ALTER TABLE `Servicios` ADD CONSTRAINT `FK_ServiciosProveedores` FOREIGN KEY (`ProveedorID`) REFERENCES `Personas` (`PersonaID`);
ALTER TABLE `Facturas` ADD CONSTRAINT `FK_FacturaReservacion` FOREIGN KEY (`ReservacionID`) REFERENCES `Reservaciones` (`ReservacionID`);
ALTER TABLE `ServiciosEnViaje` ADD CONSTRAINT `FKServicioViaje` FOREIGN KEY (`ServicioID`) REFERENCES `Servicios` (`ServicioID`);
ALTER TABLE `ServiciosEnViaje` ADD CONSTRAINT `FKViajeServicio` FOREIGN KEY (`ViajeID`) REFERENCES `Viajes` (`ViajeID`);
ALTER TABLE `Rutas` ADD CONSTRAINT `FK_DestinoRuta` FOREIGN KEY (`DestinoID`) REFERENCES `Destinos` (`DestinoID`);
ALTER TABLE `Rutas` ADD CONSTRAINT `FK_ViajeRuta` FOREIGN KEY (`ViajeID`) REFERENCES `Viajes` (`ViajeID`);
ALTER TABLE `Reservaciones` ADD CONSTRAINT `FK_ReservacionPersona` FOREIGN KEY (`PersonaID`) REFERENCES `Personas` (`PersonaID`);
ALTER TABLE `Reservaciones` ADD CONSTRAINT `FK_ReservacionViaje` FOREIGN KEY (`ViajeID`) REFERENCES `Viajes` (`ViajeID`);
ALTER TABLE `ServiciosAdicionales` ADD CONSTRAINT `FK_ServicioAdicionalReservacion` FOREIGN KEY (`ReservacionID`) REFERENCES `Reservaciones` (`ReservacionID`);
ALTER TABLE `ServiciosAdicionales` ADD CONSTRAINT `FK_ServicioAdicionalServicio` FOREIGN KEY (`ServicioID`) REFERENCES `Servicios` (`ServicioID`);

