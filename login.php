<?php
 require_once('database.php');


if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    extract($_POST);
    $sql = 'SELECT  username, pwd FROM membre WHERE user=:user AND pwd:pwd';
    $sth = $pdo->prepare($sql);
    $sth->password_verify(':pwd');
    $sth->bindParam(':user', $user, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if(gettype($result) !== 'boolean'){
        if($result['pwd'] == $password){
            session_start();
            $_SESSION['username'] = $user;
            header('Location: index.html.twig');
            exit;
        }else{
            echo 'Accès refusé';
        }
    }
}


?>