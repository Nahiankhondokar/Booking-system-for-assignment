@extends('layouts.app')
@section('content')

<?php
    $tokens = App\Models\Coupon::all();
?>
<div class="token_table">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                
                <a href="{{route('coupon.list')}}" class="coupon-btn ">Create Coupon</a>
                <br>
                <br>
                <table class="table table-striped border">
                    <h3 class="text-center">Coupon List</h3>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Token No</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Straight Amount</th>
                        <th scope="col">Rumble Amount</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($tokens as $key => $token)
                      <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$token->name}}</td>
                        <td>{{$token->amount ?? "None"}}</td>
                        <td>{{$token->straight_amount ?? "None"}}</td>
                        <td>{{$token->rumble_amount ?? "None"}}</td>
                        <td>
                            <a href="{{route('coupon.delete',$token->id)}}" class="text-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      @empty 
                      <tr>
                        <th scope="row">No Data</th>
                      </tr>
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>

    .token_table {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;

    }
    .coupon-btn {
        background: skyblue;
        padding: 10px 50px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        font-size: 20px;
        color: black;
        border: 2px solid #1b94c5;
    }
</style>
@endsection