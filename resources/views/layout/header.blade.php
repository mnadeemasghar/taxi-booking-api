<div class="navbar">

   <div class="navbar-inner">

       <ul class="nav">

           <li class="nav-link"><a href="/">Home</a></li>

           <li class="nav-link"><a href="{{ route('BookingRequest.index') }}">Booking Requests</a></li>
           
           <li class="nav-link"><a href="{{ route('BookingRequest.create') }}">Create Booking Request</a></li>

           <li class="nav-link"><a href="{{ route('BookingRequest.search') }}">Search Booking Requests</a></li>

           @auth
           <li class="nav-link"><a href="{{ route('logout') }}">Logout</a></li>
           @else
           <li class="nav-link"><a href="{{ route('login') }}">Login</a></li>
           <li class="nav-link"><a href="{{ route('register') }}">Register</a></li>
           @endauth

       </ul>

   </div>

</div>