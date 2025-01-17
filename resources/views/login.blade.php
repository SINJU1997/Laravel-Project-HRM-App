<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | HRM App</title> 
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/hr-logo.png">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        @if(session('error'))
          <div style="color:red; text-align:center; margin-top:10px;">
            {{ session('error') }}
          </div>
        @endif
        <form action="/login" method="get">
            @csrf
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email" required name="email">
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" required name="password">
          </div>
          <!-- <div class="pass"><a href="#">Forgot password?</a></div> -->
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Don't have an account? <a href="/register">Signup now</a></div>
        </form>
      </div>
    </div>
  </body>
</html>