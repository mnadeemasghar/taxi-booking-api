@extends('layout.app')

@section('content')

   <div class="card">
    <div class="card-header">{{ __("login") }}</div>
    <div class="card-body">
        <form id="login_form" action="{{route('login.check')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" required>
            </div>

        </form>
    </div>
    <div class="card-footer">
        <button form="login_form" class="btn btn-primary" type="submit">Login</button>
        <a href="{{route('register')}}" class="btn btn-link">New User?</a>
    </div>
   </div>
@stop