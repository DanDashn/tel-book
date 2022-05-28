<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
    <link rel="icon"  type="image/icon" href="fav/favicon.ico">
    <link rel="manifest" href="fav/site.webmanifest">
    <link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="logstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Телефонный справочник авторизация</title>
    <style>
      :root{
  --bgColor: #ffffff;
  --formColor: linear-gradient(45deg,#edaef9 40%,#81b1fa 80%);
  --txtColor: #ffffff;
  --txtSecondaryColor: #000;
  --inputBoxBg : transparent;
  --txtBtnColor: #ffffff;
  --txtBtnSecondaryColor: #000000;
  --btnBorderColor: #ffffff;
  --btnBgColor: transparent;
  --btnBgSecondaryColor: #ffffff;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: var(--bgColor);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
  background: var(--formColor);
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: var(--txtColor);
  text-align: center;
}

.login-box .user-box {
  position: relative;
  }

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: var(--txtColor);
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: var(--inputBoxBg);
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: var(--txtColor);
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: var(--txtSecondaryColor);
  font-size: 12px;
}
.login-box form button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: var(--txtBtnColor);
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box button:hover {
  background: var(--btnBgSecondaryColor);
  color: var(--txtBtnSecondaryColor);
  border-radius: 5px;
  box-shadow: 0 0 5px var(--btnBgSecondaryColor),
              0 0 25px var(--btnBgSecondaryColor),
              0 0 50px var(--btnBgSecondaryColor),
              0 0 100px var(--btnBgSecondaryColor);
}

.login-box button span {
  position: absolute;
  display: block;
}

.login-box button span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, var(--btnBorderColor));
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
  left: -100%;
}
  50%,100% {
    left: 100%;
  }
}

.login-box button span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, var(--btnBorderColor));
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box button span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, var(--btnBorderColor));
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, var(--btnBorderColor));
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
.back-box {
  position: absolute;
  top: 50%;
  left: 30%;
  padding: 30px;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  font-size: 3vh;
  color: var(--txtBtnColor);
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
  background: var(--formColor);
}
.back-box a:hover {
  background: var(--btnBgSecondaryColor);
  color: var(--txtBtnSecondaryColor);
  border-radius: 5px;
  box-shadow: 0 0 5px var(--btnBgSecondaryColor),
              0 0 25px var(--btnBgSecondaryColor),
              0 0 50px var(--btnBgSecondaryColor),  
              0 0 100px var(--btnBgSecondaryColor);
}
.back-box a{
  position: relative;
  display: inline-block;
  color: var(--txtBtnColor);
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  letter-spacing: 4px;
  
}
.sssssss{
  background-color: black;
}
    </style>
  <script>
        $(function(){
            $('button').on('click',function(){
                var lgnValue = $('input.lgn').val();
                var pswrdValue = $('input.pswrd').val();
                
                $.ajax({
                    method:"post",
                    url: "vendor/login.php",
                    data: { lgn: lgnValue, pswrd: pswrdValue },
                    success: function () {
                    //$(location).attr('href',"vendor/login.php");
                    //$(location).attr('href',"index_adm.php");
                }
                })
                .done(function( ) {
                       // alert( "Data Saved: " + msg );
                });
                $('input.title').val('');
                $('textarea.content').val('');
                
            })
        });
    </script>
</head>
<body>
  <div class="back-box"><a class ="back" href="index.php">На главную</a></div>
  <div class="login-box">
    <h2>Авторизация</h2>
    <form  action="vendor/login.php" method="post">
      <div class="user-box">
        <input class="lgn" autocomplete="section-blue shipping street-address" type="text" name="lgn" required>
        <label>Пользователь</label>
      </div>
      <div class="user-box">
        <input class="pswrd" autocomplete="section-blue shipping street-address" type="password" name="pswrd" required>
        <label>Пароль</label>
      </div>
      <button class="sssssss">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Войти
      </button>
    </form>
  </div>
</body>
</html>
