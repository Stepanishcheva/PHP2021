<?php
$str='';
if(isset($_POST['str'])) $str = $_POST['str'];
func($str);

function func($str)
{
    function gen($str){
        $numb=0;
        $length=strlen($str);
        $str=str_split($str);
        for ($i = 0; $i < $length; $i++) {
            switch($str[$i]) {
                case "h" :
                    $numb++;
                    yield 4;
                    break;
                case "l" :
                    $numb++;
                    yield 1;
                    break;
                case "e" :
                    $numb++;
                    yield 3;
                    break;
                case "o" :
                    $numb++;
                    yield 0;
                    break;
                default :
                    yield $str[$i];
                    break;
            }
        }
        return $numb;
    }
    echo "<br> Начальная строка: ".$str."<br>Преобразованная строка: ";
    $generator=gen($str);
    foreach($generator as $v)
        echo $v;
    echo "<br>Число замен: ".$generator->getReturn();
}

