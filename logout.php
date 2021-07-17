<?php
session_start();

$_SESSION['id']='id';
$_SESSION['nama_user']='nama_user';
$_SESSION['username']='username';
$_SESSION['password']='password';

unset($_SESSION['id']);
unset($_SESSION['nama_user']);
unset($_SESSION['username']);
unset($_SESSION['password']);

session_unset();
session_destroy();
echo 'logout!';
header('Location:index.php');

?>