<?php


function my_error_handler($no, $msg, $file, $line){
    echo "Sorry error";
    $dt = date("d-m-Y H:i:s");
    $str = "$dt - $msg in $file:$line\n";
    error_log($str,3,"error.log");
    //echo "$no, $msg, $file, $line";
}
set_error_handler("my_error_handler");

try{
    if(false) {
        throw new Exception("MY EXCEPTION!!!");

    } else {
        echo "The end!";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

