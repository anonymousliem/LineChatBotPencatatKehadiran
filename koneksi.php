<?php
$dbhost = "localhost";
$dbuser = "pusn8562_eventregister";
$dbpass = 'eventregister';
$dbname = "pusn8562_eventregister";

$connect = new mysqli ($dbhost,$dbuser,$dbpass,$dbname);

if($connect->connect_error){
    die('koneksi gagal: '. $connect->connect_error);
}
?>