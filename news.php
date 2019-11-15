<?
session_start();
include "db.php";
$id_user = $_COOKIE['id'];

$path = 'image/';
$tmp_path = 'tmp/';
$types = array('image/gif', 'image/png', 'image/jpeg');
$size = 1000*34*46;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES['picture_new']['name'] != '')
{

 if ($_FILES['picture_new']['size'] > $size)
  die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');

 if (!@copy($_FILES['picture_new']['tmp_name'], $path . $_FILES['picture_new']['name']))
  echo 'Что-то пошло не так';
  
$textarea = $_POST['textarea'];
$date = date('F j, g:i a');
$df = "INSERT INTO news(text_area,dates,city,photos) VALUES('$textarea','$date','$id_user','{$_FILES['picture_new']['name']}') ";
$dbh->query($df);
}else{
	$textarea = $_POST['textarea'];
$date = date('F j, g:i a');
	$df = "INSERT INTO news(text_area,dates,city) VALUES('$textarea','$date','$id_user') ";
$dbh->query($df);
}

header("Location:wall.php");
?>