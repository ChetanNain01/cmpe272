<?php include('header.php') ?>
<?php
require_once 'php/db.php';
session_start();
$domains = array('Pullo', 'Pullo', 'Pullo', 'Pullo');
$query1 = "SELECT * FROM activities where domain='$domains[0]' order by id desc limit 5";
$result1 = $mysqli->query($query1);

$query2 = "SELECT * FROM activities where domain='$domains[1]' order by id desc limit 5";
$result2 = $mysqli->query($query2);

$query3 = "SELECT * FROM activities where domain='$domains[2]' order by id desc limit 5";
$result3 = $mysqli->query($query3);

$query4 = "SELECT * FROM activities where domain='$domains[3]' order by id desc limit 5";
$result4 = $mysqli->query($query4);
?>

<center>
  <h2 style="color: #777">Recent Activities</h2>
</center>

<h4 class="px-3"> Top 5 recent activities in <?php echo $domains[0] ?></h4>
<div class="panel-body m-3" style="background-color: white">
  <?php $i = 1;
  while ($row = $result1->fetch_row()) { ?>
    <div class='d-sm-flex justify-content-between border-sm-bottom'>
      <p><?php echo $i ?></p>
      <p><?php echo $row[2] ?></p>
      <p><?php echo $row[3] ?></p>
      <p><a href='<?php echo $row[1] ?>'><?php echo $row[1] ?></a></p>
    </div>
  <?php $i = $i + 1;
  } ?>
</div>


<h4 class="px-3"> Top 5 recent activities in <?php echo $domains[1] ?></h4>
<div class="panel-body m-3" style="background-color: white">
  <?php $i = 1;
  while ($row = $result2->fetch_row()) { ?>
    <div class='d-sm-flex justify-content-between border-sm-bottom'>
      <p><?php echo $i ?></p>
      <p><?php echo $row[2] ?></p>
      <p><?php echo $row[3] ?></p>
      <p><a href='<?php echo $row[1] ?>'><?php echo $row[1] ?></a></p>
    </div>
  <?php $i = $i + 1;
  } ?>
</div>


<h4 class="px-3"> Top 5 recent activities in <?php echo $domains[2] ?></h4>
<div class="panel-body m-3" style="background-color: white">
  <?php $i = 1;
  while ($row = $result3->fetch_row()) { ?>
    <div class='d-sm-flex justify-content-between border-sm-bottom'>
      <p><?php echo $i ?></p>
      <p><?php echo $row[2] ?></p>
      <p><?php echo $row[3] ?></p>
      <p><a href='<?php echo $row[1] ?>'><?php echo $row[1] ?></a></p>
    </div>
  <?php $i = $i + 1;
  } ?>
</div>


<h4 class="px-3"> Top 5 recent activities in <?php echo $domains[3] ?></h4>
<div class="panel-body m-3" style="background-color: white">
  <?php $i = 1;
  while ($row = $result4->fetch_row()) { ?>
    <div class='d-sm-flex justify-content-between border-sm-bottom'>
      <p><?php echo $i ?></p>
      <p><?php echo $row[2] ?></p>
      <p><?php echo $row[3] ?></p>
      <p><a href='<?php echo $row[1] ?>'><?php echo $row[1] ?></a></p>
    </div>
  <?php $i = $i + 1;
  } ?>
</div>

<script>
  $('.panel-collapse').on('show.bs.collapse', function() {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function() {
    $(this).siblings('.panel-heading').removeClass('active');
  });
</script>
</body>

</html>