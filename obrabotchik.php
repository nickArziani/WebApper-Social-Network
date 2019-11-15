<?php
session_start();
include "db.php";

$articles = array();
$startFrom = $_POST['startFrom'];
$res = "SELECT U.text_area,U.likes,U.dates,U.id,U.city, U.photos, P.ava, P.ids, P.name FROM news U, user P WHERE U.city = P.ids ORDER BY U.id DESC LIMIT {$startFrom}, 10";
$hj = $dbh->query($res);
while ($row = $hj->fetch(PDO::FETCH_ASSOC)){
        $articles[] = $row;
}

echo json_encode($articles);