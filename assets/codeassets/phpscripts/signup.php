<?php

$username = $_POST["username"];
$userpassword = $_POST["userpassword"];




$host = "localhost";
$dbname = "social media";
$dbusername = "root";
$dbpassword = "";

$connec = mysqli_connect(
    hostname: $host,
    username: $dbusername,
    password: $dbpassword,
    database: $dbname
);

if (mysqli_connect_errno()) {
    die("Connection error :" . mysqli_connect_error());
}

$sql = "INSERT INTO accounts (username, passwordd)
VALUES (?, ?)";

$stmt = mysqli_stmt_init($connec);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($connec));
}

mysqli_stmt_bind_param(
    $stmt,
    "ss",
    $username,
    $userpassword
);

mysqli_stmt_execute($stmt);

echo "record saved";
