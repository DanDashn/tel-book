<?php
        require_once 'conf/db_connection.php';
        $cities = mysqli_query($connect,"SELECT * FROM city ORDER BY name ASC ");
        $cities = mysqli_fetch_all($cities);
?>  
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
    <link rel="icon"  type="image/icon" href="fav/favicon.ico">
    <link rel="manifest" href="fav/site.webmanifest">
    <link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Телефонный Справочник</title>
    <script>
        $(function(){
            $('.show-adding-form').click(function(){
                $('.form-layout').css('display','flex');
                alert('Вы хотите добавить новый город ? ');
            });
            $('.close-button').click(function(){
                $('.form-layout').css('display','none');
                
            });
            $('tr').on('click',function(){
                $('tr').css('background-color', '');
                $(this).css('background-color', '#edaef9');
            });
        });
    </script>
    <style>
    .table-container{
        position: static;
        margin-left: 5%;
        width: 90%;
        display: flex;
        justify-content: center;
        height: auto;
    }
    .content-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 1.5em;
        min-width: 400px;
        border-radius: 10px 10px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .content-table thead tr {
        background: -webkit-linear-gradient(45deg,#edaef9 40%,#81b1fa 65%);
    }
    .content-table tbody td a{
        color: #000;
    }
    .box{
    text-align: center;
    flex: 1;
    vertical-align: middle;
    cursor: pointer;
    color: #fff;
}
    .content-table thead th{
        color: #fff;
        text-align: left;
        font-weight: bold;
        padding: 20px 15px;
    }   
    h1{
    color: rgb(255, 255, 255);
    text-align: center;
    font-size: 4em;
    padding: 50px;
    background-color: #00f942;
    letter-spacing: 10px;
    font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    background:-webkit-linear-gradient(45deg,#edaef9 40%,#81b1fa 80%);
}

    .content-table th,
    .content-table td{
        padding: 12px 15px;
        text-align: left;
    }
    .content-table tbody tr {
        border-bottom: 1px solid silver ; 
    }
    .content-table tbody tr:nth-last-of-type(even){
        background: -webkit-linear-gradient(45deg,rgb(250, 223, 255) 40%,rgb(201, 223, 253) 65%);
    }
    .content-table tbody tr:last-of-type{
        border-bottom: 3px solid #553D67;
    }
    .content-table tbody tr:active{
        color: #fff;
        background: #2f2fa2;
    }
    .form-adding label input {
    display: block;
    width: 100%;
    margin: 10px 0 15px;
    font-size: 20px;
}
    </style>
</head>
<?php
    foreach($cities as $city) {
    }
?>
<body>
    <div class="form-layout">
        <form class="form-adding" action="vendor/create_city.php" method="post">
            <a href="#" class="close-button"></a>
            <h3>Добавить новый город</h3>
            <label>
                Название города : <input class="city" type="text" name="city" required>
            </label>
            <div class="button-container">
                <button class="add-button">Добавить</button>
            </div>
        </form>
    </div>
    <h1>Телефонный справочник</h1>
   <div class="head-menu">
        <div class="box">
            <a href="index_adm.php">Главная</a>
        </div>  
        <!--<div class="box">
            <a href="">Поиск</a>
        </div>
-->
        <div class="box show-adding-form">
            Добавить
        </div>
        <div class="box">
            <a href="index_adm.php">Абоненты</a>
        </div>
        <!--<div class="box">
            <a href="">Инструкция</a>
        </div>
        -->
        <div class="box">
            <a href="index.php">Выйти</a>
        </div>
    </div>
    <div class="table-container">
        <table class="content-table">   
            <thead>
                <tr>
                    <th></th>
                    <th>Города</th>
                    <th></th>
                </tr>
            </thead>
            <?php
                    $cities = mysqli_query($connect,"SELECT * FROM city ");
                    $cities = mysqli_fetch_all($cities);
            
            foreach($cities as $city) {
            ?>
            <tbody>
                <tr>
                    <td><?= $city[1] ?></td>
                    <td><a href="city.php?id=<?= $city[0] ?>">Редактировать</a></td>
                    <td><a href="vendor/delete_city.php?id=<?= $city[0] ?>">Удалить</a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
        </table>
    </div>
</body>
</html>