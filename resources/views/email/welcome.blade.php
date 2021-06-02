<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        @import url('https://fonts.googleapis.com/css?family=Catamaran:400,800');
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      body {
          font-family: 'Catamaran', sans-serif;
        max-width: 800px;
        margin: 0 auto;
        padding: 2%;
        background-color: #d8dbdb;
      }
      .container {
        background-color: #f6faff;
      }
      img {
        max-width: 100%;
      }
      header {
        width: 98%;
      }
      h1{
        color:#08af2e;
      }
      .logo, .logom {
        max-width: 220px;
        margin: 2% 0 2% 5%;
        float: left;
      }
      .callout {
        margin: 3% 3% 2% 0;
        text-align: right;
      }
      .social {
        margin-top: 8%;
      }
      .social li {
        display: inline;
        margin: 0 0.5em;
      }
      .social img {
        max-width: 30px;
      }
      ul {
        list-style-type: none;
      }
      .horizontal {
        clear: both;
        height: 2px;
        background-color: #e3e9e9;
        margin: 4% auto;
        width: 96%;
      }
      section p, .app {
        text-align: justify;
        margin: 2em 0;
        color: black;
      }
      .app a{ 
        color: #08af2e;
      }
      .support {
        display: inline;
      }
      section, .app {
        margin: 3em 0;
        width:96%;
        padding:0 4%;
      }
      footer {
        background-color: #363636;
        margin-top: 2em;
        padding: 2em;
      }
      footer a, p{
          color:#d8dbdb;
          text-decoration: none;
      }
      .links {
        float: left;
      }
      .address {
        float: right;
      }
      .clear {
        clear: both;
      }
  
      @media (max-width: 767.98px) {
        .links {
          float: none;
          text-align: center;
          margin-bottom: 1.5em;
        }
        .address {
          float: none;
          text-align: center;
        }
        .logom, .logo {
          max-width: 100px;
          float: none;
        }
        .logom{
            
          margin: 0 auto;
        }
        .social {
          float: none;
        }
        .social img{
          max-width: 20px;
        }
        .callout{
          float:none;
          text-align:center;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="logo">
          <img
            src="https://res.cloudinary.com/ademolamadelewi/image/upload/c_scale,h_10,q_64/v1581358061/farmers/FoodBank.ng_Logo_Text_on_the_Side__gv5jx2.svg"
          />
        </div>
      </header>
      <div class="horizontal"></div>
      <section>
        <h1>Dear, firstname </h1>
        <p>
           

Welcome to foodbank.ng. <br><br>You getting this mail means your registration is successful.  
You just made the right choice. We are happy to have you on board. 
<br><br>
Feel free to explore the range of services we offer on our website. If you have any question or need further explanations on any of our services feel free to reach to us on any of the mediums provided.
        
      </section>
      <div class="horizontal"></div>
      <p class="app">
        Save and invest smarter with our app today on
        <a href="#" target="_blank"> Android</a> and
        <a href="#" target="_blank">iOS</a>
      </p>
      <footer>
        <div class="logom">
          <img
            src="https://res.cloudinary.com/ademolamadelewi/image/upload/c_scale,h_10,q_64/v1581358061/farmers/FoodBank.ng_Logo_Text_on_the_Side__gv5jx2.svg"
          />
        </div>
        <div class="callout">
          <ul class="social">
            <li>
              <a href="#" target="_blank"
                ><img
                  src="https://res.cloudinary.com/ademolamadelewi/image/upload/v1578573697/FoodBank/svg/Path_39_gshv7z.svg"
              /></a>
            </li>
            <li>
              <a href="#" target="_blank"
                ><img
                  src="https://res.cloudinary.com/ademolamadelewi/image/upload/v1578573697/FoodBank/svg/Path_40_netsn3.svg"
              /></a>
            </li>
            <li>
              <a href="https://api.whatsapp.com/send?phone=+2347032318978&text=&source=&data=" target="_blank"
                ><img
                  src="https://res.cloudinary.com/ademolamadelewi/image/upload/q_10/v1581872032/whatsapp_rk2hzc.svg"
              /></a>
            </li>
          </ul>
        </div>
        <div class="horizontal"></div>
        <div class="support">
          <ul class="links">
            <li><a href="#" target="_blank">Customer Support</a></li>
            <li><a href="#" target="_blank">Terms</a></li>
            <li><a href="#" target="_blank">Conditions</a></li>
          </ul>
          <div class="address">
            <p>
              1 Continental way, <br />
              Off CMD RoadIkosi-Ketu, Lagos
            </p>
          </div>
        </div>
        <div class="clear"></div>
      </footer>
    </div>
  </body>
</html>
