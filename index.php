<?php

$fileName = 'tmp/foo.txt';

//// region chmod - права доступа к файлу
//// Доступ на запись и чтение для владельца, нет доступа для других
//chmod($fileName, 0600);
//
//// Доступ на запись и чтение для владельца, доступ на чтение для других
//chmod($fileName, 0644);
//
//// Полный доступ для владельца, доступ на чтение и выполнение для других
//chmod($fileName, 0755);
//
//// Полный доступ для владельца, доступ на чтение и выполнение для группы владельца
//chmod($fileName, 0750);
////endregion -  -

// region fopen - открывает файл или URL
$a = fopen($fileName, 'rb+'); // ток чтение;
//var_dump(fopen($fileName, 'wb')); // запись c удалением всего в файле + бинарный режим, если файла нет - создаст
$b = fopen('https://www.google.com/', 'r');
//var_dump(fopen('ftp://user:password@example.com/somefile.txt', 'w'));
//endregion

//region feof - проверка на достижение конца файла
echo feof($b);
//если открыт не верный файл - всегда false, если fsockopen() не закрыт сервером - повиснет
//endregion

//region fgets - читает строку из файла
echo fgets($a);
echo fgets($b);
//endregion

//region file_exists - проверяет наличие файла
echo file_exists($fileName) . PHP_EOL;
//endregion

//region file_put_contents - аналог последовательности fopen()-fwrite()-fclose()
file_put_contents($fileName, "\nasd", FILE_APPEND);
echo file_get_contents($fileName);
//endregion

//region flock - консультативная блокировка файлов
flock($a, LOCK_EX); // консультативный - два процесса с проверкой flock не смогут создавать дескриптор на этот файл
//endregion

//region fputs - псевдоним fwrite()
fwrite($a, "12as \n");
//endregion

//region fscanf - обрабатывает данные из файла в соответствии с форматом
fscanf($a, "%s\t%s\t%s\n");
//endregion

//region pathinfo - инфо о пути к файлу
var_dump(pathinfo($fileName));
//endregion

//region readfile - выводит файл
readfile($fileName);
//endregion

//region rewind - сбрасывает курсор файлового указателя
rewind($a);
//endregion

//region fclose - закрывает открытый дескриптор файла
fclose($a);
fclose($b);
//endregion