<?
session_start();
include "db.php";
$search = $_POST['search'];
$ui = $dbh->prepare("SELECT ava,ids,name FROM user WHERE name LIKE '%$search%'  ");
$ui->execute();
while($roww = $ui->fetch(PDO::FETCH_ASSOC)){
    if($search != ''){
        echo "<a href='profile.php?id={$roww['ids']}'><div class='con_s_bar'><img class='img_search' src='image/{$roww['ava']}'><img src='image/ver.png'>"."<div class='text_s'>".$roww['name']."</div>"."</div></a>"."<br>";
    }else{
    	echo "<div class='con_s_bar'><img class='img_search' src='image/{$roww['ava']}'><img src='image/ver.png'>"."<div class='text_s'>".$roww['name']."</div>"."</div>"."<br>";
    }

}
