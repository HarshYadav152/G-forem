<?php include "./partials/_dbconnect.php"; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forumsapplication/">G-discuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forumsapplication/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forumsapplication/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle bg-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <?php
            $sql = 'SELECT * FROM `categories`';
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<li><a class="dropdown-item" href="forumslist.php?cid=' . $row["category_id"] . '">' . $row["category_name"] . '</a></li>';
            }
            ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forumsapplication/contact.php">Contact</a>
        </li>
      </ul>
      <div>
        <form class="d-flex gap-2" action="search.php?search_query=hello" role="search">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
          <?php
            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
              echo '<a  class="btn btn-outline-warning" href="partials/_handleLogout.php">Logout</a>';
              
            }
            else{
              echo '
              <div class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></div>
              <div class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</div>
              ';
            }
          ?>
        </form>
      </div>
    </div>
  </div>
</nav>
<?php

include "partials/modals/_login.php";
include "partials/modals/_signup.php";

// for signup

if (isset($_GET['signupSuccess']) && $_GET['signupSuccess'] == "true") {
  echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Account created successfully, You can login now.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
}
// else{
//   if(strpos($_GET['error'],"Username")){
//     $error_msg = "Try with another username.";
//     echo $error_msg;
//   }
//  }
else if (isset($_GET['error'])) {
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>' . $_GET['error'] . '</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
';
}

// for login 

if(isset($_GET['loginStatus']) && $_GET['loginStatus']==true){
  if(isset($_GET['status'])){
    echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>'.$_GET['status'].'</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
  }
}else{
  if(isset($_GET['status'])){
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>' . $_GET['status'] . '</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
  }
}

// for logout

if(isset($_GET['logout']) && $_GET['logout']==true){
  echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Logout Successfully, Return back.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
}
?>