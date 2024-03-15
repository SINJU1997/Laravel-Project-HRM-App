<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration | HRM App </title> 
    <link rel="stylesheet" href="css/register.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/hr-logo.png">
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="/registration" method="post">
        @csrf
      <div class="input-box">
        <input type="text" placeholder="Enter your name" required name="name">
      </div>
      <div class="input-box">
        <input type="email" placeholder="Enter your email" required name="email">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Your password" required name="password">
      </div>
      <!-- <div class="input-box">
        <input type="password" placeholder="Confirm password" required>
      </div> -->
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="/">Login now</a></h3>
      </div>
    </form>
  </div>
  <img src="../assets/images/reg.png" alt="" width="500" height="600">
</body>
</html>