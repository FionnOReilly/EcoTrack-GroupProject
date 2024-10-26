<template>
<div class="wrapper">
  <!-- Registration Form -->
  <div class="Registercontainer">
    <form class="register-form">
      <h2>Register</h2>

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

      <div class="buttons">
        <button type="submit" class="submit-btn">Submit</button>
        <button type="button" class="cancel-btn">Cancel</button>
      </div>
    </form>
  </div>
</div>
</template>