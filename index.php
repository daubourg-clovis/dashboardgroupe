<?php
 require_once 'vendor/autoload.php';
    require_once('database.php');


   

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

    

$dateFr = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);

$sql = 'SELECT p.id, p.name, p.reference, c.type, p.purchasedate, p.warrantydate, p.price, p.purchaseticket, p.maintenance, p.usermanual, s.name, s.address FROM products AS p INNER JOIN sellers AS s ON p.seller_id = s.id INNER JOIN categories AS c ON p.category_id = c.id ORDER BY p.purchasedate DESC';
$sth = $pdo->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row){
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['reference'].'</td>';
    echo '<td>'.$row['type'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['address'].'</td>';
    echo '<td>'.$dateFr->format(strtotime($row['purchasedate'])).'</td>';
    echo '<td>'.$dateFr->format(strtotime($row['warrantydate'])).'</td>';
    echo '<td>'.$row['price'].'</td>';
    echo '<td>'.$row['purchaseticket'].'</td>';
    echo '<td>'.$row['maintenance'].'</td>';
    echo '<td>'.$row['usermanual'].'</td>';
    echo '<td><a href="edit.php?edit=1&id='.$row['id'].'">Modifier</a></td>';
    echo '<td><a href="delete.php?id='.$row['id'].'">Supprimer</a></td>';

}

// $id= '';
// $name = '';
// $ref = '';
// $category = '';
// $seller = '';
// $selleraddress = '';
// $purchasedate = '';
// $warrantydate = '';
// $price = '';
// $purchaseticket = '';
// $maintenance = '';
// $usermanual = '';

// $rows = array(
//     'ID' => $id['p.id'],
//     'name' => $name['p.name'],
//     'reference' => $ref['p.reference'],
//     'category' => $category['c.type'],
//     'seller' => $seller['s.name'],
//     'address' => $selleraddress['s.address'],
//     'purchasedate' => $dateFr->format(strtotime($purchasedate['p.purchasedate'])),
//     'warrantydate' => $dateFr->format(strtotime($warrantydate['p.warrantydate'])),
//     'price' => $price['p.price'],
//     'purchaseticket' => $purchaseticket['p.purchaseticket'],
//     'maintenance' => $maintenance['p.maintenance'],
//     'usermanual' => $usermanual['p.usermanual'],
//     'edit' => '<a href="edit.php?edit=1&id='.$id['p.id'].'">Modifier</a>',
//     'delete' => '<a href="delete.php?id='.$id['p.id'].'">Supprimer</a>',
// );

$template = $twig->load('index.html.twig');
echo $template->render();