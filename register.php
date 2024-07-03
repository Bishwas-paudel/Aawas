<?php 
include("navbar.php");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<div class="container">
  <h3 style="font-weight: bold; text-align: center;">Enter Your Details</h3><hr><br>
  <form method="POST" action="register-operation.php" enctype="multipart/form-data" onsubmit="return Validate()">
    <div class="form-group">
      <label for="full_name">Full Name:</label>
      <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" required>
      <small id="nameError" class="form-text text-danger"></small>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
      <small id="emailError" class="form-text text-danger"></small>
    </div>
    <div class="form-group">
      <label for="password1">Password:</label>
      <input type="password" class="form-control" id="password1" placeholder="Enter Password" name="password" required>
      <small id="passwordError" class="form-text text-danger"></small>
    </div>
    <div class="form-group">
      <label for="password2">Confirm Password:</label>
      <input type="password" class="form-control" id="password2" placeholder="Enter Password Again" required>
      <small id="confirmPasswordError" class="form-text text-danger"></small>
    </div>
    <div class="form-group">
      <input type="checkbox" onclick="togglePassword()"> Show Password
    </div>
    <div class="form-group">
      <label for="phone_no">Phone No.:</label>
      <input type="text" class="form-control" id="phone_no" placeholder="Enter Phone No." name="phone_no" required>
      <small id="phoneError" class="form-text text-danger"></small>
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" required>
    </div>
    <div class="form-group">
      <label for="role">Role:</label>
      <select class="form-control" name="role" required>
        <option value="Owner">Owner</option>
        <option value="Rental">Rental</option>
      </select>    
    </div>
    <div class="form-group">
      <label for="id_type">Type of ID:</label>
      <select class="form-control" name="id_type" required>
        <option>Citizenship</option>
        <option>Driving Licence</option>
      </select>
    </div>
    <div class="form-group">
      <label for="card_photo">Upload your Selected Card:</label>
      <input type="file" class="form-control" placeholder="Enter password" name="id_photo" accept="image/*" onchange="preview_image(event)" required>
    </div>
    <div class="form-group">
      <label>Your selected File:</label><br>
      <img src="" id="output_image" height="200px">
    </div>
    <hr>
    <center><button id="submit" name="owner_register" class="btn btn-primary btn-block " style="background-color:#b16bea">Register</button></center><br>
    <div class="form-group text-right">
      <label class="">Already have account<a href="login.php" style="color:#b16bea">Log In</a>?</label><br>
    </div><br><br>
  </form>
</div>

<script type='text/javascript'>
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script type="text/javascript">
    function Validate() {
        var name = document.getElementById("full_name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password1").value;
        var confirmPassword = document.getElementById("password2").value;
        var phone = document.getElementById("phone_no").value;
        var nameRegex = /^[a-zA-Z\s]+$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{7,}$/;
        var phoneRegex = /^\d{10}$/;
        var valid = true;
        // validate name
        if (!nameRegex.test(name)) {
            document.getElementById("nameError").innerText = "Name must contain only alphabets.";
            document.getElementById("full_name").style.borderColor = "red";
            valid = false;
        } else {
            document.getElementById("nameError").innerText = "";
            document.getElementById("full_name").style.borderColor = "";
        }
        // validate email
        if (!emailRegex.test(email)) {
            document.getElementById("emailError").innerText = "Invalid email format.";
            document.getElementById("email").style.borderColor = "red";
            valid = false;
        } else {
            document.getElementById("emailError").innerText = "";
            document.getElementById("email").style.borderColor = "";
        }
        // Validate Password
        if (!passwordRegex.test(password)) {
            document.getElementById("passwordError").innerText = "Password must be at least 7 characters long, contain one capital letter, one number, and one special character.";
            document.getElementById("password1").style.borderColor = "red";
            valid = false;
        } else {
      
            document.getElementById("passwordError").innerText = "";
            document.getElementById("password1").style.borderColor = "";
        }
        // Confirm password
        if (password !== confirmPassword) {
            document.getElementById("confirmPasswordError").innerText = "Passwords do not match.";
            document.getElementById("password2").style.borderColor = "red";
            valid = false;
        } else {
          
            document.getElementById("confirmPasswordError").innerText = "";
            document.getElementById("password2").style.borderColor = "";
        }
        // validate Phone No.
        if (!phoneRegex.test(phone)) {
            document.getElementById("phoneError").innerText = "Phone number must be equal to 10 digits.";
            document.getElementById("phone_no").style.borderColor = "red";
            valid = false;
        } else {
            document.getElementById("phoneError").innerText = "";
            document.getElementById("phone_no").style.borderColor = "";
        }
        return valid;
    }
    function togglePassword() {
        var password1 = document.getElementById("password1");
        var password2 = document.getElementById("password2");
        if (password1.type === "password") {
            password1.type = "text";
            password2.type = "text";
        } else {
            password1.type = "password";
            password2.type = "password";
        }
    }
</script>
