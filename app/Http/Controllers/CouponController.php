<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('coupon.list');
    }

    public function firstCoupon()
    {
        return view('coupon.one');
    }

    public function couponCreate()
    {
        return view('coupon.create');
    }
}