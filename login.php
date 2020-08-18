<?php
 require_once 'vendor/autoload.php';
 require_once('database.php');

     $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    extract($_POST);
    $sql = 'SELECT  username, pwd FROM users  WHERE username=:username';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
        if(password_verify($_POST['password'], $result['pwd']) ){
            session_start();
            $_SESSION['username'] = $user;
            header('Location: index.php');
            exit;
        }else{
            echo 'Accès refusé';
        }
}

    $template = $twig->load('login.html.twig');
    echo $template->render([]);


?>