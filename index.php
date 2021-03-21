<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset='utf-8'>
    <title>Password </title>
</head>
<body>
<h3>Проверка пароля</h3>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    <input type="text" name="password" placeholder="password">
    <button type="submit" name="go" >Отправить</button>
</form>
<?php
if (isset($_REQUEST['go'])){
    if (!$_POST['password']==null){
        $password=$_POST['password'];
        if (strlen($password)<10){
            echo "Пароль содержит менее 10 символов!";
        }
        elseif (preg_match("/[[:upper:]]{4,}/",$password)){
            echo "Пароль содержит более 3 заглавных букв подряд";
        }
        elseif (preg_match("/[[:lower:]]{4,}/",$password)){
            echo "Пароль содержит более 3 строчных букв подряд";
        }
        elseif (preg_match("/[[:digit:]]{4,}/",$password)){
           echo "Пароль содержит более 3 цифр подряд";
        }
        elseif (preg_match("/[%$#_*]{4,}/",$password)){
            echo "Пароль содержит более 3 спецсимволов подряд";
        }
        elseif (preg_match_all("/[%$#_*]/",$password)<2){
            echo "в пароле содержится менее 2 специальных символов";
        }
        elseif(preg_match_all("/[[:digit:]]/", $password)<2){
            echo "в пароле содержится менее 2 цифр";
        }
        elseif (preg_match_all("/[[:lower:]]/",$password)<2){
            echo "в пароле содержится менее 2 заглавных букв";
        }
        elseif (preg_match_all("/[[:upper:]]/",$password)<2){
            echo "в пароле содержится менее 2 заглавных букв";
        }
        else{
            echo "Успех!";
        }
    }
    else{echo "Пароль не введен!";}
}
?>
</body>
</html>



