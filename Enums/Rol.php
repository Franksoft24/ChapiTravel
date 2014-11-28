<?php 

class Rol extends SplEnum {
    const __default = self::Cliente;
    
    const Cliente = "C";
    const Representante = "R"
    const Administrador = "A";
    const Empleado = "E";
    const Proveedor = "P";
}
?>