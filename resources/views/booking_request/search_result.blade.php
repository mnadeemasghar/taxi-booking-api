@extends('layout.app')

@section('content')

    @include('map.search_result')
    @include('map.search')
   <div class="card d-none">
    <div class="card-header">{{ __("Booking Requests") }}</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>id</th>
                <th>type</th>
                <th>date</th>
                <th>price</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($data as $ride)
                    <tr>
                        <td>{{ $ride->id }}</td>
                        <td>{{ $ride->type }}</td>
                        <td>{{ date('d-M-Y', strtotime($ride->pick_datetime)) }}</td>
                        <td>{{ $ride->price }}</td>
                        <td>
                            <div class="row">
                                <a href="{{route('BookingRequest.edit',['id'=>$ride->id])}}" class="btn btn-link">Edit</a>
                                <form id="delete_form_{{ $ride->id }}" action="{{route('BookingRequest.destroy',['id' => $ride->id])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@stop