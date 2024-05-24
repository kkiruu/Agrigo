<html>
<head>
  <title></title>
  <?php require 'head.php';?>
</head>
<body>
  <?php require 'fmenu.php';?>

  <!-- Carousel wrapper -->
  <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    </div>

    <div class="carousel-inner">
      <!-- Single item -->
      <div class="carousel-item active">
        <img src="uploads/f2.jpg" class="d-block w-100" alt="..." height="750px" />
        <div class="carousel-caption d-none d-md-block">
          <!-- Optional caption for the slide -->
        </div>
      </div>
    </div>
  </div>

  <?php require 'footer.php';?>
</body>
</html>
