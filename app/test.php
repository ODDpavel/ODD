<?php
echo "Тестовая страница <br>";

function divide($a, $b) {
    if ($b == 0) throw new Exception("На ноль делить нельзя");

    return $a/$b;
}

try {
    $i = 10;
    $i = divide(10,2);
    $i++;

}
catch (Exception $e) {
    echo $e->getMessage();
}

    echo '<br/>', $i,'<br/>';
$file = 'edit.php';

try{
    if (!file_exists($file)) { // проверяем на существование файла в проекте
        throw new Exception("File not found!!!");
    } else {
        echo $file;
    }
} catch (Exception $e){
    echo $e->getMessage();
}

