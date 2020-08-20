<?php
 require_once 'vendor/autoload.php';
    require_once('database.php');
    require_once('upload.php');

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);


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
        $entry = $sth->fetch(PDO::FETCH_ASSOC);

        if(gettype($entry) === 'boolean'){
            header('location : index.php');
            exit;
        }

        $id= htmlentities($_GET['id']);
        $name = $entry['name'];
        $reference = $entry['reference'];
        $category = $entry['type'];
        $seller = $entry['name'];
        $selleraddress = $entry['address'];
        $purchasedate = $entry['purchasedate'];
        $warrantydate = $entry['warrantydate'];
        $price = $entry['price'];
        $purchaseticket = $entry['purchaseticket'];
        $maintenance = $entry['maintenance'];
        $usermanual = $entry['usermanual'];

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
        if(strlen(trim($_POST['purchase_date']) !==0)){
            $purchasedate = trim($_POST['purchase_date']);
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['end_warranty']) !==0)){
            $warrantydate = trim($_POST['end_warranty']);
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['price']) !==0)){
            $price = trim($_POST['price']);
        }else{
            $error = true;
        }
        if($_FILES['image_product']['error'] == 0){
            $purchaseticket = $img_name;
        }else{
            $error = true;
        }
        if(strlen(trim($_POST['advices']) !==0)){
            $maintenance = trim($_POST['advices']);
        }else{
            $error = true;
        }
        var_dump($error);
        die();
        $seller = trim($_POST['seller']);
        $selleraddress = trim($_POST['selleraddress']);
        $usermanual = $file_name;
        $category = trim($_POST['category']);


        if($error === false){
            if(isset($_GET['edit']) && ($_GET['id'])){
              
                $sql = 'UPDATE products SET name=:name, reference=:reference, purchasedate=:purchasedate, warrantydate=:warrantydate, price=:price, purchaseticket=:purchaseticket, maintenance=:maintenance, usermanual=:usermanual WHERE id=:id';            
                $sth = $pdo->prepare($sql);
                $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            }else{
                $sql = "BEGIN;
                INSERT INTO categories (type) 
                    VALUES (:type);
                        SET @category_id = LAST_INSERT_ID();
                INSERT INTO sellers (name, address)
                    VALUES (:seller , :selleraddress);
                        SET @seller_id = LAST_INSERT_ID();
                INSERT INTO products (name, reference, purchasedate, warrantydate, price, purchaseticket, maintenance, usermanual,  category_id, seller_id) 
                    VALUES (:name, :reference, :purchasedate, :warrantydate , :price, :purchaseticket, :maintenance, :usermanual,  @category_id , @seller_id ); 
                COMMIT;";
                $sth = $pdo->prepare($sql);
                
                $sth->bindParam(':type', $category, PDO::PARAM_STR);
                $sth->bindParam(':seller', $seller, PDO::PARAM_STR);
                $sth->bindParam(':selleraddress', $selleraddress, PDO::PARAM_STR);
    
            }
    
                
            $sth->bindParam(':name', $name, PDO::PARAM_STR);
            $sth->bindParam(':reference', $reference, PDO::PARAM_STR);
            $sth->bindValue(':purchasedate', strftime("%Y-%m-%d", strtotime($purchasedate)), PDO::PARAM_STR);
            $sth->bindValue(':warrantydate', strftime("%Y-%m-%d", strtotime($warrantydate)), PDO::PARAM_STR);
            $sth->bindParam(':price', $price, PDO::PARAM_STR);
            $sth->bindParam(':purchaseticket', $purchaseticket, PDO::PARAM_STR);
            $sth->bindParam(':maintenance', $maintenance, PDO::PARAM_STR);
            $sth->bindParam(':usermanual', $usermanual, PDO::PARAM_STR);
    
          
    
           $sth->execute();
      
        //    header('Location : index.php');
        }
    }



    $template = $twig->load('submit.html.twig');
    echo $template->render([]);
