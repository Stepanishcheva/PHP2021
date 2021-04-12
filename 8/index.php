<html lang="ru">
<head>
    <title>Календарь</title>
    <meta charset="utf-8">
</head>
<body>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    <h3>Выберите месяц</h3>
    <input type="month" name="date"><br><br>
    <input type="submit" name="go" value="Показать">
</form>
<?php
    if (isset($_REQUEST['go'])){
        echo "<table>
        <thead>
            <th>Пн</th>
            <th>Вт</th>
            <th>Ср</th>
            <th>Чт</th>
            <th>Пт</th>
            <th bgcolor='red'>Сб</th>
            <th bgcolor='red'>Вс</th>
        </thead>
        <tbody>";
        $date=$_REQUEST['date'];
        $day=false;
        if ($date==null){
            $date=date("Y-m-d");
            $day=substr($date,8,2);
        }
        $date=date_parse($date);
        $y=$date['year'];
        $m=$date['month'];
        echo "<h3>".$m.".".$y;
        $week_day=1;
        $d_n = date('N', mktime(0, 0, 0, $m, "01", $y));
        if ($d_n != $week_day) {
            $c = $d_n - $week_day;
            for ($q = 0; $q < $c; $q++) {
                echo "<td></td>";
                $week_day++;
            }
        }
        try {
            $begin =DateTime::createFromFormat('j-m-Y', '1-'.$m.'-'.$y);
            $end = DateTime::createFromFormat( 'j-m-Y',(cal_days_in_month(CAL_GREGORIAN, $m,$y)+1).'-'.$m.'-'.$y);

            $interval = new DateInterval('P1D');
            $daterange = new DatePeriod($begin, $interval ,$end);

            foreach($daterange as $date){
                if ($date->format("N")>=6){
                    echo "<td bgcolor=red>"; }
                else{
                    echo "<td>";
                }
                if ($day==($date->format("j"))){
                    echo "<strong>".$day."</strong></td>";
                }else{
                    echo $date->format("j")."</td>";
                }
                if ($date->format("N")== 7) {
                    echo "</tr><tr>";
                }
            }
        } catch (Exception $e) {}
    }
?>

</tbody>
</table>
</body>
</html>
