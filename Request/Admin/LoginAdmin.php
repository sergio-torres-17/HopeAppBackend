<?php
$usr = $_GET['usr'];
$pwd = $_GET['pwd'];
$pwdEncry = sha1($pwd);
echo $usr . '\n ' . $pwdEncry;

?>