<?
session_start();
include "db.php";
// if(!empty($_COOKIE['phone'])){
// 	header('Location: wall.php');
// }
if(isset($_POST['submit_reg'])){
	$phone_reg = $_POST['email_reg'];
	$password_reg = $_POST['password_reg'];
	$name_reg = $_POST['name_reg'];
	$rt = "INSERT INTO user(name,phone,password,ava) VALUES('$name_reg','$phone_reg', '$password_reg','add-user-to-social-network.png')";
	$dbh->query($rt);
}else if(isset($_POST['submit'])){
	$phone = $_POST['email'];
    $password = $_POST['password'];
	$ty = "SELECT * FROM user WHERE phone = '$phone' AND password = '$password' ";
	$stmt = $dbh->prepare($ty);
	$stmt->execute(array('phone'  => '$phone'));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() == 1){
		setcookie('phone', $userRow['phone'], time()+60*4567*60*24*7*4 );
		setcookie('name', $userRow['name'], time()+60*4567*60*24*7*4 );
		setcookie('id', $userRow['ids'], time()+60*4567*60*24*7*4 );
        setcookie('ava', $userRow['ava'], time()+60*4567*60*24*7*4 );
		header("Location: wall.php");
	}else{
		echo "<div class='error'>თხოვთ შეამოწმეთ თქვენი მონაცემები.</div>";
	} ;
}
?>
<link rel="icon" href="image/fav.png">
<script src="jq.js"></script>
<script src="js.js"></script>
<title>Webupper</title>
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300" type="text/css" />

<div class="wrapper">
	<div class="container">
		<h1>მოგესალმებით</h1>

		<form class="form" method="POST">
			<input type="text" name="email" placeholder="Username" required="" autofocus="" autocomplete="off">
			<input type="password" name="password" placeholder="Password" required="">
			<button type="submit" name="submit" id="login-button">შესვლა</button>
		</form>

	<h1>რეგისტრაცია</h1>
	<form class="form" method="POST">
		    <input type="text" name="name_reg" placeholder="სახელი გვარი" required="" autocomplete="off">
			<input type="email" name="email_reg" placeholder="ელ ფოსტა" required="" autocomplete="off">
			<input type="password" name="password_reg" placeholder="პაროლი" required="">
			<button type="submit" name="submit_reg" id="login-button">რეგისტრაცია</button>
		</form>
	</div>
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>