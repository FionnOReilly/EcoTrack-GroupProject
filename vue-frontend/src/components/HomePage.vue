
<template>

      <section class ="home-section">
        <div class = "hero-container">
          <div class="container1">
            <div class="textbox">
              <h1>Our Goal</h1>
              <p>
                At Eco Tracking, our mission is to empower individuals and businesses to reduce their environmental footprint. We believe that meaningful change starts with awareness, and by tracking and understanding your impact, you can take actionable steps towards a greener future.

                Through innovative tools and real-time data, we aim to simplify sustainability, making it easy for everyone to contribute to a healthier planet. Whether you’re measuring your carbon emissions or discovering eco-friendly alternatives, we're here to guide you on your journey to a more sustainable lifestyle. Together, we can make a lasting difference.</p>
            </div>
            <router-link to="/Registration" >
              <button class="button">Register Here</button>
            </router-link>

          
          </div>
        </div>
      </section>
  </template>
  
  <style scoped>

  /* Reset default margins and paddings */
  html, body {
    margin: 0;
    padding: 0;
    height: 100%;
  }


  .home-section {
    margin: 0;
    padding: 0; /* Ensure no padding on home-section */
    height: 100vh; /* Full height of the viewport */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .hero-container {
    height: 100%; /* Full height inside home-section */
    width: 100%; /* Full width */
    background-image: url('../assets/images/HomePageHero.png');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Adding a drop shadow effect */
    margin: 0; /* Ensure no margin */
    padding: 0; /* Ensure no padding */
  }

  .container1 {
    text-align: center;
  }

  .textbox {
    background-color: rgba(255, 255, 255, 0.75); /* White background with 75% opacity */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    width: 450px; /* Set the desired width */
    max-width: 90%; /* Ensure it doesn't exceed the screen width on smaller devices */
    margin: auto; /* Center the textbox */
  }



  .button {
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #42A5A2;
    color: white;
    cursor: pointer;
    font-size: 16px;
  }

  .button:hover {
    background-color: #80CED6;
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
    .navbar-nav .nav-link-active {
      font-size: 0.8rem;
    }

    .custom-btn {
      width: 100%;
    }
  }


  </style>
<script setup>
</script>