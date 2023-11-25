@extends('layout.app')

@section('content')

   <div class="card">
    <div class="card-header">{{ __("Search Booking Request") }}</div>
    <div class="card-body">
        <form id="search_booking_form" action="{{ route('BookingRequest.search_result') }}" method="POST">
            @csrf

            <div class="row">
                <div class="form-group col">
                    <label for="pick_lat" class="form-label">Pickup Latitude</label>
                    <input id="pick_lat" type="text" class="form-control" name="pick_lat" placeholder="Search address ...">
                </div>
    
                <div class="form-group col">
                    <label for="pick_lng" class="form-label">Pickup Longtitude</label>
                    <input id="pick_lng" type="text" class="form-control" name="pick_lng" placeholder="Search address ...">
                </div>

                <div class="form-group col">
                    <label for="pick_datetime">Pick Datetime</label>
                    <input type="datetime-local" name="pick_datetime" id="pick_datetime" class="form-control">
                </div>
            </div>
            @include('map.pick_map');

            <div class="row">
                <div class="form-group col">
                    <label for="drop_lat" class="form-label">Drop Latitude</label>
                    <input id="drop_lat" type="text" class="form-control" name="drop_lat" placeholder="Search address ...">
                </div>
    
                <div class="form-group col">
                    <label for="drop_lng" class="form-label">Drop Longtitude</label>
                    <input id="drop_lng" type="text" class="form-control" name="drop_lng" placeholder="Search address ...">
                </div>

                <div class="form-group col">
                    <label for="drop_datetime">Pick Datetime</label>
                    <input type="datetime-local" name="drop_datetime" id="drop_datetime" class="form-control">
                </div>
            </div>
            @include('map.drop_map');

            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="offer">Offer a Ride</option>
                    <option value="required">Ride Required</option>
                </select>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" type="submit" form="search_booking_form">{{ __("Submit") }}</button>
    </div>
   </div>

@stop