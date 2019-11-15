<?
include "db.php";
$path = 'image/';
$tmp_path = 'tmp/';
$types = array('image/gif', 'image/png', 'image/jpeg');
$size = 1024000;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
 if (!in_array($_FILES['picture']['type'], $types))
  die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');

 if ($_FILES['picture']['size'] > $size)
  die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');

 if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
  echo 'Что-то пошло не так';

$ty = "UPDATE user SET ava = '{$_FILES['picture']['name']}' WHERE phone = '{$_COOKIE['phone']}' ";
$gh = $dbh->query($ty);
}
$id_user = $_COOKIE['id'];
$date = date('F j, g:i a');
$textarea = 'обнавил фото профиля';
$df = "INSERT INTO news(text_area,dates,city,photos) VALUES('$textarea','$date','$id_user','{$_FILES['picture']['name']}') ";
$dbh->query($df);


header("Location:wall.php");

?>
