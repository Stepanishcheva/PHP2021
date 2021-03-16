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
        $map=array();
        $json=array();
        $data=[];
        $all_weight=0;
        $strings = explode("\n", $_POST['str']);
        foreach ($strings as $str){
            $str=trim($str);
            $weight=trim(strrchr($str,' '));
            $str=str_replace ( $weight ,'', $str );
            settype($weight, 'integer');
            $all_weight+=$weight;
            $map[$str]=$weight;
        }
        $gen=$map;
        foreach ($map as $key => $value){
            $elem['text']=$key;
            $elem['weight']=$value;
            $elem['probability']=$value/$all_weight;
            array_push($data,$elem);
        }
        $json['sum']=$all_weight;
        $json['data']=$data;
        $json=json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        print_r($json."<br><br>");
        include 'generate.php';
        check_random($gen,1000);
    }
    else{
        echo "Пустой ввод!";
    }
}
?>
</body>
</html>



