<?php include('header.php') ?>
<?php
require_once 'php/db.php';
session_start();
$domains = array('Pullo', 'Fitness', 'Pullo', 'Pullo');
$query1 = "SELECT * FROM domain where name='$domains[0]' order by visitCount desc limit 5";
$result1 = $mysqli->query($query1);

$query2 = "SELECT * FROM domain where name='$domains[1]' order by visitCount desc limit 5";
$result2 = $mysqli->query($query2);

$query3 = "SELECT * FROM domain where name='$domains[2]' order by visitCount desc limit 5";
$result3 = $mysqli->query($query3);

$query4 = "SELECT * FROM domain where name='$domains[3]' order by visitCount desc limit 5";
$result4 = $mysqli->query($query4);

$globalQuery = "SELECT * FROM domain order by visitCount desc limit 5";
$gloablResult = $mysqli->query($globalQuery);
?>

<center>
  <h2 style="color: #777; margin-bottom: 2rem; margin-top: 2rem;">Most Popular</h2>
</center>


<div class="wrapper center-block">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading active" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Top 5 most popular items from Market Place
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body d-sm-flex">
          <?php while ($row = $gloablResult->fetch_row()) { ?>
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo $row[4] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"><?php echo $row[3] ?></p>
                <a href="<?php echo $row[6] ?>" class="btn btn-primary">View Product</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="wrapper center-block">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading active" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Top 5 most popular items from <?php echo $domains[0] ?>
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body d-sm-flex">
          <?php while ($row = $result1->fetch_row()) { ?>
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo $row[4] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"><?php echo $row[3] ?></p>
                <a href="<?php echo $row[6] ?>" class="btn btn-primary">View Product</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="wrapper center-block">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading active" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Top 5 most popular items from <?php echo $domains[1] ?>
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body d-sm-flex">
          <?php while ($row = $result2->fetch_row()) { ?>
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo $row[4] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"><?php echo $row[3] ?></p>
                <a href="<?php echo $row[6] ?>" class="btn btn-primary">View Product</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="wrapper center-block">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading active" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            Top 5 most popular items from <?php echo $domains[2] ?>
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body d-sm-flex">
          <?php while ($row = $result3->fetch_row()) { ?>
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo $row[4] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"><?php echo $row[3] ?></p>
                <a href="<?php echo $row[6] ?>" class="btn btn-primary">View Product</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="wrapper center-block">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading active" role="tab" id="headingFour">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            Top 5 most popular items from <?php echo $domains[3] ?>
          </a>
        </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body d-sm-flex">
          <?php while ($row = $result4->fetch_row()) { ?>
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo $row[4] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"><?php echo $row[3] ?></p>
                <a href="<?php echo $row[6] ?>" class="btn btn-primary">View Product</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
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