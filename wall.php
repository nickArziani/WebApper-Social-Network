<?
session_start();
if($_COOKIE['ava'] == ""){
	header('Location: index.php');
}
include "db.php";
include "header.php";
$res = "SELECT U.text_area,U.likes,U.dates,U.id,U.city, U.photos, P.ava, P.ids, P.name, L.id_user, L.id_news FROM news U, user P, likes L WHERE U.city = P.ids ORDER BY U.id DESC LIMIT 1";
$hj = $dbh->query($res);
$articles = array();
while($row = $hj->fetch(PDO::FETCH_ASSOC)){
        $articles[] = $row;
    }
?>
<link rel="stylesheet" type="text/css" href="css_wall.css">
<script src="jq.js"></script>
<script src="like.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimal-ui">
<link rel="icon" href="image/fav.png">
<script src="js.js"></script>
<title>About me @ <? echo $_COOKIE['name'] ?></title>
<script src="script.js"></script>
<div class="content_wall">
    <?
    if($_COOKIE['id'] != $article['id']){ ?>
          <div class="image">
            <img src="image/cancel_.png" style="width: 32px;display: block;margin: 0 auto;border: 1px solid #fff;padding:21;border-radius: 100%;">
    <form method="POST" action="photo.php" enctype="multipart/form-data">
     <input type="file" name="picture" id="file" class="inputfile" multiple />
      <label for="file">აირჩიეთ ფოთო</label><br>
      <input type="submit" name="photo" value="დადასტურება" class="photo">
    </form>
  </div>
  <? } ?>
  <div class="news">
    <form method="POST" action="news.php" enctype="multipart/form-data">
      <textarea  id="myInput" name="textarea" placeholder="რა გვაქვს ახალი?"></textarea>
      <input type="file" name="picture_new" id="files" data-multiple-caption="{count} files selected" multiple />
      <label for="files"><img src="image/upload.png"></label>
      <button name="submit" class="but"><img src="image/send.png"></button>
    </form>
    <script type="text/javascript">
      var characters_Limit = 500;
$('#myInput').keyup(function() {
    if ($(this).val().length > characters_Limit) {
         $(this).val($(this).val().substr(0, characters_Limit));

    }
     $('#charCount').text(this.value.replace(/{.*}/g, '').length);
});
    </script>
  </div>
  <div class='rule'>
      <a href='rule.php'>Copyright 2018 <sup>©</sup></a><br>
      <a href='rule.php'>Правила пользование сайтом</a>
  </div>
  <div id="margin">
    <div style="display: inline-block;">
    <img src="tmp/event.png">
    <p class="p">Новости</p>
  </div>
      <div style="width: 973px;">
<div id="articles">
  <? foreach ($articles as $article){ ?>
    <a href="show.php?id=<? echo $article['id'] ?>">
       <div class="row">
       <div style="width: 100%;height: 50px;position: absolute;margin: -9 0 0 0;">
         <a href="profile.php?ids=<? echo $article['ids'] ?>"><img src='image/<? echo $article['ava'] ?>' class='header_wall'>
         <span class='text'><div style="float:left"><? echo $article['name'] ?></div>
					 <span class="text_area"><?
						 if($article['photos'] != ''){
							 echo $article['text_area'];
						 } ?>
						</span>
						<form class="like" method="post">
							<input type="hidden" name="id_news" value="<? echo $article['id']; ?>">
							<button type="button" class="click"><img src="image/like_en.png"></button><? $article['likes'] ?>
						</form>
				 </span>
        </a>
         <span class='data'><? echo $article['dates'] ?></span>
         <span class='like'>
          <form method="POST" class="like">
            <input type="hidden" name="id" value="<? echo $article['id'] ?>">
            <button class="click" type="submit"><span class="change" style="margin: 6px 8px 0 8px;"><? echo $article['likes'] ?></span><img id="src" src="image/like_en.png"></button>
          </form>
        </span>
<script src="like.js"></script>
</div>
       <div class="mar">
             <!-- <span class="text_area">< ?
               if(strlen($article['text_area']) >= 300 && $article['photos'] != ''){ echo "<p class='art'>".substr($article['text_area'], 0,500)."<div style='color:red;margin:10 0'>... ещё</div>"."</p>";
                }else{ echo "<p class='art'>".$article['text_area']."<p>";  }
                ? > -->
           <? $mystring = $article['photos'];
              $findme   = '.mp4';
              $pos = strpos($mystring, $findme);
                if ($pos === false && $article['photos'] != "") {
                   echo " <img src='image/{$article['photos']}'>";
                 } else if($pos != false && $article['photos'] != "") { ?>
                     <video autoplay loop preload="auto" controls src='image/<? echo $article['photos'] ?>'></video>
              <? } ?>
              </span>

        </div>
      </div>
      <div class="pointer"></div>
    </a>
<? }  ?>

</div>
</div>
<div style="float:  right;margin: 0 156 0 0;">
   <div id="res">
        <img class="img_ava" src="image/<?
    include "db.php";
   $hjhj = "SELECT * FROM user WHERE ids = '{$_COOKIE['id']}' ";
   $jkhj = $dbh->query($hjhj);
   while($iohj = $jkhj->fetch(PDO::FETCH_ASSOC)){
       echo $iohj['ava'];
   }

    ?> ">
    <div class="div_ava"><? echo $_COOKIE['name'] ?></div>
    <form method="POST" id="search">
       <input type="text" autocomplete="off" autofocus id="inp" name="search" placeholder="Serch">
   </form>
   <div class="html">
     <!-- Developer -->
<div class='con_s'>
  <?
    include "db.php";
    $ty = "SELECT * FROM user WHERE ids = '{$_COOKIE['id']}' ";
    $t = $dbh->query($ty);
    while($hjl = $t->fetch(PDO::FETCH_ASSOC)){
      if($hjl['city'] == ''){
        echo "";
      }else{
        echo "<div class='info'><img src='tmp/placeholder.png'>".$hjl['city']."</div>";
      }
       if($hjl['birth'] == ''){
        echo "";
      }else{
        echo "<div class='info'><img src='tmp/date.png'>".$hjl['birth']."</div>";
      }
      if($hjl['youtube'] == ''){
        echo "";
      }else{
        echo "<div class='info'><a href='{$hjl['youtube']}' target='_blank'>YouTube</a></div>";
      }
    }
  ?>
</div>
   </div>
   </div>
   <div class="up">
    <p>
     <img src="tmp/up.png">
     Начало
    </p>
   </div>
</div>
 <button id="more">შემდეგ</button>
 <div class="load"></div>
</div>
