<html>
  <body>
<?php include "dbconfigure.php";
include "nav1.php";
include "header.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<div class="perellex-two mt_80 ptb_100">
      <div class="col-md-20">
        <div class="client owl-carousel text-center">
       <?php
       $sql="select * from feedback ";
		$rs = my_select($sql);
		while($row = mysqli_fetch_array($rs))
		{
        ?>
        <br><br>
        <div class="item client-detail">
            <div class="client-title mt_30"><strong><?php echo $row[1];?></strong></div>
            <div class="client-designation mb_10"><?php echo $row[4];?></div>
            <p><i class="fa fa-quote-left" aria-hidden="true"></i><?php echo $row[5];?></p>
          </div>
          <?php
        }
?>
      </body>
      <?php include "footer1.php";?>
</html>