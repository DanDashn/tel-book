<?php
        require_once '../conf/db_connection.php';
        $cities = mysqli_query($connect,"SELECT * FROM city ");
        $cities = mysqli_fetch_all($cities);

$city = $_POST['city'];
var_dump($_POST);

mysqli_query($connect,"INSERT INTO `city` (`id`, `name`) VALUES(NULL, '$city')");
header('Location: ../city_index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
    <link rel="icon"  type="image/icon" href="fav/favicon.ico">
    <link rel="manifest" href="fav/site.webmanifest">
    <link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Телефонный справочник</title>
</head>
<body>
        
</body>
</html>