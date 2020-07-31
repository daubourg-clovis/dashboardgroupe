<?php
 require_once('database.php');


if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    extract($_POST);
    $sql = 'SELECT  username, pwd FROM users  WHERE user=:user AND pwd:pwd';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':user', $user, PDO::PARAM_STR);
    $sth->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
        if(password_verify($pwd) == $password){
            session_start();
            $_SESSION['username'] = $user;
            header('Location: index.php');
            exit;
        }else{
            echo 'Accès refusé';
        }
}


?>