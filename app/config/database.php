<?php

$conn = new mysqli("127.0.0.1","root","Qwerty@21","cinema","3306");

if ($conn->connect_error){
    die("Error de conexión" . $conn->connect_error);
}
