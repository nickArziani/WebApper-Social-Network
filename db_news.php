<?
include "db.php";
$title = $_POST['title'];
$desc = $_POST['desc'];
$date = $_POST['date'];
$city = $_POST['city'];
$gh = "INSERT INTO news(title,description,dates,city) VALUES('$title','$desc','$date','$city')";
$dbh->query($gh);
header("Location:wall.php");
?>