@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
        <div class="coupon-create w-50 m-auto bg-white p-3 border-red-700 rounded shadow-md">
            <form action="{{route('coupon.store')}}" method="POST">
                @csrf
                
               @if($type == 'token_three')
               <div class="form-group">
                <label>Token Number</label>
                <input type="number" class="form-control" name="name" placeholder="Token Number">
                  @if ($errors->has('name'))
                      <span class="error text-danger">{{ $errors->first('name') }}</span>
                  @endif
              </div>

                <div class="form-group">
                    <label>Straight</label>
                    <input type="number" class="form-control" name="straight_amount" placeholder="Amount">
                    @if ($errors->has('straight_amount'))
                        <span class="error text-danger">{{ $errors->first('straight') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Rumble</label>
                    <input type="number" class="form-control" name="rumble_amount" placeholder="Amount">
                    @if ($errors->has('rumble_amount'))
                        <span class="error text-danger">{{ $errors->first('rumble_amount') }}</span>
                    @endif
                </div>

                <input type="hidden" name="type" value="token_three">
                @else 
                <div class="form-group">
                    <label>Token Number</label>
                    <input type="number" class="form-control" name="name" placeholder="Token Number" min="1" max="9">
                      @if ($errors->has('name'))
                          <span class="error text-danger">{{ $errors->first('name') }}</span>
                      @endif
                  </div>

                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" class="form-control" name="amount" placeholder="Amount">
                    @if ($errors->has('amount'))
                        <span class="error text-danger">{{ $errors->first('amount') }}</span>
                    @endif
                </div>
                @endif

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