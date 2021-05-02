<html lang="ru">
<head>
    <title>LogTask</title>
    <meta charset="utf-8">
</head>
<body>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" id="form" style="width: 300px; display: flex; flex-direction: column;">
    Сообщение <input type="text" name="message" > <br />
    <select name="type">
        <option selected value='emergency'>emergency</option>
        <option value='alert'>alert</option>
        <option value='critical'>critical</option>
        <option value='error'>error</option>
        <option value='warning'>warning</option>
        <option value='notice'>notice</option>
        <option value='info'>info</option>
        <option value='debug'>debug</option>
    </select>
    <input type="submit" name="go" value="Отправить!" id="go">
</form>
<?php
include_once("Test.php");
if (isset($_REQUEST['go'])){
    $str=$_REQUEST['message'];
    if (strlen($str)==0){
        echo "Пустая строка";
    }
    else{
        $type=$_REQUEST['type'];
        $test=new Test($str,$type);
    }
}

?>
</body>
</html>
