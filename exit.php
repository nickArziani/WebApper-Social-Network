<?
session_start();

setcookie('phone', "");
		setcookie('name', "");
		setcookie('id', "");
        setcookie('ava',"" );
session_destroy();
header('Location: index.php');
?>