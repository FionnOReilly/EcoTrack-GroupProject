<template>
  <div class="grid-container">
    <form action="#" method="post" id="loginForm" class="loginForm">
      <fieldset id="fieldset1">
        <div id="fieldset2">
          <legend>Login</legend>

          <p>
            <label for="username" class="loginLabel">Username: </label>
            <input type="text" id="username" name="username" v-model="username" required />
            <span id="usernameError" class="error"></span>
          </p>

          <p>
            <label for="password" class="loginLabel">Password: </label>
            <input type="password" id="password" name="password" v-model="password" required />
            <span id="passwordError" class="error"></span>
          </p>

          <div class="buttonContainer">
            <input type="submit" value="Login" class="contactButton" id="loginButton" @click.prevent="handleLogin" />
            <input type="reset" value="Reset" class="contactButton" id="resetButton" />
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</template>

<script>
export default {
  name: 'LoginPage',
  data() {
    return {
      username: '',
      password: '',
    };
  },
  methods: {
    handleLogin() {
      //  login logic
      console.log('Attempting login with', this.username, this.password);
      //login validation  here
    },
  },
};
</script>

<style scoped>

.grid-container {
  display: grid;
  grid-template-columns: 100%;
}

.contactButton:hover {
  border-radius: 20px;
}

#loginButton:hover {
  background-color: #adffe7;
}

#resetButton:hover {
  background-color: #fab3a1;
}

form {
  width: 100%;
  padding: 20px;
}

fieldset {
  width: 100%;
  background-color: #d4e7e9;
  font-size: 20px;
}

#fieldset1 {
  border: 5px solid #2d2828c6;
  border-radius: 20px;
}

label {
  padding: 10px;
  display: inline-block;
  font-weight: bold;
  text-align: right;
}

.error {
  color: #c21d1d;
  padding-left: 10px;
}

input[type="text"],
input[type="password"] {
  display: inline-block;
  margin-left: 2em;
  margin-bottom: 2px;
  width: 30%;
  padding: 5px;
}

.buttonContainer {
  text-align: center;
  margin: 10px;
}

#loginButton,
#resetButton {
  padding: 5px;
  margin: 5px;
  width: 7em;
  font-weight: bold;
  color: black;
}

#resetButton {
  background-color: #f79181;
}

#loginButton {
  background-color: #3ed2aa;
}

.contactButton {
  border: 4px solid #2d2828c6;
  border-radius: 10px;
}

/* Mobile view */
@media only screen and (max-width: 767px) {
  .grid-container {
    grid-template-columns: repeat(5, 20%);
    grid-row-gap: 2em;
  }

  form {
    margin: 0;
    grid-column: 1 / 6;
  }

  .error {
    display: block;
    margin-left: 39%;
  }

  label {
    width: 50%;
    margin-left: 60px;
    text-align: left;
    display: block;
  }

  input[type="text"],
  input[type="password"] {
    display: block;
    width: 70%;
    margin-left: 70px;
  }
}

/* Desktop query */
@media only screen and (min-width: 992px) {
  .grid-container {
    grid-template-columns: repeat(16, 6.25%);
    grid-row-gap: 2em;
  }

  form {
    grid-column: 5 / 13;
  }

  label {
    width: 40%;
  }
}
</style>
