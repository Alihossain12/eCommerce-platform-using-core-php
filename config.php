
<?php 


// mysql connection
$servername = 'localhost';
$username   = "root";
$password   = "";
$dbname     = 'products';
$is_connect = false;

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection) {
    $is_connect = true;
}else {
    echo "Connect hoy nai abr dekho ki somossa";
}