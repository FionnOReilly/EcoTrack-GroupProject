<template>
  <div class="wrapper">
    <!-- Registration Form -->
    <div class="Registercontainer">
      <form @submit.prevent="submitForm" id="registerUserForm" class="register-form">
        <legend>Register</legend>

        <div class="form-group">
          <label for="first-name">First Name:</label>
          <input type="text" id="first-name" name="first-name" v-model="userData.firstName" >
        </div>
        <span id="error1"></span>


        <div class="form-group">
          <label for="last-name">Last Name:</label>
          <input type="text" id="last-name" name="last-name" v-model="userData.lastName" >
        </div>
        <span id="error2"></span>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" v-model="userData.email" >
        </div>
        <span id="error3"></span>


        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" v-model="userData.password">
        </div>
        <span id="error4"></span>

        <div class="form-group">
          <label for="confirm-password">Confirm Password:</label>
          <input type="password" id="confirm-password" name="confirm-password" v-model="userData.confirmPassword">
        </div>
        <span id="error5"></span>


        <div class="buttonContainer">
          <input type="submit" value="Submit" class="contactButton" id="submitButton">
          <input type="reset" value="Reset" class="contactButton" id="resetButton" @click="resetForm">
        </div>

        <router-link to="/LoginPage" class="login-link">Already have an account? Log in here</router-link>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'RegisterPage',
  data() {
    return {
      userData: {
        firstName: '',
        lastName: '',
        email: '',
        password: '',
      },
    };
  },
  methods: {
    validateEmail(email) {
      const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/;
      return emailPattern.test(email);
    },

    async submitForm() {
      document.getElementById("error1").innerHTML = "";
      document.getElementById("error2").innerHTML = "";
      document.getElementById("error3").innerHTML = "";
      document.getElementById("error4").innerHTML = "";
      document.getElementById("error5").innerHTML = "";

      if (!this.userData.firstName || this.userData.firstName.length > 20) {
        document.getElementById("error1").innerHTML = "*First Name required";
        return;
      }

      if (!this.userData.lastName || this.userData.lastName.length > 20) {
        document.getElementById("error2").innerHTML = "*Last Name required";
        return;
      }

      if (!this.userData.email || !this.validateEmail(this.userData.email)) {
        document.getElementById("error3").innerHTML = "*Please enter a valid email";
        return;
      }

      if (!this.userData.password || this.userData.password.length < 6) {
        document.getElementById("error4").innerHTML = "*Password must be at least 6 characters";
        return;
      }

      if (this.userData.password !== this.userData.confirmPassword) {
        document.getElementById("error5").innerHTML = "*Passwords do not match";
        return;
      }
      const userData = {
        first_name: this.userData.firstName,
        last_name: this.userData.lastName,
        email: this.userData.email,
        password: this.userData.password
      };

      try {
        await axios.post('http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/registerUser', userData);
        this.$router.push('/');
        this.resetForm();
      } catch (error) {
        document.getElementById("error3").innerHTML = "*Email already registered";
      }
    },

    resetForm() {
      // Reset form fields
      this.userData = {
        firstName: '',
        lastName: '',
        email: '',
        password: '',
        confirmPassword: ''
      };
    }
  }
};
</script>

<style scoped>

span {
  color: red;
  display: block;
  margin-top: 5px;
}

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