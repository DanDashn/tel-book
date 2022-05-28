<?php
require_once 'conf/db_connection.php';

$id = $_GET['id'];
$people = mysqli_query($connect, "SELECT p.id, p.firstname, p.lastname, p.patronymic, p.phone, p.email, p.address, c.name
FROM peoples p
left join city  c on p.id_city=c.id
WHERE p.id = '$id'");
$people = mysqli_fetch_all($people);
foreach ($people as $peopl)

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
            $('.uping-butt').click(function(){
                $('.up-form-layout').css('display','flex');  
            })

            $('.close-up-button').click(function(){
                $('.up-form-layout').css('display','none');
               // $(location).attr('href',"index_adm.php");
            });
            $('.show-search-form').click(function(){
                alert('ВАЖНО!\rДля поиска необходимо ввести любая известная вам информация ОДНОЙ из столбцов кроме как названия города !\r');
                $('.search-form-layout').css('display','flex');
            });
            $('.close-cearch-button').click(function(){
                $('.search-form-layout').css('display','none');    
            });
            $('.show-adding-form').click(function(){
                $('.form-layout').css('display','flex');
            });
            $('.close-button').click(function(){
                $('.form-layout').css('display','none');
            });
            $('button.add-button').on('click',function(){
                var firstnameValue = $('input.firstname').val();
                var lastnameValue = $('input.lastname').val();
                var patronymicValue = $('input.patronymic').val();
                var phoneValue = $("input.phone").val();
                var emailValue = $('input.email').val();
                var addressValue = $('input.address').val();
                var cityValue = $('select.city').val();


                if (firstnameValue === '') return;
                else if (lastnameValue === '') return;
                else if (patronymicValue === '') return;
                else if (phoneValue === '') return;
                else if (emailValue === '') return;
                else if (addressValue === '') return;
                else if (cityValue === '') return;
                else{
                    alert('Новый обонент ' + firstnameValue + ' '+ lastnameValue);

                    $.ajax({    
                        method: "POST",  
                        url: "vendor/create.php",
                        data: { firstname: firstnameValue, lastname: lastnameValue, patronymic: patronymicValue, phone: phoneValue, email: emailValue, address: addressValue, city: cityValue },

                        success: function (response) {
                        $(location).attr('href',"index_adm.php");
                        $('.form-layout').css('display','none');
                    }
                    })
                
                    .done(function( ){
                    alert("Data saved: " + msg);
                    });
                    $('input.firstname').val('');
                    $('input.lastname').val('');
                    $('input.patronymic').val(''); 
                    $('input.phone').val(''); 
                    $('input.email').val(''); 
                    $('input.address').val(''); 
                    $('select.city').val(); 
                }
            });
            $('tr').on('click',function(){
                $('tr').css('background-color', '');
                $(this).css('background-color', '#edaef9');
                

            });
        });
    </script>
    <style>
.up-form-layout{
    position: fixed;
    height: 100%;
    width: 100%;
    background-color: #00000087;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Georgia, 'Times New Roman', Times, serif;
} 
.form-uping{
    background-color: #fff;
    width: 300px;
    padding: 30px 100px;
    position: relative;
}
h3{
    margin-bottom: 30px;
    font-size: 4vh;
    text-align: center;
}
.form-uping label {
    display: block;
}
.form-uping label input, select{
    display: block;
    width: 100%;
    margin: 10px 0 15px;
    font-size: 20px;
}
.up-button{
    border: 0;
    background: -webkit-linear-gradient(45deg,#edaef9 40%,#81b1fa 65%);
    font-size: 22px;
    padding: 10px 30px;
    color: #fff;
    cursor: pointer;
}
div.up-button{
    text-align: center;
}
.up-button-container{
    text-align: center;
    padding-top: 10px;
}
.close-up-button{
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
.search-form-layout{
        position: fixed;
        height: 100%;
        width: 100%;
        background-color: #00000087;
        display: none;
        justify-content: center;
        align-items: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
    } 
    .form-search{
        background-color: #fff;
        width: 300px;
        padding: 30px 100px;
        position: relative;
    }
    .content-table td a{
        color: #000;
    }
    h3{
        margin-bottom: 30px;
        letter-spacing: 3px;
        font-size: 1.5em;
        text-align:center;
        font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .form-search label {
        letter-spacing: 3px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        display: block;
    }
    .form-search label input {
        display: block;
        width: 100%;
        margin: 10px 0 15px;
        font-size: 20px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .search-button{
        border: 0;
        background: -webkit-linear-gradient(45deg,#edaef9 40%,#81b1fa 65%);
        font-size: 22px;
        padding: 10px 30px;
        color: #fff;
        cursor: pointer;
    }
    div.search-button{
        text-align: center;
    }
    .button-container{
        text-align: center;
        padding-top: 10px;
    }
    .close-cearch-button{
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
    select{
        display: block;
        width: 100%;
        margin: 10px 0 15px;
        font-size: 20px;
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
        font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
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
<body>
    <div class="up-form-layout">
        <form class="form-uping" action="vendor/update.php" method="post">
            <a href="#" class="close-up-button"></a>
            <h3>Внести поправки</h3>

            <label>     <input type="hidden" name="id" value="<?= $peopl[0] ?>">
                Имя : <input class="firstname" type="text" name="firstname" value="<?= $peopl[1]?>" required>
            </label>
            <label>
                фамилия : <input class="lastname" type="text" name="lastname" value="<?= $peopl[2]?>" required>
            </label>
            <label>
                Отчество : <input class="patronymic" type="text" name="patronymic" value="<?= $peopl[3]?>" required>
            </label>
            <label>
                телефон : <input class="phone" type="tel" name="phone" value="<?= $peopl[4]?>" minlength="18" maxlength="18" required>
            </label>
            <label>
                e-mail : <input class="email" type="email" name="email" value="<?= $peopl[5]?>" required>
            </label>
            <label>
                Адрес : <input class="address" type="text" name="address" value="<?= $peopl[6]?>" required>
            </label>
            <label>
        <!--БЭМ часть вывода списка городов в секцию-->
                Город : 
                <select class="city" name="city" required>
                    <option><?= $peopl[7]?></option>
                <?php
            $cities = mysqli_query($connect, "SELECT * FROM city");

            $cities= mysqli_fetch_all($cities);
            
            foreach ($cities as $city) {
            ?>
                    <option value="<?= $city[0] ?>"><?= $city[1] ?></option>
                    <?php
            }
            ?>
                </select>
        <!-------------------------------------------------------------->
            </label>
            <div class="up-button-container">
                <button class="up-button">Править</button>
            </div>
        </form>
    </div>
    <div class="form-layout">
        <form class="form-adding">
            <a href="#" class="close-button"></a>
            <h3>Форма добавления</h3>
            <label>
                Имя : <input class="firstname" type="text" name="firstname" required>
            </label>
            <label>
                фамилия : <input class="lastname" type="text" name="lastname" required>
            </label>
            <label>
                Отчество : <input class="patronymic" type="text" name="patronymic" required>
            </label>
            <label>
                телефон : <input class="phone" type="tel" name="phone" minlength="18" maxlength="18" required>
            </label>
            <label>
                e-mail : <input class="email" type="email" name="email" required>
            </label>
            <label>
                Адрес : <input class="address" type="text" name="address" required>
            </label>
            <label>
                Город : 
                <select class="city" name="city" required>
                <?php
            $cities = mysqli_query($connect, "SELECT * FROM city");

            $cities= mysqli_fetch_all($cities);
            
            foreach ($cities as $city) {
            ?>
                    <option value="<?= $city[0] ?>"><?= $city[1] ?></option>
                    <?php
            }
            ?>
                </select>
            </label>

            <div class="button-container">
                <button class="add-button">Добавить</button>
            </div>
        </form>
    </div>
    <div class="search-form-layout">
        <form class="form-search" action="search_adm.php" method="get">
            <a href="#" class="close-cearch-button"></a>
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
            <a href="index_adm.php">Главная</a>
        </div>  
        <div class="box show-search-form">
            Поиск
        </div>
        <div class="box show-adding-form">
            <a href="#" class="show-adding-form">Добавить</a> 
        </div>
        <div class="box">
            <a href="city_index.php">Города</a>
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
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Номер телефона</th>
                    <th>E-mail</th>
                    <th>Адрес</th>
                    <th>Город</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <?php
            $peoples = mysqli_query($connect, "SELECT p.id, p.firstname, p.lastname, p.patronymic, p.phone, p.email, p.address, c.name
            FROM peoples p
            left join city  c on p.id_city=c.id");

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
                    <td><a href="people.php?id=<?= $people[0] ?>">Редактировать</a></td>
                    <td><a href="vendor/delete.php?id=<?= $people[0] ?>">Удалить </a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
        </table>
    </div>
    <script>
  [].forEach.call(document.querySelectorAll('input[type="tel"]'), function (input) {
    let keyCode;
    function mask(event) {
      event.keyCode && (keyCode = event.keyCode);
      let pos = this.selectionStart;
      if (pos < 3) event.preventDefault();
      let matrix = '+7 (___) ___-__-__',
        i = 0,
        def = matrix.replace(/\D/g, ''),
        val = this.value.replace(/\D/g, ''),
        new_value = matrix.replace(/[_\d]/g, function (a) {
          return i < val.length ? val.charAt(i++) || def.charAt(i) : a
        });
      i = new_value.indexOf('_');
      if (i != -1) {
        i < 5 && (i = 3);
        new_value = new_value.slice(0, i)
      }
      var reg = matrix.substr(0, this.value.length).replace(/_+/g,
        function (a) {
          return '\\d{1,' + a.length + '}'
        }).replace(/[+()]/g, '\\$&');
      reg = new RegExp('^' + reg + '$');
      if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
      if (event.type == 'blur' && this.value.length < 5) this.value = ''
    }
    input.addEventListener('input', mask, false);
    input.addEventListener('focus', mask, false);
    input.addEventListener('blur', mask, false);
    input.addEventListener('keydown', mask, false);
  });
</script>
</body>
</html>