<?php

$conexion = new mysqli('localhost', 'root', '', 'employees');
print $conexion ->server_info;

?>
