<html lang="ru">
<head>
   <meta charset='utf-8'>
</head>
<body>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    <textarea name="str" ></textarea><br><br>
    <button type="submit" name="go" >Отправить</button>
</form>
<?php
if (isset($_REQUEST['go'])){
    if (!$_POST['str']==null){
    $strings = explode("\n", $_POST['str']);
    $map=array();

    foreach ($strings as $string){
        $words=explode(' ',$string);
        if (!(in_array($words[1],array_keys($map)))){
            $map[$words[1]]=$string;
        }
        else{
            $map[$words[1]]=array($map[$words[1]],$string);
        }
        shuffle($words);
        if (!in_array($words[1],array_keys($map))){
           $map[$words[1]]=implode(' ',$words);}
        else{
           $map[$words[1]]=array($map[$words[1]],implode(' ',$words));
        }
    }

    $k=array_keys($map);
    natsort($k);
    foreach ($k as $index){
        if (is_array($map[$index])){
            foreach ($map[$index] as $item){
                echo $item."<br>";
            }
        }
        else{
            echo $map[$index].'<br>';
        }
    }
    }
    else{echo "Пустой ввод!";}
}
?>
</body>
</html>
