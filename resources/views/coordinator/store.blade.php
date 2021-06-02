<?php
   use App\Http\Controllers\ProductController;

  $controller=new ProductController;
  $products= $controller->products();

  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <link rel="Stylesheet" href="../css/dashboard.css" />
    @include('includes.alertscript')
    <title>Store</title>
  </head>
  <body>
  @include('includes.alert')
    <div class="row mx-auto">
      <div class="col-lg-3 col-xl-2 p-0">
        <header>
          <div id="mySidenav" class="bg-white sidenav">
            <a
              href="javascript:void(0)"
              class="p-0 closebtn"
              onclick="closeNav()"
              >&times;</a
            >
            <div class="text-center py-4 logo-container">
              <img src="../images/foodbank 1.png" alt="logo" />
            </div>
            <ul class="mt-5 pl-0 link-container">
              <li>
                <a href="./dashboard"
                  ><svg
                    width="18"
                    height="14"
                    viewBox="0 0 18 14"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M16.6667 3.33333H5.33333C5.24493 3.33333 5.16014 3.29821 5.09763 3.2357C5.03512 3.17319 5 3.08841 5 3V1.33333C5 1.24493 5.03512 1.16014 5.09763 1.09763C5.16014 1.03512 5.24493 1 5.33333 1H16.6667C16.7551 1 16.8399 1.03512 16.9024 1.09763C16.9649 1.16014 17 1.24493 17 1.33333V3C17 3.08841 16.9649 3.17319 16.9024 3.2357C16.8399 3.29821 16.7551 3.33333 16.6667 3.33333Z"
                      stroke=""
                      stroke-width="0.666667"
                      stroke-miterlimit="10"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M16.6667 8.33333H5.33333C5.24493 8.33333 5.16014 8.29821 5.09763 8.2357C5.03512 8.17319 5 8.08841 5 8V6.33333C5 6.24493 5.03512 6.16014 5.09763 6.09763C5.16014 6.03512 5.24493 6 5.33333 6H16.6667C16.7551 6 16.8399 6.03512 16.9024 6.09763C16.9649 6.16014 17 6.24493 17 6.33333V8C17 8.08841 16.9649 8.17319 16.9024 8.2357C16.8399 8.29821 16.7551 8.33333 16.6667 8.33333Z"
                      stroke=""
                      stroke-width="0.666667"
                      stroke-miterlimit="10"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M16.6667 13.3333H5.33333C5.24493 13.3333 5.16014 13.2982 5.09763 13.2357C5.03512 13.1732 5 13.0884 5 13V11.3333C5 11.2449 5.03512 11.1601 5.09763 11.0976C5.16014 11.0351 5.24493 11 5.33333 11H16.6667C16.7551 11 16.8399 11.0351 16.9024 11.0976C16.9649 11.1601 17 11.2449 17 11.3333V13C17 13.0884 16.9649 13.1732 16.9024 13.2357C16.8399 13.2982 16.7551 13.3333 16.6667 13.3333Z"
                      stroke=""
                      stroke-width="0.666667"
                      stroke-miterlimit="10"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M3 3.33333H1.33333C1.24493 3.33333 1.16014 3.29821 1.09763 3.2357C1.03512 3.17319 1 3.08841 1 3V1.33333C1 1.24493 1.03512 1.16014 1.09763 1.09763C1.16014 1.03512 1.24493 1 1.33333 1H3C3.08841 1 3.17319 1.03512 3.2357 1.09763C3.29821 1.16014 3.33333 1.24493 3.33333 1.33333V3C3.33333 3.08841 3.29821 3.17319 3.2357 3.2357C3.17319 3.29821 3.08841 3.33333 3 3.33333Z"
                      stroke=""
                      stroke-width="0.666667"
                      stroke-miterlimit="10"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M3 8.33333H1.33333C1.24493 8.33333 1.16014 8.29821 1.09763 8.2357C1.03512 8.17319 1 8.08841 1 8V6.33333C1 6.24493 1.03512 6.16014 1.09763 6.09763C1.16014 6.03512 1.24493 6 1.33333 6H3C3.08841 6 3.17319 6.03512 3.2357 6.09763C3.29821 6.16014 3.33333 6.24493 3.33333 6.33333V8C3.33333 8.08841 3.29821 8.17319 3.2357 8.2357C3.17319 8.29821 3.08841 8.33333 3 8.33333Z"
                      stroke=""
                      stroke-width="0.666667"
                      stroke-miterlimit="10"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M3 13.3333H1.33333C1.24493 13.3333 1.16014 13.2982 1.09763 13.2357C1.03512 13.1732 1 13.0884 1 13V11.3333C1 11.2449 1.03512 11.1601 1.09763 11.0976C1.16014 11.0351 1.24493 11 1.33333 11H3C3.08841 11 3.17319 11.0351 3.2357 11.0976C3.29821 11.1601 3.33333 11.2449 3.33333 11.3333V13C3.33333 13.0884 3.29821 13.1732 3.2357 13.2357C3.17319 13.2982 3.08841 13.3333 3 13.3333Z"
                      stroke=""
                      stroke-width="0.666667"
                      stroke-miterlimit="10"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path d="M5 1H17V3.33333H5V1Z" fill="" />
                    <path d="M5 6H17V8.33333H5V6Z" fill="" />
                    <path d="M5 11H17V13.3333H5V11Z" fill="" />
                    <path d="M1 11H3.33333V13.3333H1V11Z" fill="" />
                    <path d="M1 6H3.33333V8.33333H1V6Z" fill="" />
                    <path d="M1 1H3.33333V3.33333H1V1Z" fill="" />
                  </svg>

                  <span>Overview</span>
                </a>
              </li>
              <li>
                <a href="./store" class="active"
                  ><svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M19 2H5C3.346 2 2 3.346 2 5V7.831C2 8.884 2.382 9.841 3 10.577V20C3 20.2652 3.10536 20.5196 3.29289 20.7071C3.48043 20.8946 3.73478 21 4 21H12C12.2652 21 12.5196 20.8946 12.7071 20.7071C12.8946 20.5196 13 20.2652 13 20V15H17V20C17 20.2652 17.1054 20.5196 17.2929 20.7071C17.4804 20.8946 17.7348 21 18 21H20C20.2652 21 20.5196 20.8946 20.7071 20.7071C20.8946 20.5196 21 20.2652 21 20V10.576C21.618 9.841 22 8.884 22 7.83V5C22 3.346 20.654 2 19 2ZM20 5V7.831C20 8.971 19.151 9.943 18.109 9.998L18 10C16.897 10 16 9.103 16 8V4H19C19.552 4 20 4.449 20 5ZM10 8V4H14V8C14 9.103 13.103 10 12 10C10.897 10 10 9.103 10 8ZM4 5C4 4.449 4.448 4 5 4H8V8C8 9.103 7.103 10 6 10L5.891 9.997C4.849 9.943 4 8.971 4 7.831V5ZM10 16H6V13H10V16Z"
                      fill=""
                    />
                  </svg>

                  <span>Store</span>
                </a>
              </li>
              <li>
                <a href="./orders"
                  ><svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M22 24H2V20H22V24ZM13.06 5.19L16.81 8.94L7.75 18H4V14.25L13.06 5.19ZM17.88 7.87L14.13 4.12L15.96 2.29C16.0525 2.1973 16.1624 2.12375 16.2834 2.07357C16.4043 2.02339 16.534 1.99756 16.665 1.99756C16.796 1.99756 16.9257 2.02339 17.0466 2.07357C17.1676 2.12375 17.2775 2.1973 17.37 2.29L19.71 4.63C20.1 5.02 20.1 5.65 19.71 6.04L17.88 7.87Z"
                      fill=""
                    />
                  </svg>

                  <span>Orders</span>
                </a>
              </li>
              <li>
                <a href="./transactions"
                  ><svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0)">
                      <path
                        d="M8 12L3 17L8 22M2 7H20H2ZM16 2L21 7L16 12V2ZM22 17H4H22Z"
                        stroke=""
                        stroke-width="2"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0">
                        <rect width="24" height="24" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>

                  <span>Transactions</span>
                </a>
              </li>
              <li class="text-center mt-4 d-lg-none">
                <button
                  href="#"
                  type="button"
                  data-toggle="modal"
                  data-target="#logoutModal"
                  class="btn btn-danger"
                >
                  <span>Logout</span>
                </button>
              </li>
            </ul>
          </div>

          <!-- LOGOUT -->
          <div
            class="modal fade"
            id="logoutModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="logoutModalLabel"
            aria-hidden="true"
          >
            <div
              class="modal-dialog modal-dialog-centered modal-md logout-modal"
              role="document"
            >
              <div class="modal-content">
                <div class="modal-header border-0">
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body py-5">
                  <div class="container text-center mx-auto">
                    <p class="font-weight-bold text-center">
                      Are you sure you want to leave?
                    </p>
                    <div class="buttons justify-content-center">
                      <button class="btn px-5 create-campaign-btn logout">
                        LOGOUT
                      </button>
                      <button
                        class="btn px-5 create-campaign-btn cancel ml-3"
                        data-dismiss="modal"
                        aria-label="Close"
                      >
                        CANCEL
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
      </div>
      <div class="col-12 col-lg-9 col-xl-10 px-0">
        <main class="ml-lg-2">
          <section
            class="d-flex justify-content-between align-items-center p-4 main-header"
          >
            <!-- Use any element to open the sidenav -->
            <span onclick="openNav()" class="d-lg-none open-nav"
              ><span
                class="iconify"
                data-icon="ic:round-menu"
                data-inline="false"
              ></span
            ></span>
            <div class="d-none d-lg-block page-title">
              <h3>Store</h3>
            </div>
            <!-- <div class="d-lg-none">
              <img src="../images/foodbank 2.png" alt="logo" />
            </div> -->
            <form action="" class="search-form">
              <input
                type="search"
                name="search"
                id="search"
                class="form-control search"
                placeholder="Search for food items"
              />
            </form>
            <div
              class="d-flex justify-content-center align-items-center header-links"
            >
              <a href="./cart"
                ><span
                  class="iconify"
                  data-icon="clarity:shopping-cart-solid"
                  data-inline="false"
                  data-width="22px"
                  data-height="22px"
                ></span
              ></a>
              <a href="./notification"
                ><span
                  class="iconify"
                  data-icon="clarity:notification-solid"
                  data-inline="false"
                  data-width="22px"
                  data-height="22px"
                ></span
              ></a>
              <button
                href="#"
                type="button"
                data-toggle="modal"
                data-target="#logoutModal"
                class="btn btn-danger font-weight-bolder d-none d-lg-block"
              >
                Log out
              </button>
            </div>
          </section>
          <section class="mt-2 main-body mb-5">
            <div class="row mx-auto">
              <div class="col-12 col-lg-7 px-0">
                <div class="card transaction-history mt-0 available-items">
                  <h6 class="transaction-title p-0">Available Items</h6>
                  <hr />
                  <div class="row mt-3">
                    
                  @foreach ($products as $product)
                    <div class="col-6 col-md-4 mt-4">
                      <div class="card item-card">
                        <div
                          class="card-img-top"
                        >
                          <img
                            src="{{$product->image_url}}"
                            alt="item-image"
                          />
                        </div>
                        <div class="card-body">
                          <p class="text-truncate item-title">{{$product->name}}
                          </p>
                          <small class="item-price">N {{$product->amount}} </small>
                          <div class="item-button">
                          <a href="../add-to-cart/{{$product->id}}"><button>Add to cart</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-md-5 d-none d-lg-block">
                <form action="./checkout" method="get">
                @csrf
                  <div class="card notifications-card shopping-cart">
                    <div class="shopping-cart-header">
                      <h6>Shopping Cart</h6>
                      <div class="clear">
                        <small>Clear</small>
                        <span
                          class="iconify"
                          data-icon="bx:bxs-trash"
                          data-inline="false"
                          data-width="20px"
                          data-height="20px"
                        ></span>
                      </div>
                    </div>
                    <hr />
                    <ul class="notifications-list cart-list">
                    @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <input type="number" name="product_id[]" value="{{$details['quantity']}}" hidden>
                      <li id="item-container" class="row mx-auto">
                        <div class="col-2">
                          <div class="cart-img">
                            <img
                              src="{{$details['image_url']}}"
                              alt="item-cart-image"
                            />
                          </div>
                        </div>
                        <div class="col-7">
                          <div class="cart-detail">
                            <p class="text-truncate">
                            {{$details['name']}}
                            </p>
                            <small>{{$details['amount']}}</small>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="cart-functions">
                          <a href="../remove-from-cart/{{$details['id']}}"><div class="minus" id="minus">-</div></a>
                            <input
                              type="tel"
                              class="input"
                              name="quantity[]"
                              readonly
                              value="{{$details['quantity']}}"
                              id="itemNumber"
                            />
                            <a href="../add-to-cart/{{$details['id']}}"><div class="plus" id="plus">+</div></a>
                          </div>
                        </div>
                      </li>
                      @endforeach
                      @endif
                    </ul>
                    <div class="text-center see-more proceed">
                      <div class="total">
                        <p class="total-text">TOTAL:</p>
                        <h6 id="total-price" class="total-price"></h6>
                      </div>
                      <div class="proceed-btn">
                        <button>Proceed</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>

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
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="../js/header.js"></script>
    <script src="../js/cart-functions.js"></script>
  </body>
</html>
