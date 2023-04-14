<!-- header -->
<header id="header" class="">
  <div class="hero d-flex justify-content-center align-items-center ">
    <div class="hero_card d-flex align-items-center justify-content-center">
      <h3 >
        {{-- welcome msgs --}}
        @auth('restaurant')
            {{ Auth::user()->name }}
        @endauth
        @auth('web')
            {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
        @endauth
      </h3>
    </div>
  </div>
</header>
<!-- navbar -->
<nav id="navbar" class="myNavbar sticky-top">
  <div class="cont d-flex position-relative">
    <div class="d-flex align-items-center">
      <h3 class="logo "><span class="text-warning">Food</span><span class="span2">D</span>elivery</h3>
    </div>
    <div class="nav_links d-flex align-items-center ms-auto">
      <ul class="d-flex mb-0 me-md-5">
        <li><a href="#">Home</a></li>
        {{-- if isset restaurant --}}
          <li><a href="#items_section">Items</a></li>
        {{-- endif --}}
        <li><a href="#orders_section">Orders</a></li>
        <li><a href="#">Contact</a></li>
        @if (Auth::user()->type == 'admin')
          <li><a href="/admin">Admin Dashboard</a></li>
        @endif
        @if (Auth::guard('web')->check())        
          <li>
            <i class='bx bx-cart fs-2' id="cartIcon"></i>
            <span id="qtyInCart">
              {{ $cartQty ?? null }}
            </span>
            <!-- shopping cart -->
            <div id="cart" class="p-2 rounded-3 hidden1 bg-blur">
              <h3 class="text-center my-3 text-warning text-uppercase">Shopping Cart<i class='bx bxs-cart'></i></h3>
              <table class="mx-auto">
                <thead>
                  <th></th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </thead>
                <tbody>
                  @if(session('cartItems'))
                  @php($grandTotal = 0)
                    @foreach(session('cartItems') as $id => $value)
                    @php($grandTotal += $value['price'] *  $value['quantity'])
                      <tr>
                        <td>
                          <img src="/storage/items/{{$value['image']}}" alt="">
                        </td>
                        <td>
                          {{ $value['name'] }}
                        </td>
                        <td>
                          {{ $value['price'] }}
                        </td>
                        <td>
                          {{ $value['quantity'] }}
                        </td>
                        <td>
                          {{ $value['price'] *  $value['quantity']}}
                        </td>
                      </tr>
                    @endforeach
                </tbody>
                @else
                  <tr>
                    <td colspan="5">Empty Cart</td>
                  </tr>
                @endif
                <tfoot>
                    <tr>
                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan=""></td>
                      <td colspan="">Grand Total: </td>
                      <td id="grand_total">{{$grandTotal ?? null}}</td>
                    </tr>
                </tfoot>           
              </table><br>
              <div class="flex-row justify-content-center">
                <form action="" method="post">
                  <input class="btn btn-outline-warning btn-sm" type="submit" value="Clear Cart" name="clear-cart">
                </form>
                <form action="{{ route('create.order') }}" method="post">
                  @csrf
                  <input type="text" name="restaurant_id" value="{{ $restaurant->id ?? null }}" hidden>
                  <input class="btn btn-outline-success btn-sm" type="submit" value="Order" name="order">
                </form>
              </div>
            </div>
          </li>
        @endif
      </ul>
    </div>
    <div class="logout-box d-flex align-items-center">
      <form  action="@auth('web') {{route('user.logout')}} @endauth @auth('restaurant') {{route('restaurant.logout')}} @endauth" method="POST">
        @csrf
        <input class="btn btn-warning" type="submit" value="Logout" name="logout">
      </form>
    </div>
  </div>
</nav>

<?php

?>