<template>
<div class="wrapper">
  <!-- Registration Form -->
  <div class="Registercontainer">
    <form class="register-form">
      <legend>Register </legend>

      <div class="form-group">
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="first-name" required>
      </div>

      <div class="form-group">
        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="last-name" required>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
      </div>

      <div class="buttonContainer">
          <input type="submit" value="Submit" class="contactButton" id="submitButton">
          <input type="reset" value="Reset" class="contactButton" id="resetButton">
        </div>
    </form>
  </div>
</div>

<FooterComponent></FooterComponent>
</template>


<script>
import FooterComponent from './FooterComponent.vue';

export default {
  name: 'RegistrationPage',
  components: {FooterComponent,
  }
};

</script>

<style scoped>
.wrapper {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100vh;
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
  
  /* Form Styles */
  .Registercontainer {
    width: 90%;
    max-width: 600px;
    margin: 40px auto;
    background-color: #d0e8e7; /* Light teal background */
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Box effect for form only */
    text-align: center;
  }
  
  .register-form h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 1.5em;
    font-weight: bold;
  }
  
  .Registercontainer {
    width: 90%;
    max-width: 600px;
    margin: 40px auto;
    background-color: #d0e8e7; 
    padding: 0 30px 30px; 
    border-radius: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
    text-align: center;
    overflow: hidden; 
}

legend {
    margin: 0; 
    padding: 15px 0; 
    border-radius: 20px 20px 0 0; 
    background-color: #71BAC1; 
    font-size: 1.5em;
    font-weight: bold;
    width: calc(100% + 60px); 
    position: relative;
    left: -30px; 
    box-sizing: border-box; 
    text-align: center;
}


.form-group {
    display: flex;
    align-items: center; 
    margin-bottom: 15px; 
    padding-top: 15px; 
}

  
  label {
    display: block;
    margin: 20px;
    font-weight: bold;
    min-width: 150px;
    color: #333;
    text-align: left;
      
  }
  
  input[type="text"],
  input[type="email"],
  input[type="password"] {
     flex: 1; 
     padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f0f8f7; /* Light input background */
    width: calc(100% - 160px); /* Adjust width to match form group width minus label width and margin */
  
    margin-left: 10px;
  }
  
  input[type="text"]:focus,
  input[type="email"]:focus,
  input[type="password"]:focus {
    border-color: #5ba89b; /* Focus color */
  }
  
  .contactButton:hover {
  border-radius: 20px;
}
  
  .buttonContainer {
  text-align: center;
  margin: 10px;
}

 #submitButton, #resetButton {
  padding: 5px;
margin:5px;
  width: 7em;
  font-weight: bold;
  color: black;
}

#resetButton{
  background-color:#F79181;
}

#submitButton{
  background-color: #3ED2AA
}
  
  #submitButton:hover {
  background-color: #adffe7; 
}

#resetButton:hover {
  background-color: #fab3a1; 
}

.error {
  color: #c21d1d;
  padding-left: 10px;
}
  
  /* Responsive Design */
  @media (max-width: 1200px) {
    .navbar-brand {
      font-size: 1.5rem;
    }
  
    .custom-btn {
      padding: 8px 16px;
      font-size: 0.9rem;
    }
  }
  
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
  
    .Registercontainer {
      width: 100%;
      padding: 15px;
    }
  
    .navbar-nav {
      flex-direction: column;
      gap: 10px;
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