@extends('layout.app')

@section('content')

   <div class="card">
    <div class="card-header">{{ __("Register") }}</div>
    <div class="card-body">
      <form id="register_form" action="{{route('register.store')}}" method="post">
         @csrf

         <div class="form-group">
            <label for="full_name">Full Name <span class="text-danger">*</span></label>
            <input type="text" id="full_name" name="name" class="form-control" required>
         </div>

         <div class="form-group">
            <label for="username">Username <span class="text-danger">*</span></label>
            <input type="text" id="username" name="username" class="form-control" required>
            <span id="is_available"></span>
         </div>
         
         <div class="form-group">
            <label for="password">Password <span class="text-danger">*</span></label>
            <input type="password" id="password" name="password" class="form-control" required>
            <span id="is_available"></span>
         </div>
         
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
         </div>

      </form>
    </div>
    <div class="card-footer">
      <button form="register_form" class="btn btn-primary">Register</button>
      <a href="{{route('login')}}" class="btn btn-link">Already User?</a>
    </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <script>
      // Event listener for keyup on the username input field
      $('#username').keyup(function (event) {
         // Check if the pressed key is the Enter key (key code 13)
         // Get the username value from the input field
         const username = $('#username').val();

         // Call the AJAX function with the username
         fetchData(username);
      });

      // Function to make AJAX call
      function fetchData(username) {
         $('#is_available').html("<p class='alert alert-info'>Please wait...</p>");
         // Replace the URL with your actual API endpoint
         const apiUrl = '/api/username/check?username=' + username;

         // Make an AJAX request using jQuery
         $.ajax({
               url: apiUrl,
               method: 'GET',
               dataType: 'json',
               success: function (data) {
                  // Process the data as needed
                  console.log(data);
                  $('#is_available').html("<p class='alert alert-success'><b>"+username+"</b> is available</p>");
               },
               error: function (error) {
                  console.error('Error fetching data:', error);
                  $('#is_available').html("<p class='alert alert-danger'><b>"+username+"</b> is already in use</p>");
               }
         });
      }
   </script>
@stop