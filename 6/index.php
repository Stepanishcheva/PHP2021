<?php
$INI_FILE='index.ini';
$ar=array();
$ar=parse_ini_file($INI_FILE, $useSections=true, $mode=INI_SCANNER_TYPED);
$file_name=$ar['main']['filename'];
$first_rule=$ar['first_rule'];
$second_rule=$ar['second_rule'];
$third_rule=$ar['third_rule'];


$text=file($file_name);

foreach ($text as $string) {
    if (strpos($string, $first_rule['symbol']) !== false) {
        $string=substr($string,strlen($first_rule['symbol']));
        if ($first_rule['upper']===true){
            $string=strtoupper($string);
        }
        elseif ($first_rule['upper']===false){
            $string=strtolower($string);
        }
        else echo "Неожиданное значение поля upper 1 правила.   ";
    } elseif (strpos($string, $second_rule['symbol']) !== false) {
        $string=substr($string,strlen($second_rule['symbol']));
        if ($second_rule['direction']==='+'){
            $string=strtr($string,'0123456789','1234567890');
        }
        elseif ($second_rule['direction']==='-'){
            $string=strtr($string,'0123456789','9012345678');
        }
        else echo "Недопустимый знак 2 правила.Возможные значения +/-\t";
    } elseif (strpos($string, $third_rule['symbol']) !== false) {
        if(strlen($third_rule['delete'])!=1){
            echo "Количество удаляемых символов должно быть равно 1!\t"; }
        $string=substr($string,strlen($third_rule['symbol']));
        $string=str_replace($third_rule['delete'], '',$string);
    }
    echo $string.'<br>';
}
