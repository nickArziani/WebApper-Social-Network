<?
include "db.php";
$ava = array();
$res = "SELECT * FROM news ORDER BY `id` DESC ";
$hj = $dbh->query($res);
while($row = $hj->fetch(PDO::FETCH_ASSOC)){
        $hjk = "SELECT * FROM user WHERE  id = '{$row['city']}' ";
        $jkp = $dbh->query($hjk);
          while($avas = $jkp->fetch(PDO::FETCH_ASSOC)){
              $startFrom = $avas['ava'];
        $ava[] = $avas;
    }
}

echo json_encode($ava);