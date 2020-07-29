<?php
    require_once('database.php');

$dateFr = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);

$sql = 'SELECT p.id, p.name, p.reference, c.type, p.purchasedate, p.warrantydate, p.price, p.purchaseticket, p.maintenance, p.usermanual, s.id, s.name, s.address FROM products AS p INNER JOIN sellers AS s INNER JOIN categories AS c ORDER BY p.purchasedate DESC';
$sth = $pdo->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);

// foreach($rows as $row){
//     echo '<td>'.$row['p.id'].'</td>';
//     echo '<td>'.$row['p.name'].'</td>';
//     echo '<td>'.$row['p.reference'].'</td>';
//     echo '<td>'.$row['c.type'].'</td>';
//     echo '<td>'.$row['s.name'].'</td>';
//     echo '<td>'.$row['s.address'].'</td>';
//     echo '<td>'.$dateFr->format(strtotime($row['p.purchasedate'])).'</td>';
//     echo '<td>'.$dateFr->format(strtotime($row['p.warrantydate'])).'</td>';
//     echo '<td>'.$row['p.price'].'</td>';
//     echo '<td>'.$row['p.purchaseticket'].'</td>';
//     echo '<td>'.$row['p.maintenance'].'</td>';
//     echo '<td>'.$row['p.usermanual'].'</td>';
//     echo '<td><a href="edit.php?edit=1&id='.$row['p.id'].'">Modifier</a></td>';
//     echo '<td><a href="delete.php?id='.$row['p.id'].'">Supprimer</a></td>';

// }

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

$rows = array(
    'ID' => $id['p.id'],
    'name' => $name['p.name'],
    'reference' => $ref['p.reference'],
    'category' => $category['c.type'],
    'seller' => $seller['s.name'],
    'address' => $selleraddress['s.address'],
    'purchasedate' => $dateFr->format(strtotime($purchasedate['p.purchasedate'])),
    'warrantydate' => $dateFr->format(strtotime($warrantydate['p.warrantydate'])),
    'price' => $price['p.price'],
    'purchaseticket' => $purchaseticket['p.purchaseticket'],
    'maintenance' => $maintenance['p.maintenance'],
    'usermanual' => $usermanual['p.usermanual'],
    'edit' => '<a href="edit.php?edit=1&id='.$id['p.id'].'">Modifier</a>',
    'delete' => '<a href="delete.php?id='.$id['p.id'].'">Supprimer</a>',
);

