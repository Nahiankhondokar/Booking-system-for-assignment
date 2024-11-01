@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
        <div class="coupon-create w-50 m-auto bg-white p-3 border-red-700 rounded shadow-md">
            <form action="{{route('coupon.update', $coupon->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Token Number</label>
                    <input type="number" class="form-control" name="name" placeholder="Token Number" value="{{$coupon->name}}">
                      @if ($errors->has('name'))
                          <span class="error text-danger">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
    
                    <div class="form-group">
                        <label>Straight</label>
                        <input type="number" class="form-control" name="straight_amount" placeholder="Amount" value="{{$coupon->straight_amount ?? 0}}">
                        @if ($errors->has('straight_amount'))
                            <span class="error text-danger">{{ $errors->first('straight') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group">
                        <label>Rumble</label>
                        <input type="number" class="form-control" name="rumble_amount" placeholder="Amount" value="{{$coupon->rumble_amount ?? 0}}">
                        @if ($errors->has('rumble_amount'))
                            <span class="error text-danger">{{ $errors->first('rumble_amount') }}</span>
                        @endif
                    </div>

                    
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Amount" value="{{$coupon->amount ?? 0}}">
                        @if ($errors->has('amount'))
                            <span class="error text-danger">{{ $errors->first('amount') }}</span>
                        @endif
                    </div>
    
                <br>
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