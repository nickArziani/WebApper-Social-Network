<?
session_start();
include "db.php";
$id = $_POST['id'];
$text = $_POST['text'];
$jk = "INSERT INTO comment(id_user_c, id_news_c,text_c) VALUES('{$_COOKIE['id']}', '$id','$text') ";
$dbh->query($jk);
?>