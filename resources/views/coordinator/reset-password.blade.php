<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password Reset</title>
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
        <h4 class="loginhead">Password Reset Form</h4>
      </div>
      <form action="">
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
            class="info"
            placeholder="Enter new password"
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
            class="info"
            placeholder="Confirm new password"
          />
        </div>

        <div class="auth-btn-wrapper">
          <input type="submit" id="btn-login" value="Reset" />
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
