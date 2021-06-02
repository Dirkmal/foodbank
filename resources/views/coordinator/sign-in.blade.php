<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
        <h4 class="loginhead">Coordinator's Login</h4>
      </div>
      <form action="/signin" method="post">
      @csrf
        <div class="input-box">
          <svg
            class="envelop"
            width="20"
            height="20"
            viewBox="0 0 24 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M24 5.5296V15.3C24.0001 16.2962 23.6189 17.2546 22.9348 17.9787C22.2507 18.7028 21.3154 19.1376 20.3208 19.194L20.1 19.2H3.9C2.90384 19.2001 1.94541 18.8189 1.22132 18.1348C0.49724 17.4507 0.0623984 16.5154 0.00600014 15.5208L0 15.3V5.5296L11.5824 11.5968C11.7113 11.6643 11.8545 11.6995 12 11.6995C12.1455 11.6995 12.2887 11.6643 12.4176 11.5968L24 5.5296ZM3.9 2.83261e-08H20.1C21.0667 -0.000116418 21.999 0.358795 22.716 1.00712C23.4331 1.65545 23.8838 2.54698 23.9808 3.5088L12 9.7848L0.0192 3.5088C0.112228 2.58517 0.53166 1.72502 1.2021 1.08296C1.87254 0.44089 2.75002 0.0590244 3.6768 0.00600017L3.9 2.83261e-08H20.1H3.9Z"
              fill="#C2C2C2"
            />
          </svg>
          <input
            type="email"
            id="email"
            name="email"
            class="info"
            placeholder="Enter email address"
          />
        </div>
        <div class="input-box">
          <svg
            class="lock"
            width="20"
            height="22"
            viewBox="0 0 24 28"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M20 9.33333H22.6667C23.0203 9.33333 23.3594 9.47381 23.6095 9.72386C23.8595 9.97391 24 10.313 24 10.6667V26.6667C24 27.0203 23.8595 27.3594 23.6095 27.6095C23.3594 27.8595 23.0203 28 22.6667 28H1.33333C0.979711 28 0.640573 27.8595 0.390524 27.6095C0.140476 27.3594 0 27.0203 0 26.6667V10.6667C0 10.313 0.140476 9.97391 0.390524 9.72386C0.640573 9.47381 0.979711 9.33333 1.33333 9.33333H4V8C4 5.87827 4.84285 3.84344 6.34315 2.34315C7.84344 0.842855 9.87827 0 12 0C14.1217 0 16.1566 0.842855 17.6569 2.34315C19.1571 3.84344 20 5.87827 20 8V9.33333ZM17.3333 9.33333V8C17.3333 6.58551 16.7714 5.22896 15.7712 4.22876C14.771 3.22857 13.4145 2.66667 12 2.66667C10.5855 2.66667 9.22896 3.22857 8.22876 4.22876C7.22857 5.22896 6.66667 6.58551 6.66667 8V9.33333H17.3333ZM10.6667 17.3333V20H13.3333V17.3333H10.6667ZM5.33333 17.3333V20H8V17.3333H5.33333ZM16 17.3333V20H18.6667V17.3333H16Z"
              fill="#C2C2C2"
            />
          </svg>
          <input
            type="password"
            id="password"
            name="password"
            class="info"
            placeholder="Enter your password"
          />
        </div>
        <div class="input-group logincheckgroup">
          <div class="input-check">
            <input
              type="checkbox"
              id="rememberMe"
              name="rememberMe value="
              rememberMe
            />
            <label for="rememberMe">Remember Me</label>
          </div>
          <a class="fgt-pwd" href="/coordinator/forgot-password">
            Forgot Password?</a
          >
        </div>
        <div class="auth-btn-wrapper">
          <input type="submit" id="btn-login" value="Login" />
        </div>
        <div class="loginfootnote">
          <p>
            New customer?
            <a class="loginfootlink" href="/coordinator/register"> Register</a>
          </p>
        </div>
      </form>
    </section>
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
