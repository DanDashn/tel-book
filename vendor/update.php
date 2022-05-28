<?php
        require_once '../conf/db_connection.php';



        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $patronymic = $_POST['patronymic'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
       mysqli_query($connect, "UPDATE `peoples` SET `firstname` = '$firstname', `lastname` = '$lastname', `patronymic` = '$patronymic', `phone` = '$phone', `email` = '$email', `address` = '$address', `id_city` = '$city' WHERE `peoples`.`id` = '$id'");
          
        header('Location: ../index_adm.php');   

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