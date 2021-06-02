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
    @include('includes.alertscript')
  </head>
  <body class="auth-body">
  @include('includes.alert')
    <section class="card login-card">
      <div class="header">
        <img src="../images/foodbank 1.png" alt="foodbank_logo" />
        <h4 class="loginhead">Verify your account</h4>
      </div>
      <p class="text-center w-75 mx-auto verify-account-instruction">
        Please Verify your account by entering the authentication code sent to
        <strong>*** *** ***</strong>
      </p>
      <form action="/verify-otp" method="post">
      @csrf
        <div class="input-code">
          <input type="tel" id="numberCode" minlength="4" maxlength="4" name="token" required/>
        </div>
        <p class="text-muted text-center mt-3">
          <small>*It may take up to a minute to recieve your code</small>
        </p>
        <div class="auth-btn-wrapper">
          <input type="submit" name="otp" id="btn-login" value="Verify" />
        </div>
        <div class="loginfootnote">
          <p>
            Haven't recieved it?
            <button class="border-0 bg-transparent loginfootlink">
              Resend
            </button>
          </p>
        </div>
      </form>
    </section>
    <!-- <div class="big-wrapper mx-auto">
      <div class="wrapper">
        <div class="header">
          <img src="../images/foodbank 1.png" alt="foodbank_logo" />
          <h4 class="loginhead">Verify your account</h4>
        </div>
        <p class="text-center">
          Please confirm your account by entering the authentication code sent
          to *** *** 7890
        </p>
        <div class="input-code">
          <input
            type="number"
            id="numberCode"
            name="numberCode"
            placeholder="1234"
          />
        </div>
        <p class="text-muted">
          <small>*It may take up to a minute to recieve your code</small>
        </p>

        <input type="submit" id="btn-login" value="Register" />
        <div class="loginfootnote">
          <p>
            Haven't recieved it?
            <a class="loginfootlink" href="login.html"> Resend</a>
          </p>
        </div>
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
