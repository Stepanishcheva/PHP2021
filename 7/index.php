<html lang="ru">
<head>
    <title>Ping/Tracert</title>
    <meta charset="utf-8">
</head>
<body>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    Адресс сайта <input type="text" name="address"> <br />
    <input type="checkbox" name="toDo[]" value="ping"> Ping <br />
    <input type="checkbox" name="toDo[]" value="tracert"> Tracert <br />
    <input type="submit" name="go" value="Отправить!">
</form>
<?php
if (isset($_REQUEST['go'])){
    $url=$_REQUEST['address'];
    $url=escapeshellarg($url);
    if (isset($_REQUEST['toDo'])){$toDo = $_REQUEST['toDo'];}
    else $toDo='';

    if(empty($toDo) || empty($url)) {
        if (empty($toDo)){echo("Вы не выбрали ни одного действия <br>");}
        if (empty($url)){echo("Вы не ввели адрес");}
    }

    else {
        if(in_array('ping',$toDo)){
            echo 'Ping :'.$url.'<br>';
            $q=exec("ping $url", $ar, $status);
            $status=(int)iconv("cp866","utf-8", $status);
            if ($status==0){
                $ans=array();
                foreach ($ar as $el){
                    array_push($ans, iconv("cp866","utf-8", $el));
                }
                $ip=substr($ans[1], strpos($ans[1],'[')+1, strpos($ans[1],']')-strpos($ans[1],'[')-1 );
                echo '<strong> IP: '.$ip.'</strong>';
                $success= 100-(int)substr($ans[9],strpos($ans[9],'" ('),strpos($ans[9],'%'));
                echo '<br>% успешных запросов: '.$success.'<br>';
            }
            else{
                echo'<strong>'.iconv("cp866","utf-8", $q).'</strong>';
            }
        }
        if(in_array('tracert',$toDo)){
            echo '<br> Tracert :'.$url.'<br>';
            $n=5;
            $q=exec("tracert -h $n $url",$ar2,$status2);
            $status2=(int)iconv("cp866","utf-8", $status2);
            if ($status2==0) {
                $ans2 = array();
                foreach ($ar2 as $el) {
                    array_push($ans2, iconv("cp866", "utf-8", $el));
                }
                preg_match('/(\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3})/',$ans2[1],$m);
                echo '<strong> IP: '.$m[0].'</strong><br>';
                for ($i=4;$i<4+$n;$i++){
                    $ip=$ans2[$i];
                    preg_match('/(\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3})/',$ip,$m);
                    //echo $m[0].'<br>';
                    echo $m[0].' ';
                }
            }
            else{
                echo '<strong>'.iconv("cp866","utf-8", $q).'</strong>';
            }
        }
    }
}
?>
</body>
</html>
