@extends('layouts.app')
@section('content')
<div class="booking_table">
    <div class="row">
        <div class="col-md-6 m-auto bg-secondary p-3">
            <div class="form-header text-center p-2 text-white">
                <h3>Event Create</h3>
            </div>
            <form>
                <div class="form-group">
                  <label for="exampleInputPassword1" class="text-white">Name</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="name">
                  <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Available Seats</label>
                    <input type="number" class="form-control" name="avaiable_seats" placeholder="seat">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Total Seats</label>
                    <input type="number" class="form-control" name="total_seats" placeholder="Total seats">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Date</label>
                    <input type="date" class="form-control" name="date" placeholder="date">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-white">Description</label>
                    <br>
                    <textarea name="desc" id="" cols="63" rows="5" placeholder="Description"></textarea>
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <br>
                <button type="submit" class="btn btn-primary text-center d-block m-auto">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection