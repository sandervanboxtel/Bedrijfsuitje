<?php
/**
 * Including header and footer
 */
session_start();
include_once("DBconfig.php");

if(isset($_GET['page']) && $_GET['page'] != '') {
    $pages = ['login', 'AdminLogin', 'signup', 'home', 'activiteiten', 'userpanel', 'adminpanel'];
    if(in_array($_GET['page'], $pages)) {
    include_once('header.php');
    include_once($_GET['page'].'.php');
    include_once('footer.php');
    } else {
        include_once('404.php');
    }
} else {
    include_once('header.php');
    include_once('home.php');
    include_once('footer.php');
}
?>
