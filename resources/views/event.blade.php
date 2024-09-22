@extends('layouts.app')
@section('content')
<div class="booking_table">
    <div class="row">
        <div class="col-md-6 m-auto bg-secondary p-3">
            <div class="form-header text-center p-2 text-white">
                <h3>Event Create</h3>
            </div>
            <form action="{{route('event.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputPassword1" class="text-white">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="name">
                  @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Available Seats</label>
                    <input type="number" class="form-control" name="avaiable_seat" placeholder="seat">
                    @error('avaiable_seat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Total Seats</label>
                    <input type="number" class="form-control" name="total_seat" placeholder="Total seats">
                    @error('total_seat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Date</label>
                    <input type="date" class="form-control" name="date" placeholder="date">
                    @error('date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Description</label>
                    <br>
                    <textarea name="description" id="" cols="65" rows="5" placeholder="Description"></textarea>
                    
                  </div>
                  <br>
                <button type="submit" class="btn btn-primary text-center d-block m-auto">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection