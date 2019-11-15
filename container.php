<form class="" action="" method="POST">
  <input type="text" name="search" value="">
  <input type="submit" name="submit" value="Проверить данные">
</form>
<style media="screen">
  .container{
    width: 100%;
    height: 400;
    display: -webkit-inline-box;
  }
</style>
<?php
include "simple_html_dom.php";
$serch = $_POST['search'];
$string = file_get_html('http://wcf.mscgva.ch/publicasmx/Tracking.asmx/GetRSSTrackingByContainerNumber?ContainerNumber='.$serch);
if(isset($_POST['submit']))
foreach($string->find('description') as $element)
       echo "<div class='container'>".str_replace('Container Tracking Information','',html_entity_decode(strip_tags($element)))."<div>";
?>
