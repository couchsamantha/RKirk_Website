<?php

$link = mysqli_connect("localhost", "root", "", "r-kirkdb");

if($link == false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$firstname = mysqli_real_escape_string($link, $_POST['firstname']);
$lastname = mysqli_real_escape_string($link, $_POST['lastname']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);

$sql = "INSERT INTO userinput (FirstName, LastName, EmailAddress, Username, Password) VALUES ( '$firstname', '$lastname', '$email', '$username', '$password')";

if(mysqli_query($link, $sql)) {
    echo "Data saved";
}
else {
    echo "Error: Was not able to execute. " . mysqli_error($link);
}

mysqli_close($link);

?>
