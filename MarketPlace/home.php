<?php include('header.php') ?>
<?php session_start(); ?>
<div class="grid m-md-5" id="renderMarketPlace">
</div>
<script src="js/config.js"></script>
<script>
  function navigationHandler(navigationUrl) {
    const emailId = sessionStorage.getItem('emailId') ? sessionStorage.getItem('emailId') : "<?php echo $_SESSION['emailId'] ?>";
    document.location = `${navigationUrl}?emailId=${emailId}`;
  }

  function renderMarketPlace() {
    const elem = document.getElementById('renderMarketPlace');
    let str = ``;
    getConfig().webApps.map(app => {
      str += `<div class="portfolio-wrap" onClick="navigationHandler('${app.url}')">
              <img src="${app.thumbnail}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>${app.name}</h4>
                <div class="portfolio-links">
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>`
    });

    elem.innerHTML = str;
  }
</script>
<script src="js/config.js" type="text/javascript"></script>
</body>

</html>