<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css">
    <!-- Box Icons -site ma use hune icons haru ko lagi -->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Contact Us - Room Rent Project</title>
  <style>
  
  /* Global styles */
* {
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
}

/* Header styles */
header {
  background-color:whitesmoke;
  color: white;
  height: 100px;
}

header h1 {
  font-size: 3rem;
  margin: 0;
}

/* Main styles */
main {
  max-width: 800px;
  margin: 0 auto;
  padding: 40px;
}

section {
  margin-bottom: 40px;
}

h2 {
  color: #4CAF50;
  font-size: 2rem;
  margin-bottom: 20px;
}

p {
  font-size: 1.2rem;
  line-height: 1.5;
  color: #555;
}

form {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 20px;
}

label {
  font-size: 1.2rem;
  font-weight: bold;
  color: #555;
}

input,
textarea {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 1.2rem;
}

button {
  background-color:dodgerblue;
  color: white;
  padding: 10px;
  border-radius: 5px;
  border: none;
  font-size: 1.2rem;
  cursor: pointer;
}

button:hover {
  background-color:blue;
}


  </style>
  </head>
  <body>
  <header>
   
      <!-- Navbar section -->
        <div class="nav container">
            <!-- Logo ko lagi -->
            <a href="index.php" class="logo"><i class='bx bx-home'></i>AAWAS</a>
            <!-- Menu Icon -->
            <input type="checkbox" name="" id="menu">
            <label for="menu" <i class='bx bx-menu' id="menu-icon"></i></label>
            <!-- Navbar ko name haru -->
            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus .php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="#">Properties</a></li>
            </ul>
            <!-- Login button  -->
            <a href="login_options.php" class="btn">Log In</a>
        </div>
   
    </header>
    <main>
      <section>
        <h2>Get in touch</h2>
        <p>Have a question or comment? Please fill out the form below and we will get back to you as soon as possible.</p>
        <form>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
          <label for="subject">Subject:</label>
          <input type="text" id="subject" name="subject" required>
          <label for="message">Message:</label>
          <textarea id="message" name="message" required></textarea>
          <button type="submit">Submit</button>
        </form>
      </section>
      <section>
        <h2 style="color:dodgerblue">Our Location</h2>
        <p>You can find us at the following address:</p>
        <p>LA Grandee international college</p>
        <p>Simalchaur -08 Pokhara, Gandaki ,Nepal</p>
      </section>
    </main>
    <footer>
      <p>&copy; 2024 Aawas. All rights reserved.</p>
    </footer>
  </body>
</html>
