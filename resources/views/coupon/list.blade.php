@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
        <div class="coupon-list">
            <div class="coupon-one bg-info p-2">
                <a href="{{route('coupon.create')}}">Coupon One</a>
            </div>

            <div class="coupon-one bg-info p-2">
                <a href="{{route('coupon.create')}}">Coupon Two</a>
            </div>

            <div class="coupon-one bg-info p-2">
                <a href="{{route('coupon.create')}}">Coupon Three</a>
            </div>
        </div>
    </div>
</main>

<style>
    .coupon-list{
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
    }
</style>

@endsection