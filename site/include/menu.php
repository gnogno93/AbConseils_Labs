
<?php 
require_once(realpath('./').'/include/head.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="menu">
  <img src="rcs/icon/bot.png" width="30" height="30" class="d-inline-block align-top" alt="">
    <a class="navbar-brand" href="home">Botcpp</a>
  </img>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="download">Download<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="documentation">Documentation<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="faq">FAQ<span class="sr-only"></span></a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="sign-in" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Member area
        </a>   
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="sign-in">Sign In</a>
          <a class="dropdown-item" href="sign-up">Sign Up</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Account</a>
        </div>
      </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0" action="#" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
  </div>
</nav>


<script>
jQuery(document).ready(function(){
    jQuery('#menu').fadeOut(0);
    jQuery('#menu').fadeIn(1000);
});
</script>

