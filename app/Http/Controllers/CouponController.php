<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponStoreRequest;
use App\Models\Coupon;
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

    public function couponCreate($type)
    {
        return view('coupon.create', ['type' => $type]);
    }
    
    public function couponStore(CouponStoreRequest $request)
    {
        $coupon = new Coupon();
        if($request->type == 'token_three'){
            $coupon->name           = $request->name;
            $coupon->straight_amount= $request->straight_amount;
            $coupon->rumble_amount  = $request->rumble_amount;
            $coupon->save();
        }else {
            $coupon->amount  = $request->amount;
            $coupon->save();
        }

        return redirect()->back()->with('success', 'Token created successfully');        
       
    }
}