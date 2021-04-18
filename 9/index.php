<html lang="ru">
<head>
    <title>Ping/Tracert</title>
    <meta charset="utf-8">
</head>
<body>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" id="form" style="width: 300px; display: flex; flex-direction: column;">
    Строка <input type="text" name="string" > <br />
    <input type="radio" name="action" value="b"  onclick="br()" />Browser<br>
    <input type="radio" name="action" value="f" onclick="func()" id="f"/>File<br>
    <input type="submit" name="go" value="Отправить!" id="go">
</form>
<script>
    var parent=document.getElementById('form');
   function func(){
       if (el=document.getElementById('br')){
           el.parentNode.removeChild(el);
       }

       if (!document.getElementById('fileName')){
       var fileName=document.createElement('input');
       fileName.className='fileName';
       fileName.id='fileName';
       fileName.name='fileName';
       fileName.placeholder="Название файла"
       before=document.getElementById('go');
       parent.insertBefore(fileName,before);
       }
   }

   function br(){
       if (el=document.getElementById('fileName')){
           el.parentNode.removeChild(el);
       }
       if (!document.getElementById('br')){
           var br=document.createElement('div');
           br.id='br';
           br.innerHTML='<input type="radio" name="br" value="t"  "/> Время<br>' +
               '<input type="radio" name="br" value="dt" id="f"/>Дата и время<br>' +
               '<input type="radio" name="br" value="n" checked="true" id="f"/>-<br>';
           before=document.getElementById('f');
           br.style.marginLeft="25px";
           parent.insertBefore(br,before);

       }
   }
</script>


<?php

ini_set('max_execution_time', 300);
if (isset($_REQUEST['go'])){
    require_once('FileLogger.php');
    require_once('Logger.php');
    require_once('BrowserLogger.php');
    $str=$_REQUEST['string'];
    if (strlen($str)==0){
        echo "Пустая строка";
    }
    else{
        if( isset( $_REQUEST['action'] ) )
        {
            if ( $_REQUEST['action']=='b'){
                $log=new BrowserLogger($str,$_REQUEST['br']);
            }
            else{
                $log= new FileLogger($str,$_POST['fileName']);
            }
            $log->write();
        }
        else{echo 'Не знаю куда записать';}
    }
}?>
</body>
</html>