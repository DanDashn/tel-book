<?php
        require_once '../conf/db_connection.php';
        
$lgn = $_POST['lgn'];
$pswrd = $_POST['pswrd'];



$rs_log = $connect->query("SELECT login FROM users WHERE login='$lgn'");
$logCount = $rs_log->num_rows;//подсчет количества строк  результата
//var_dump($_POST);
//echo $logCount; //Вывод количества строк в базе
if($logCount == 1 ){
      //  echo $logCount; 
        $rs_pswrd = $connect->query("SELECT login FROM users WHERE  password='$pswrd'");
        $pswrdCount = $rs_pswrd->num_rows;//change here
      //  echo $pswrdCount;
        if($pswrdCount == 1){
          //      echo $pswrdCount;
               // $x =1;
                echo "<script>alert('Данные загружаются!') </script>";
                echo "<script>setInterval(vremya, 2000)</script>";
                echo " <script>location.href = '../index_adm.php'</script>";
        }
        else{
                echo "<script>alert('Пароль не совпадает !') </script>";
                echo "<script>setInterval(vremya, 2000)</script>";
                echo " <script>location.href = '../check-login.php'</script>";
        }
}
else{
        echo "<script>alert('Логин не совпадает !') </script>";
        echo "<script>setInterval(vremya, 2000)</script>";
        echo " <script>location.href = '../check-login.php'</script>";
}
































/*


$log = $_GET['lgn'];
$pass = $_GET['pswrd'];
var_dump($_GET);
$result = mysqli_query($connect, "SELECT `login`, `password` FROM `users` ");
while($row = mysqli_fetch_assoc($result)) {
$password = $row['login'] ;
$login = $row['password'];
};
if($log == $password){
    if($pass == $login){
        header('Location: ../index_adm.php');
    }
    else{
        //echo '<script> alert( "Неправильные пароль для входа !" ); </script>';
        //flush();
        //sleep(2); 
        header('location: ../check-login.php');
        
    };
}
else{
    //echo '<script> alert( "Неправильные логин для входа !" ); </script>';
    //flush();
    header('location: ../check-login.php');
*/
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



