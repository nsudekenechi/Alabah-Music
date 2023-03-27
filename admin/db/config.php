<?php

$mode="pro";
if ($mode=="dev") {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB', 'alabah_db');
} else {
    define('HOST', 'localhost');
    define('USER', 'dopegztz_root');
    define('PASSWORD', 'EPfHtFtgyiAH');
    define('DB', 'dopegztz_DB');
}
$conn=mysqli_connect(HOST, USER, PASSWORD, DB);
