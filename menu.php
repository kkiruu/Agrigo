<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AgriGo</a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
        </li>

        <?php
        if(!isset($_SESSION['u_id'])){
        ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Customer's Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="flogin.php">Farmer's Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alogin.php">Admin Login</a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="viewcart.php">View Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myorders.php">My Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="welcome.php">Vegetables</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
