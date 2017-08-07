<?php
	$user = 'root';
    $password = '';
    $db = 'guest';
    $host = 'localhost';

    $success = mysqli_connect(
       $host,
       $user,
       $password,
       $db
    );
mysqli_set_charset($success, "UTF-8");
/*define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'guest');
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME); 
*/
?>