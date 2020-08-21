<?php

if(isset($_FILES['manual_product'])){
    $errors = array();
    $file_name = $_FILES['manual_product']['name'];
    $file_size = $_FILES['manual_product']['size'];
    $file_tmp = $_FILES['manual_product']['tmp_name'];
    $file_type = $_FILES['manual_product']['type'];
    $data = explode('.', $_FILES['manual_product']['name']);
    $file_ext = strtolower($data[count($data) - 1]);

    $extension = array('jpeg', 'gif', 'png', 'jpg', 'pdf');
    if(in_array($file_ext, $extension) === false){
        $errors[]= "file not allowed, please upload a picture or pdf file";
    }

    if($file_size > 2097152){
        $errors[]= "File size must be lighter than 2Mb";
    }

    if(empty($errors) == true){
        move_uploaded_file($file_tmp, "manual_img/".$file_name);
    }

}

if(isset($_FILES['image_product'])){
    $errors = array();
    $img_name = $_FILES['image_product']['name'];
    $img_size = $_FILES['image_product']['size'];
    $img_tmp = $_FILES['image_product']['tmp_name'];
    $img_type = $_FILES['image_product']['type'];
    $data = explode('.', $_FILES['image_product']['name']);
    $img_ext = strtolower($data[count($data) - 1]);

    $extension = array('jpeg', 'gif', 'png', 'jpg', 'pdf');
    if(in_array($img_ext, $extension) === false){
        $errors[]= "file not allowed, please upload a picture or pdf file";
    }

    if($img_size > 2097152){
        $errors[]= "File size must be lighter than 2Mb";
    }

    if(empty($errors) == true){
        move_uploaded_file($img_tmp, "receipt_photo/".$img_name);
    }

}
