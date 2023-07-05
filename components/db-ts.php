<?php
// konfigurasi database tanpa session
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "bus";
// perintah php untuk akses ke database
$koneksi = mysqli_connect($host, $user, $password, $database);
