<?php
session_start();


$page = @$_GET["page"];

$array = ["dashboard", 
            "siswa", 
            "pemasukan", 
            "pengeluaran", 
            "setor-spp"
            ];



$title = (isset($page) && !empty($page) && in_array($page, $array) && !is_array($page) ? ucwords(str_replace("_", " ", $page)) : 'Login');
require_once 'includes/header.php';

if (in_array($page, $array) && !is_array($page) || isset($_SESSION['login'])) {
    $page = ($page == "") ? "dashboard" : $page;
    require_once 'includes/sidebar.php';
    require_once "includes/navbar.php";
    require_once "admin/$page.php";
    require_once 'includes/footer.php'; 
} else {
    require_once "login.php";
}
?>









