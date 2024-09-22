@extends('layouts.app')
@section('content')
<div class="booking_table">
    <div class="row">
        <div class="col-md-6 m-auto bg-secondary p-3">
            <div class="form-header text-center p-2 text-white">
                <h3>Booking System</h3>
            </div>
            <form action="{{route('booking.store')}}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-white">Event</label>
                    <select name="event_id" id="" class="form-control">
                        <option value="">--Select--</option>
                        @foreach ($events as $event)
                        <option value="{{$event->id}}">{{$event->name}}</option>
                        @endforeach
                    </select>
                    @error('event_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1" class="text-white">Seats</label>
                  <input type="number" class="form-control" name="seat" placeholder="seat">
                  @error('seat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Currency</label>
                    <select name="currency" id="" class="form-control">
                      <option value="">--Select--</option>
                      <option value="BDT">BDT</option>
                      <option value="IND">IND</option>
                      <option value="DOLLAR">DOLLAR</option>
                      
                  </select>
                  @error('currency')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Amount</label>
                    <input type="number" class="form-control" name="amount" placeholder="amount">
                    @error('amount')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <br>
                <button type="submit" class="btn btn-primary text-center d-block m-auto">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection