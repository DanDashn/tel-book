<?php
        require_once 'conf/db_connection.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
    <link rel="icon"  type="image/icon" href="fav/favicon.ico">
    <link rel="manifest" href="fav/site.webmanifest">
    <link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Телефонный Справочник</title>
    <script>
        $(function(){
            
            $('.show-search-form').click(function(){
                alert('ВАЖНО!\rДля корректного поиска необходимо ввести любую известную вам информацию на примере ОДНОЙ из столбцов кроме как названия города !\r');
                $('.form-layout').css('display','flex');
            });
            $('.close-button').click(function(){
                $('.form-layout').css('display','none');    
            });
            $('button.search-button').on('click',function(){
                var selectValue = $('input.search').val();
                if(selectValue){
                    $.ajax({    
                        method: "GET",  
                        url: "search_adm.php",
                        data: { search: selectValue},
                        success: function (response) {
                        //$(location).attr('href',"index.php");
                        $('.form-layout').css('display','none');
                    }
                    })
                        .done(function( ){
                        // alert("Data saved: " + msg);
                        });
                       // $('input.search').val('');
                }
               /*if(selectValue == 'firstname'){
                    alert("Вы выбрали способ поиска:\rПоиск по имени");
                    $('.nwinpt').append('Имя : <input class="firstname" type="text" name="firstname">');

                } 
                else if(selectValue == 'lastname'){
                    alert("Вы выбрали способ поиска:\rПоиск по Фамилии");
                    $('.nwinpt').append('Фамилия : <input class="lastname" type="text" name="lastname">');
                }
                else if(selectValue == 'phone'){
                    alert("Вы выбрали способ поиска:\rПоиск по номеру телефона");
                    $('.nwinpt').append('Телефон : <input class="phone" type="text" name="phone">');
                }
                if (selectValue){
                    $('select').prop('disabled', true);
                }*/
            });
            $('.close-button').click(function(){
                $('.form-layout').css('display','none');
               // $(location).attr('href',"index.php");
            });
            
        });
    </script>
    <style>
    
    *{
        padding: 0;
        margin: 0;  
        list-style-type: none;
        text-decoration: none;
    }
    h1{
        color: rgb(255, 255, 255);
        text-align: center;
        font-size: 4em;
        padding: 50px;
        background-color: #242582;
        letter-spacing: 10px;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background: -webkit-linear-gradient(45deg,#edaef9 40%,#81b1fa 65%);
    }
    @media (min-width: 525px){
        .head-menu{
            display: flex;
            align-items: stretch;
            flex-direction: row;
            align-items: center;    
        }
    }
    select{
        display: block;
        width: 100%;
        margin: 10px 0 15px;
        font-size: 20px;
    }
    .box{
        text-align: center;
        flex: 1;
        vertical-align: middle;
        cursor: pointer;
    }

    .head-menu div{
        background-color: #81b1fa;
        font-size: 1.3em;
        padding: 12px;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .head-menu div:hover{
        background-color: #edaef9;  
    }   
    a{
        color: #fff;
    }
    .form-layout{
        position: fixed;
        height: 100%;
        width: 100%;
        background-color: #00000087;
        display: none;
        justify-content: center;
        align-items: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
    } 
    .form-adding{
        background-color: #fff;
        width: 300px;
        padding: 30px 100px;
        position: relative;
    }
    h3{
        margin-bottom: 30px;
    }
    .form-adding label {
        display: block;
    }
    .form-adding label input {
        display: block;
        width: 100%;
        margin: 10px 0 15px;
        font-size: 20px;
    }
    select{
        display: block;
        width: 100%;
        margin: 10px 0 15px;
        font-size: 20px;
    }
    .search-button{
        border: 0;
        background: -webkit-linear-gradient(45deg,#edaef9 40%,#81b1fa 65%);
        font-size: 22px;
        padding: 10px 30px;
        color: #fff;
        cursor: pointer;
    }
    div.add-button{
        text-align: center;
    }
    .button-container{
        text-align: center;
        padding-top: 10px;
    }
    .close-button{
        position: absolute;
        right: 10px;
        top: 10px;
        height: 30px;
        width: 30px;
        background-image: url(close.png);
        background-size: 25px 25px;
        background-repeat: no-repeat;
        background-position: center ;
    }
    .table-container{
        position: static;
        margin-left: 5%;
        width: 90%;
        height: auto;
    }
    .content-table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 1em;
        min-width: 400px;
        border-radius: 10px 10px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .content-table thead tr {
        background: -webkit-linear-gradient(45deg,#edaef9 40%,#81b1fa 65%);
    }
    .content-table thead th{
        color: #fff;
        text-align: left;
        font-weight: bold;
        padding: 20px 10px;
    }   
    .content-table th,
    .content-table td{
        padding: 12px 10px;
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
    </style>
</head>
<body>
    <div class="form-layout">
        <form class="form-adding" action="search.php" method="get">
            <a href="#" class="close-button"></a>
            <h3>Форма поиска</h3>
            <label>
                Поиск : 
                <!--<select class="search" name="search">
                        <option value="">Выберите критерию поиска</option>
                    <option value="firstname">Поиск по имени</option>
                    <option value="lastname">Поиск по Фамилии</option>
                    <option value="phone">Поиск по номеру телефона</option>
                </select>-->
                <input type="search"  class="search" name="search" value="">
            </label>
            <label class="nwinpt">
            </label>

            <div class="button-container">
                <button class="search-button">Искать</button>
            </div>
        </form>
    </div>
    <h1>Телефонный справочник</h1>
   <div class="head-menu">
        <div class="box">
            <a href="index.php">Главная</a>
        </div>  
        <div class="box show-search-form">
            Поиск
        </div>
        <!--
        <div class="box">
            <a href="#">Сообщить о проблеме</a> 
        </div>
-->
        <!--<div class="box">
            <a href="">Инструкция</a>
        </div>
        -->
        <div class="box">
            <a href="check-login.php">Войти</a>
        </div>
    </div>
    <div class="table-container">
        <table class="content-table">   
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Номер телефона</th>
                    <th>E-mail</th>
                    <th>Адрес</th>
                    <th>Город</th>
                </tr>
            </thead>
            <?php
            $search = $_GET['search']; 
            $peoples = mysqli_query($connect, "SELECT p.id, p.firstname, p.lastname, p.patronymic, p.phone, p.email, p.address, c.name
            FROM peoples p
            left join city c on p.id_city=c.id
            WHERE p.firstname = '$search' OR  p.lastname = '$search' OR  p.patronymic = '$search' 
            OR p.phone = '$search' OR p.email = '$search' OR p.address = '$search' ");
            $peoples= mysqli_fetch_all($peoples);
            foreach ($peoples as $people) {
            ?>
            <tbody>
                <tr>
                    <td><?= $people[1] ?></td>
                    <td><?= $people[2] ?></td>
                    <td><?= $people[3] ?></td>
                    <td><?= $people[4] ?></td>
                    <td><?= $people[5] ?></td>
                    <td><?= $people[6] ?></td>
                    <td><?= $people[7] ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
        </table>
    </div>
</body>
</html>