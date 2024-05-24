<?php session_start(); ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AgriBuzz</a>
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
          <a class="nav-link active" aria-current="page" href="fwelcome.php"><span class="glyphicon glyphicon-home"></span> Home</a>

        </li>

        <?php
        if($_SESSION['f_id']==null){
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

        

  
          <?php
        }  
       else{
        ?>
         
        
        <li class="nav-item">
          <a class="nav-link" href="addvegetable.php">Add Vegetable</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="faddcategory.php">Add Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="location.php">Add location</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">Orders</a>
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