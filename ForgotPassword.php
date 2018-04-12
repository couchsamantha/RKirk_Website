<?php
require_once('connect.php');
require('config.php');
require('PHPMailer/PHPMailerAutoload.php');

if(isset($_POST) & !empty($_POST)) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
$sql = "SELECT * FROM 'login' WHERE username = 'username'";
$res = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($res);
}