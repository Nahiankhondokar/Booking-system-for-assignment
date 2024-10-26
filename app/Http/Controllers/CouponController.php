<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponStoreRequest;
use App\Models\Coupon;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

    public function pdfView()
    {
        return view('pdf.coupon');
    }

    public function couponCreate($type)
    {
        $user = User::find(1);
        auth()->user()->('create', $user);
        // dd();
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
            $coupon->name    = $request->name;
            $coupon->amount  = $request->amount;
            $coupon->save();
        }

        $total = 0;
        if($coupon->rumble_amount){
            $total += $coupon->rumble_amount + $coupon->straight_amount;
        }else {
            $total += $coupon->amount;
        }
        return view('pdf.coupon',['coupon' => $coupon, 'total' => $total]);       
    }

    public function pdfGenerator($id)
    {
        $coupon = Coupon::find($id);
        $total = 0;
        if($coupon->rumble_amount){
            $total += $coupon->rumble_amount + $coupon->straight_amount;
        }else {
            $total += $coupon->amount;
        }
        
        $pdf = Pdf::loadView('pdf.pdf', ['coupon' => $coupon,  'total' => $total]);
        return $pdf->download();
    }

    public function couponDelete($id)
    {
        Coupon::find($id)->delete();
        return redirect()->back()->with('success', 'Coupn Deleted');
    }
}