<?php
    require_once('database.php');

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


    if($error === false){
        $sql = 'BEGIN; INSERT INTO products AS p (p.name, p.reference, p.purchasedate, p.warrantydate, p.price, p.purchaseticket, p.maintenance, p.usermanual, p.category_id, p.seller_id) VALUES (:name, :reference, :purchasedate, :warrantydate, :price, :purchaseticket, :maintenance, :usermanual, :category_id, :seller_id); INSERT INTO categories AS c (c.type) VALUES (LAST_INSERT_ID(), :type); INSERT INTO sellers AS s (s.name, s.address) VALUES(LAST_INSERT_ID(), :seller, :address) COMMIT;';

        $sth = $pdo->prepare($sql);
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->bindParam(':reference', $ref, PDO::PARAM_STR);
        $sth->bindParam(':type', $category, PDO::PARAM_STR);
        $sth->bindParam(':seller', $seller, PDO::PARAM_STR);
        $sth->bindParam(':selleraddress', $address, PDO::PARAM_STR);
        $sth->bindValue(':purchasedate', strftime("%Y-%m-%d", strtotime($purchasedate)), PDO::PARAM_STR);
        $sth->bindValue(':warrantydate', strftime("%Y-%m-%d", strtotime($warrantydate)), PDO::PARAM_STR);
        $sth->bindParam(':price', $price, PDO::PARAM_STR);
        $sth->bindParam(':purchaseticket', $purchaseticket, PDO::PARAM_STR);
        $sth->bindParam(':maintenance', $maintenance, PDO::PARAM_STR);
        $sth->bindParam(':usermanual', $usermanual, PDO::PARAM_STR);
        $sth->bindValue(':category', rand(1, 9999));
        $sth->bindValue(':seller_id', rand(1, 9999));

        // $sth->execute();

        // header('location: index.html.twig');
    }