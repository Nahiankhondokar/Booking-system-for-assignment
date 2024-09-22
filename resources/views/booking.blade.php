@extends('layouts.app')
@section('content')
<div class="booking_table">
    <div class="row">
        <div class="col-md-6 m-auto bg-secondary p-3">
            <div class="form-header text-center p-2 text-white">
                <h3>Booking System</h3>
            </div>
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-white">Event</label>
                    <select name="event" id="" class="form-control">
                        <option value="">--Select--</option>
                        <option value=""></option>
                    </select>
                  <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1" class="text-white">Seats</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="seats">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Currency</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="currency">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Amount</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="amount">
                  </div>
                  <br>
                <button type="submit" class="btn btn-primary text-center d-block m-auto">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection