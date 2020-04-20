<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../home_page.php"><img src="./images/chartwell.png" alt="fail" width="80" height="80"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../home_page.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://chartwell.edu.rs/">Chartwell Website</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Choose Year
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../year_pages/year7.php?year=7">Year 7</a>
          <a class="dropdown-item" href="../year_pages/year8.php?year=8">Year 8</a>
          <a class="dropdown-item" href="../year_pages/year9.php?year=9">Year 9</a>
          <a class="dropdown-item" href="../year_pages/year10.php?year=10">Year 10</a>
          <a class="dropdown-item" href="../year_pages/year11.php?year=11">Year 11</a>
          <a class="dropdown-item" href="../year_pages/year12.php?year=12">Year 12</a>
          <a class="dropdown-item" href="../year_pages/year13.php?year=13">Year 13</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Additional Materials</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav mr-sm-2">
        <?php 
        
        if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'):
        
        ?>
        <li class="nav-item">
            <a class="nav-link" href="../register_view.php">Register User</a>
        </li>
        <?php 
        endif;
        ?>
        <li class="nav-item">
            <a class="nav-link" href="../includes/logout.php">Sign Out</a>
        </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>