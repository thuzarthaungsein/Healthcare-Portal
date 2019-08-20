<template>  
    <div class="col-md-10 offset-md-1">
       <nav class="navbar navbar-expand-lg navbar-dark main-header">
  <a class="navbar-brand" href="#"><img src="images/trust_growth.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0 col-lg-10 container-fluid form-inline">
      <input class="form-control col-lg mr-sm-3 d-flex p-2 form-control" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary" type="submit">Search</button>
    </form>
    <ul class="navbar-nav mr-auto col-lg-2">
      <li class="nav-item active btn login-register-btn col-lg-6">
        <router-link to="/" class="nav-item nav-link p-lr-0">サインイン</router-link>      
      </li>
      <li class="nav-item btn login-register-btn col-lg-6">
         <router-link to="/" class="nav-item nav-link p-lr-0">Register</router-link>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
    </ul>
    
  </div>
</nav>
  <router-view></router-view>
<div class="container-fluid footer">               
  <span>Copyright©Management Partners Corp.All Rights Reserved. </span>                
</div>
</div>
    
    
</template>

<script>
    export default {}
</script>