<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<h3>Перебор строки посимвольно при помощи генератора</h3>
<h4>Пользователь вводит строку, на выходе ему выводится та же строка, в которой все символы h заменены на 4, l на 1, e на 3, а o на 0.</h4>
<h4>Для выполнения замены определить функцию, которая получает на вход строку, а на выходе отдаёт преобразованную строку.</h4>
<h4>Внутри функции должен использоваться генератор, которому строка передаётся целиком при инициализации, а выводит он её посимвольно в изменённом виде.</h4>
<h4>Кроме того, функция должна вывести общее число замен, которое получит из генератора.
    Html код формы ввода должен храниться в отдельном файле, но вызываться всегда должен один и тот же php-скрипт.
</h4>
<form action="code.php" method="POST">
    Строка: <input type="text" name="str" /><br><br>
    <input type="submit" value="Отправить">
</form>
</body>
</html>
