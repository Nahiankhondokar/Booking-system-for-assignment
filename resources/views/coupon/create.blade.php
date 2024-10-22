@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
        <div class="coupon-create">
            <form>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" name="straight" placeholder="Enter email">
                  <small  class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="straight" placeholder="Enter email">
                    <small  class="form-text text-muted"></small>
                  </div>

                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="straight" placeholder="Enter email">
                    <small  class="form-text text-muted"></small>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</main>

<style>
    /* .coupon-list{
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        gap: 10px;
    }

    .coupon-one{
        border-radius: 5px;
    }

    .coupon-one a{
        text-decoration: none;
        color: black;
    } */
</style>

@endsection