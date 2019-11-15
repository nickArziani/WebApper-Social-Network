<?
session_start();
include "db.php";
$id = $_POST['id_news'];
$ui = $dbh->prepare("SELECT * FROM likes WHERE id_news = $id AND id_user = {$_COOKIE['id']} ");
$ui->execute();
 if($ui->fetchColumn() != 0){
$i = "DELETE FROM likes WHERE id_news = $id AND id_user = {$_COOKIE['id']} ";
$dbh->query($i);
}else{
$io = "INSERT INTO likes(id_user, id_news) VALUES('{$_COOKIE['id']}', '$id') ";
$dbh->query($io);
}

$r = "SELECT count(id_like) AS likel FROM likes WHERE id_news = $id ";
$h = $dbh->query($r);
$a = array();
while($rp = $h->fetch(PDO::FETCH_ASSOC)){
        $a[] = $rp['likel'];
        $oi = "UPDATE news SET likes = {$rp['likel']} WHERE id = $id ";
        $dbh->query($oi);
    }

echo json_encode($a);
