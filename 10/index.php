<?php
require_once ('MyClass.php');
$cl=new MyClass();
for ($i = 1; $i <= 4; $i++){
    $func=chooseFunction($i);
    try {
        $cl->$func();

    } catch (ns\Exception1 $e) {
        echo $e->getMessage();
    }
    catch (ns\Exception2 $e) {
        echo $e->getMessage();
    }
    catch (ns\Exception3 $e) {
        echo $e->getMessage();
    }
    catch (ns\Exception4 $e) {
        echo $e->getMessage();
    }
    catch (ns\Exception5 $e) {
        echo $e->getMessage();
    }
    echo '<br>';
}
 function chooseFunction($num): string
 {
    switch ($num){
        case 1:
            return 'func1';
        case 2:
            return 'func2';
        case 3:
            return 'func3';
        case 4:
            return 'func4';
    }
 }
