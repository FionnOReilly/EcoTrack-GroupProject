<template>
    <footer class="custom-footer py-4">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4">
        <p><router-link to="/">Home</router-link></p>
       <p><router-link to="Infromation" >Information</router-link></p>
       <div class="buttonContainer">
        <button  id="primaryButton"><router-link to="/AdminLogin" class="login-link">Admin Portal</router-link></button>
      </div>
         
      </div>
      <div class="col-md-4">
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="https://github.com/daniellipper/Group2-Website.git"><i class="fab fa-github"></i></a>
        </div>
      </div>
      <div class="col-md-4">
        <p>Contact at: EcoTarcker@gmail.com</p>
        <p>Phone: +00 123 1234</p>
      </div>

  
    </div>
  </div>
</footer>
</template>

<style scoped>



.text-start {
    text-align: left; 
  }
  
  .logo {
    width: 150px; 
    height: auto; 
  }
  
  .custom-header {
    background-color: #42A5A2;
  }
  
  .navbar-brand {
    font-size: 2rem;
    font-weight: bold;
  }
  
  .navbar-nav .nav-link {
    color: black; 
  }
  
  .navbar-nav .nav-link:hover {
    color: white;
  }
  
  header{
    margin-bottom: 15px;
  }
  
  .custom-footer {
    background-color: #42A5A2; 
    border-top: 1px solid #ddd;
  }
  
  .custom-footer p,
  .custom-footer a {
    color: black;
    text-decoration: none;
  }
  
  .custom-footer a:hover {
    color: white; 
  }
  
  
  /* Responsive Styles */
  @media (max-width: 1200px) {
    .navbar-brand {
      font-size: 1.5rem; 
    }
  
    .custom-btn {
      padding: 8px 16px; 
      font-size: 0.9rem; 
    }
  }
  
  /* Mobile Responsiveness */
  @media (max-width: 768px) {
    .navbar-brand {
      font-size: 1.2rem; 
    }
  
    .portfolio-img {
      max-width: 100%; 
    }
  
  
    .custom-footer p {
      font-size: 0.9rem; 
    }
  }
  
  @media (max-width: 576px) {
    .navbar-nav .nav-link {
      font-size: 0.8rem; 
    }
  
    .custom-btn {
      width: 100%; 
    }
  }
  </style>