<?php
    require_once('database.php');

    if(isset($_GET['id'])){
        $req = 'SELECT usermanual, purchaseticket FROM products WHERE id=:id';
        $prep = $pdo->prepare($req);
        $prep->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $prep->execute();
        $files = $prep->fetch(PDO::FETCH_ASSOC);
        $file_name = $files['usermanual'];
        $img_name = $files['purchaseticket'];
        unlink('manual_img/'.$file_name.'');
        unlink('receipt_photo/'.$img_name.'');
        $sql = 'DELETE FROM products WHERE id=:id' ;
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $sth->execute();
    }

header('Location: index.php');