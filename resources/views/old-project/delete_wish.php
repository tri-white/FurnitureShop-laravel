<?php
session_start();
include("classes/connect.php");
include("classes/wishlist.php");
if(isset($_SESSION['mystore_userid']) && isset($_GET['user']) && isset($_GET['product'])){
    $userid = $_GET['user'];
    $productid = $_GET['product'];
    $wish = new Wishlist();
    $res = $wish->change_wish($userid,$productid);
}
else{
    header("Location: login.php");
    die;
}
header("Location:wishlist.php");
die;
?>