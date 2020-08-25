<?php
 require_once 'vendor/autoload.php';
    require_once('database.php');
    require_once('upload.php');

    // session_start();
    // if(!isset($_SESSION['username'])){
    //     header('Location: login.php');
    //     exit;
    // }

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
    $categoryid = '';
    $sellerid = '';
    $error = false;










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

        $seller = trim($_POST['seller']);
        $selleraddress = trim($_POST['selleraddress']);
        $usermanual = $file_name;
        $category = trim($_POST['category']);
        $sellerid = trim($_POST['sellerid']);
        $categoryid = trim($_POST['categoryid']);


        $flag = false;
        if (empty($_POST['seller'])&& empty($_POST['category']) && empty($_POST['selleraddress'])){
            $flag = 1;
        }
        if(!empty($_POST['seller']) && !empty($_POST['selleraddress'])){
            $flag = 2;
        }

        if(!empty($_POST['category'])){
            if($flag == 2){
                $flag = 4;
            }else{
                
                $flag = 3;
            }
        }

        if($error === false){
            switch($flag){

                    case 1:
                $sql= 'INSERT INTO products (name, reference, purchasedate, warrantydate, price, purchaseticket, maintenance, usermanual,  category_id, seller_id) 
                    VALUES (:name, :reference, :purchasedate, :warrantydate , :price, :purchaseticket, :maintenance, :usermanual,  :categoryid , :sellerid )';
                $sth = $pdo->prepare($sql);
                $sth->bindParam(':categoryid', $categoryid, PDO::PARAM_STR);
                $sth->bindParam(':sellerid', $sellerid, PDO::PARAM_STR);
                    break;
                    case 2:

                $sql = "BEGIN;
                INSERT INTO sellers (name, address)
                    VALUES (:seller , :selleraddress);
                        SET @seller_id = LAST_INSERT_ID();
                INSERT INTO products (name, reference, purchasedate, warrantydate, price, purchaseticket, maintenance, usermanual,  category_id, seller_id) 
                    VALUES (:name, :reference, :purchasedate, :warrantydate , :price, :purchaseticket, :maintenance, :usermanual,  :categoryid , @seller_id ); 
                COMMIT;";
                $sth = $pdo->prepare($sql);
                $sth->bindParam(':categoryid', $categoryid, PDO::PARAM_STR);
                $sth->bindParam(':seller', $seller, PDO::PARAM_STR);
                $sth->bindParam(':selleraddress', $selleraddress, PDO::PARAM_STR);
                    break;
                    case 3:
                $sql ="BEGIN;
                INSERT INTO categories (type) 
                    VALUES (:type);
                        SET @category_id = LAST_INSERT_ID();
                INSERT INTO products (name, reference, purchasedate, warrantydate, price, purchaseticket, maintenance, usermanual,  category_id, seller_id) 
                    VALUES (:name, :reference, :purchasedate, :warrantydate , :price, :purchaseticket, :maintenance, :usermanual,  @category_id , :sellerid ); 
                COMMIT;";
                $sth = $pdo->prepare($sql);
                $sth->bindParam(':sellerid', $sellerid, PDO::PARAM_STR);
                $sth->bindParam(':type', $category, PDO::PARAM_STR);
                    break;
                case 4: 
                
                
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
                break;
                default;
    
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
           
            

           header('Location: index.php');
        }

    }

   
    $req = 'SELECT p.id, p.name AS productname, p.reference, c.id AS categoryid, c.type, p.purchasedate, p.warrantydate, p.price, p.purchaseticket, p.maintenance, p.usermanual, s.id AS sellerid, s.name AS sellername, s.address FROM products AS p INNER JOIN sellers AS s ON p.seller_id = s.id INNER JOIN categories AS c ON p.category_id = c.id ';
    $prep= $pdo->prepare($req);
    $prep->execute();
    $values = $prep->fetchAll(PDO::FETCH_ASSOC);


    $template = $twig->load('submit.html.twig');
    echo $template->render(['values' => $values]);
