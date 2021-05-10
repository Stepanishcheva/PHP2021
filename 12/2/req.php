<?php
$str='';
if(isset($_POST['str'])) $str = $_POST['str'];
if ((!isset($_COOKIE['str']))&(strlen($str)!=0))
{
    setcookie('str',$str);
    post($str);
}
else
{
    if ($_COOKIE['str']!=$str)
    {
        echo "Неверная строка.\n Ожидалось: ".$_COOKIE['str'];
    }
    else
    {
        post($str);
    }
}


function post($str)
{
    $paramsArray = array(
        'str' => $str
    );
    $vars = http_build_query($paramsArray);
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $vars,
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents('http://localhost:8043/code.php', false, $context);
    echo $result;
}


