<?php
 require_once 'vendor/autoload.php';
    require_once('database.php');
    // if(!isset($_SESSION['username'])){
    //     header('Location: login.php');
    //     exit;
    // }

   

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);



    

$dateFr = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);

$sql = 'SELECT p.id, p.name AS productname, p.reference, c.type, p.purchasedate, p.warrantydate, p.price, p.purchaseticket, p.maintenance, p.usermanual, s.name AS sellername, s.address FROM products AS p INNER JOIN sellers AS s ON p.seller_id = s.id INNER JOIN categories AS c ON p.category_id = c.id ORDER BY p.purchasedate DESC';
$sth = $pdo->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);



 

 



 // var_dump ($rows); die();
$template = $twig->load('index.html.twig');
echo $template->render([ 'data'=> $rows ]);


