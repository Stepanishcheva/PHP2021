<?php
function check_random($data, $c) {
    if (count($data)==0) { return false; }

    function gen($data, $c){
        arsort($data);
        $max_rand=0;
        $weights=array();
        foreach ($data as $key=>$value) {
            $max_rand+=$value;
            $weights[$max_rand]=$key;
        }
        for ($i=0;$i<$c;$i++){
            $rand=mt_rand(0,$max_rand);
            foreach ($weights as $key=>$value) {
                if ($rand<=$key) {
                    break;
                }
            }
            yield $value;
        }
    }
    $generator=gen($data, $c);
    $counts=[];
    $allCount=0;
    foreach ($generator as $gen){
        if (in_array($gen,array_keys($counts))) {
            $counts[$gen]+=1;
        }
        else{ $counts[$gen]=1;}
        $allCount++;
    }
    $jsonAns=[];
    foreach ($counts as $key=>$value){
        $elem['text']=$key;
        $elem['count']=$value;
        $elem["calculated_probability"]=$value/$allCount;
        array_push($jsonAns,$elem);
    }
    $jsonAns=json_encode($jsonAns, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    print_r($jsonAns);

}

