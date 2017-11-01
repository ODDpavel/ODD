<?php
session_start();
require_once '../reg_class.php';
if(!empty($_FILES['avatar']['tmp_name'])){

    if(!empty($_FILES['avatar']['error']) || ($_FILES['avatar']['error']) !== 0){
        $_SESSION['msg'] = 'Произошла ошибка загрузки';
        header('Location: ../edit.php');
        exit();
    }

    if($_FILES['avatar']['size'] > 2*1024*1024){
        $_SESSION['msg'] = 'Файл слишком большой';
        header('Location: ../edit.php');
        exit();
    }

    switch ($_FILES['avatar']['type']){

        case 'image/jpeg':
        $type = 'jpeg';
        break;

        case 'image/jpg':
        $type = 'jpg';
        break;

        case 'image/png':
        $type = 'png';
        break;

        case 'image/gif':
        $type = 'gif';
        break;

        default:
        $_SESSION['msg'] = 'Неправильный тип изображения';
        header('Location: ../edit.php');
        exit();
        break;
    }

    $img = imagecreatefromjpeg($_FILES['avatar']['tmp_name']);
    $size = getimagesize($_FILES['avatar']['tmp_name']);
    $tmp = imagecreatetruecolor(262, 262);
    imagecopyresampled($tmp, $img, 0,0,0,0, 262,262, $size[0], $size[1]);
    imagejpeg($tmp,'../images/avatars/'.$_SESSION['id'].'.'.$type);
    imagedestroy($tmp);
    imagedestroy($img);
   // if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../images/avatars/'.$_SESSION['id'].'.'.$type)) {
   //     $_SESSION['msg'] = 'Не удалось загрузить файл';
   //     header('Location: ../edit.php');
   //     exit();
   // }
    $_SESSION['msg'] = 'Файл успешно загружен';
}else{
    $_SESSION['msg'] = 'Вы не загрузили файл';
    header('Location: ../edit.php');
    exit();
}

echo $_SESSION['msg'];
$id = $_SESSION['id'];
$link = \app\linkSql::link();

mysqli_query($link, "UPDATE `users` SET avatar ='$id' WHERE id_user='$id'");



