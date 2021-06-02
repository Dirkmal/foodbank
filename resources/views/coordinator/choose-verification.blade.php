<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <link rel="Stylesheet" href="../css/style.css" />
  </head>
  <body class="auth-body">
    <section class="card login-card">
      <div class="header">
        <img src="../images/foodbank 1.png" alt="foodbank_logo" />
        <h4 class="loginhead">Choose your verification method</h4>
      </div>
      <form action="">
        <label class="input-radio" for="radio1">
          <input
            type="radio"
            id="radio1"
            name="verification_option"
            value="email"
          />
          <label id="radio1" for="radio1">Via Email</label>
        </label>
        <label for="radio2" class="input-radio">
          <input
            type="radio"
            id="radio2"
            name="verification_option"
            value="phone_number"
            selected
          />
          <label id="radio2" for="radio2">Via Phone Number</label>
        </label>
        <div class="auth-btn-wrapper">
          <input type="submit" id="btn-login" value="Submit" />
        </div>
      </form>
    </section>
    <!-- <div class="big-wrapper mx-auto">
        <div class="wrapper">
             <div class="header">
                 <img src="../images/foodbank 1.png" alt="foodbank_logo">
                  <h4 class="loginhead">Choose your verification method</h4>
             </div>
             <div class="input-radio">
                <input type="radio" id="radio" name="email" value="email">
                <label id="radio1" for="email">Via Email</label>
             </div>
             <div class="input-radio">
                <input type="radio" id="radio" name="phoneNumber" value="phoneNumber">
                <label id="radio2" for="phoneNumber">Via Phone Number</label>
             </div>

             <input type="submit" id="btn-verify" value="Continue"> 
             
</div>
</div> -->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
