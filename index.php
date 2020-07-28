<?php
    require_once('database.php');

$dateFr = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);

$sql = 'SELECT p.id, p.name, p.reference, c.type, p.purchasedate, p.warrantydate, p.price, p.purchaseticket, p.maintenance, p.usermanual, s.id, s.name, s.address FROM products AS p INNER JOIN sellers AS s INNER JOIN categories AS c ORDER BY p.purchasedate DESC';
$sth = $pdo->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row){
    echo '<td>'.$row['p.id'].'</td>';
    echo '<td>'.$row['p.name'].'</td>';
    echo '<td>'.$row['p.reference'].'</td>';
    echo '<td>'.$row['c.type'].'</td>';
    echo '<td>'.$dateFr->format(strtotime($row['p.purchasedate'])).'</td>';
    echo '<td>'.$dateFr->format(strtotime($row['p.warrantydate'])).'</td>';
    echo '<td>'.$row['p.price'].'</td>';
    echo '<td>'.$row['p.purchaseticket'].'</td>';
    echo '<td>'.$row['p.maintenance'].'</td>';
    echo '<td>'.$row['p.usermanual'].'</td>';
    echo '<td>'.$row['s.name'].'</td>';
    echo '<td>'.$row['s.address'].'</td>';
    echo '<td><a href="edit.php?edit=1&id='.$row['p.id'].'">Modifier</a></td>';
    echo '<td><a href="delete.php?id='.$row['p.id'].'">Supprimer</a></td>';

}
