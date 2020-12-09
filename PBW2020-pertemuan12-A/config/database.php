
<?php 
//koneksi ke database
//url dasar
define('BASEURL', 'http://localhost/crud-/');

//DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'database');
$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

 ?>