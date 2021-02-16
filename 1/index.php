<html lang="ru">
<head>
    <title>Интерпретатор языка brainfuck</title>
    <meta charset='utf-8'>
</head>
<body>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    Код <input type="textarea" name="code"> <br />
    Входные параметры <input type="text" name="param"> <br />
    <input type="submit" name="go" value="Отправить!">
</form>
<?php
    if (isset($_REQUEST['go'])){
        $code=$_REQUEST['code'];
        $length=strlen($code);
        $code= str_split($code);
        $param=str_split($_REQUEST['param']);
        foreach ($param as &$val){
            $val=ord($val);
        }
        unset($val);
        $param_cursor=0;
        $ans[0] = 0;
        $cursor=0;
        $str="";
        $cycle=0;
        for($i=0; $i<$length; $i++) {
            switch($code[$i]) {
                case ">" :
                    $cursor++;
                    if(!isset($ans[$cursor])) {
                        $ans[$cursor] = 0;
                    }
                    break;
                case "<" :
                    $cursor--;
                    if(!isset($ans[$cursor])) {
                        $ans[$cursor] = 0;
                    }
                    break;
                case "+" :
                    $ans[$cursor]++;
                    break;
                case "-" :
                    if($ans[$cursor]==0) $ans[$cursor]=255;
                    else $ans[$cursor]--;
                    break;
                case "." :
                    $str.=chr($ans[$cursor]);
                    break;
                case "," :
                    $ans[$cursor] = $param[$param_cursor];
                    $param_cursor++;
                    break;
                case "[" :
                    $cycle = $i;
                    if ($ans[$cursor] != 0) {
                        if ($code[$i] == ']') $ans[$cursor]--;
                    }
                    break;
                case "]" :
                    if ($ans[$cursor] != 0)
                        $i = $cycle;
                    break;
            }
        }
        echo $str;
    }
?>
</body>
</html>
