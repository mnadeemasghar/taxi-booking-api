<div class="d-none">
        <form id="search" action="{{route('BookingRequest.search_result')}}" method="POST">
            @csrf
            <label for="lat_input">Latitude</label>
            <input type="text" name="lat" id="lat_input" class="form-control">
            <label for="lng_input">Longtitude</label>
            <input type="text" name="lng" id="lng_input" class="form-control">
        </form>
    </div>