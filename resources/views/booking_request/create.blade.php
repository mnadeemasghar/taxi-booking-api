@extends('layout.app')

@section('content')
   <div class="card">
    <div class="card-header">{{ isset($id) ?? $id > "0" ? __("Edit Booking Request") : __("Create Booking Request") }}</div>
    <div class="card-body">
        <form id="create_booking_form" action="{{ isset($id) ?? $id > '0' ? route('BookingRequest.update',['id' => $id]) : route('BookingRequest.store') }}" method="POST">
            @csrf

            <div class="row">                
                <div class="form-group col">
                    <label for="pick_lat" class="form-label">Pickup Latitude</label>
                    <input id="pick_lat" type="text" class="form-control" value="{{ $pick_lat ?? '' }}" name="pick_lat" placeholder="Search address ...">
                </div>
                
                <div class="form-group col">
                    <label for="pick_lng" class="form-label">Pickup Longtitude</label>
                    <input id="pick_lng" type="text" class="form-control" value="{{ $pick_lng ?? '' }}" name="pick_lng" placeholder="Search address ...">
                </div>
                
                <div class="form-group col">
                    <label for="pick_datetime">Pick Datetime</label>
                    <input type="datetime-local" name="pick_datetime" value="{{ $pick_datetime ?? now()->format('Y-m-d\TH:i') }}" id="pick_datetime" class="form-control">
                </div>
            </div>
            @include('map.pick_map');
            

            <div class="row">
                <div class="form-group col">
                    <label for="drop_lat" class="form-label">Drop Latitude</label>
                    <input id="drop_lat" type="text" class="form-control" value="{{ $drop_lat ?? '' }}" name="drop_lat" placeholder="Search address ...">
                </div>
    
                <div class="form-group col">
                    <label for="drop_lng" class="form-label">Drop Longtitude</label>
                    <input id="drop_lng" type="text" class="form-control" value="{{ $drop_lng ?? '' }}" name="drop_lng" placeholder="Search address ...">
                </div>

                <div class="form-group col">
                    <label for="drop_datetime">Drop Datetime</label>
                    <input type="datetime-local" name="drop_datetime" value="{{ $drop_datetime ?? now()->format('Y-m-d\TH:i') }}" id="drop_datetime" class="form-control">
                </div>
            </div>
            @include('map.drop_map');
            

            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="offer" {{ isset($id) ?? $type ==  "offer" ? "selected":"" }}>Offer a Ride</option>
                    <option value="required" {{ isset($id) ?? $type ==  "required" ? "selected":"" }}>Ride Required</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" value="{{ $price ?? '' }}" id="price" class="form-control">
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" type="submit" form="create_booking_form">{{ __("Submit") }}</button>
    </div>
   </div>
   
@stop