<?php

    $id= '';
    $name = '';
    $ref = '';
    $category = '';
    $seller = '';
    $selleraddress = '';
    $purchasedate = '';
    $warrantydate = '';
    $price = '';
    $purchaseticket = '';
    $maintenance = '';
    $usermanual = '';
    $error = false;


    //Edit
    if(isset($_GET['edit']) && ($_GET['id'])){
        $sql = 'SELECT p.id, p.name, p.reference, c.type, p.purchasedate, p.warrantydate, p.price, p.purchaseticket, p.maintenance, p.usermanual, s.id, s.name, s.address FROM products AS p INNER JOIN sellers AS s INNER JOIN categories AS c WHERE p.id=:id ';
    }




    if(count($_POST) > 0){
        if(strlen(trim($_POST['name']) !==0)){
            $name = trim($_POST['name']);
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['reference']) !==0)){
            $reference = trim($_POST['reference']);
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['purchasedate']) !==0)){
            $purchasedate = trim($_POST['purchasedate']);
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['warrantydate']) !==0)){
            $warrantydate = trim($_POST['warrantydate']);
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['price']) !==0)){
            $price = trim($_POST['price']);
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['purchaseticket']) !==0)){
            $purchaseticket = trim($_POST['purchaseticket']);
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['maintenance']) !==0)){
            $maintenance = trim($_POST['maintenance']);
        }else{
            $error = true;
        }
    }


    if($error === false)