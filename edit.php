<?php
    require_once('database.php');

    $id= '';
    $name = '';
    $reference = '';
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
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $sth->execute();
        $entry = $sth->getch(PDO::FETCH_ASSOC);

        if(gettype($entry) === 'boolean'){
            header('location : index.html.twig');
            exit;
        }

        $id= htmlentities($_GET['id']);
        $name = $entry['p.name'];
        $reference = $entry['p.reference'];
        $category = $entry['c.type'];
        $seller = $entry['s.name'];
        $selleraddress = $entry['s.address'];
        $purchasedate = $entry['p.purchasedate'];
        $warrantydate = $entry['p.warrantydate'];
        $price = $entry['p.price'];
        $purchaseticket = $entry['p.purchase ticket'];
        $maintenance = $entry['p.maintenance'];
        $usermanual = $entry['p.usermanual'];

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
        if(isset($_GET['edit']) && ($_GET['id'])){
            $sql = 'UPDATE products SET name=:name, reference=:reference, purchasedate:purchasedate, warrantydate:warrantydate, price=:price, purchaseticet=:purchaseticket, maintenance=:maintenance, usermanual=:usermanual';
        }else{
            $sql = 'BEGIN;
            INSERT INTO categories (type) 
                VALUES (:type);
                    SET @category_id = LAST_INSERT_ID();
            INSERT INTO sellers (name, address)
                VALUES (:seller , :selleraddress);
                    SET @seller_id = LAST_INSERT_ID();
            INSERT INTO products (name, reference, purchasedate, warrantydate, price, purchaseticket, maintenance, usermanual, category_id, seller_id) 
                VALUES (:name, :reference, :purchasedate, :warrantydate , :price, :purchaseticket, :maintenance, :usermanual, @category_id , @seller_id ); 
            COMMIT;';
        }

        $sth = $pdo->prepare($sql);
        $sth->bindParam(':name', $name, PDO::PARAM_STR);
        $sth->bindParam(':reference', $reference, PDO::PARAM_STR);
        $sth->bindParam(':type', $category, PDO::PARAM_STR);
        $sth->bindParam(':seller', $seller, PDO::PARAM_STR);
        $sth->bindParam(':selleraddress', $selleraddress, PDO::PARAM_STR);
        $sth->bindValue(':purchasedate', strftime("%Y-%m-%d", strtotime($purchasedate)), PDO::PARAM_STR);
        $sth->bindValue(':warrantydate', strftime("%Y-%m-%d", strtotime($warrantydate)), PDO::PARAM_STR);
        $sth->bindParam(':price', $price, PDO::PARAM_STR);
        $sth->bindParam(':purchaseticket', $purchaseticket, PDO::PARAM_STR);
        $sth->bindParam(':maintenance', $maintenance, PDO::PARAM_STR);
        $sth->bindParam(':usermanual', $usermanual, PDO::PARAM_STR);

      

       $sth->execute();


    //  header('Location : index.html.twig');
    }