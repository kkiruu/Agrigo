<?php
require 'head.php';
require 'menu.php';
?>
<!-- Carousel wrapper -->
<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <img src="proimages/a1.jpg" class="d-block w-100" alt="..." height="750px"  />
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color: black;"></h1>
        <h3 style="color: black;"></h3><br>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="proimages/a8.jpg" class="d-block w-100" alt="..." height="750px"  />
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color: black;">Vegetable Market</h1>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="proimages/a3.jpg" class="d-block w-100" alt="..." height="820px"  />
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color: black;"></h1>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->

<?php require 'footer.php';?>
