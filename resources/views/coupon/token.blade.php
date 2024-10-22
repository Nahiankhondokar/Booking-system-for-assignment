@extends('layouts.app')
@section('content')
<div class="token_table" style="
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100vh;
    ">
    <div class="row">
        <a href="{{route('coupon.list')}}" style="
        background: skyblue;
        padding: 10px 50px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        font-size: 20px;
        color: black;
        border: 2px solid #1b94c5;
    ">Create Coupon</a>
    </div>
</div>
@endsection