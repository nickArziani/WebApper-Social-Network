<?
session_start();
include "db.php";
include "header.php";
$res = "SELECT U.text_area,U.likes,U.dates,U.id,U.city, U.photos, P.ava, P.ids, P.name FROM news U, user P WHERE U.id = {$_GET['id']} ORDER BY U.id DESC LIMIT 1";
$hj = $dbh->query($res);
$articles = array();
while($row = $hj->fetch(PDO::FETCH_ASSOC)){
        $articles[] = $row;
    }
?>
<script src="jq.js"></script>
<script src="like.js"></script>
<div id="margin" style="margin-bottom: 114px;">
<section id="articles">
    <? foreach ($articles as $article){ ?>
<title><? echo $article['name'] ?></title>
         <div class="row"><img src='image/<? echo $article['ava'] ?>' class='header_wall'>
         <span class='text'><? echo $article['name'] ?></span>
         <br>
         <span class='data'><? echo $article['dates'] ?></span>
         <span class="text_area"><? echo $article['text_area'] ?></span>
         <?
         $mystring = $article['photos'];
         $findme   = '.mp4';
         $pos = strpos($mystring, $findme);
         if ($pos === false) {
             echo "<img src='image/{$article['photos']}'>";
        } else {
               echo " <video controls src='image/{$article['photos']}'></video>";
}
         ?>
         </div>
<? }  ?>  
<form method="POST" id="like">
    <input type="hidden" name="id" value="<? echo $article['id'] ?>">
    <button id="click" type="submit"><span id="change" style="margin: 0 0 0 23px;"><? echo $article['likes'] ?></span><img id="src" src="image/like.png"><span style="font-size: 17px;float:left">მომწონს</span></button>
</form>

<script>
//     $(document).ready(function(){
//         $('#comment_send').click(function(event){
//             event.preventDefault();
//         var comment = $('#comment').serialize();
//         $.ajax({
//             url: 'comment.php',
//             type: 'POST',
//             dataType: "JSON",
//             data: comment,
//             success: function(){
//                 alert('Ok');
//             }
//         });
//         });
//     });
 </script>
<!--<div>-->
<!--    <form method="POST" id="comment">-->
<!--        <input type="hidden" name="id" value="<? echo $article['id'] ?>">-->
<!--        <input type="text" name="text" placeholder="Enter your comment">-->
<!--        <input type="submit" id="comment_send" value="Sent">-->
<!--    </form>    -->
<!--</div>-->



</section>
</div>
<link rel="stylesheet" type="text/css" href="css_wall.css">
<style>
img[src="image/like.png"],img[src="image/like_gif.gif"]{
float: left;
margin: 0 6;
max-width: 34px;
max-height: 31px;
}
</style>












