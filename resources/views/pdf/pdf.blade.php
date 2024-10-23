<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
</head>
<body>
    <style>


        .pdf-btn {
            margin: auto;
            background: rgb(1, 104, 136);
            padding: 10px;
            border-radius: 5px;
            color: black;
            width: 10%;
            margin-top: 10px;
            text-align: center;
        }

        .pdf-btn a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin: auto;
            font-size: 20px;
        }


        .paf-wrapper {
            width: 50%;
            margin: auto;
            text-align: center;
            margin-bottom: 5rem;
        }

        table {
            border-collapse: collapse;
            margin: auto;
            width: 100%;
        }
        th {
            background: #ccc;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        tr:nth-child(even) {
            background: #efefef;
        }

        tr:hover {
            background: #d1d1d1;
        }

        .paf-wrapper {
            width: 50%;
            margin: auto;
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 9px black;
        }
    </style>

    <div class="paf-wrapper">
        <div class="pdf-title">
            <h2>PDF</h2>
        </div>
        <table class="my_table">
            <tr>
                <th>Token No : @if($coupon->amount) {{$coupon->name}} @endif</th>
                <th>Amount</th>
            </tr>
          
            @if($coupon->amount)
                <tr>
                    <td>{{$coupon->name ?? ''}}</td>
                    <td>{{$coupon->amount?? ''}}</td>
                </tr>
            @endif

            @if($coupon->rumble_amount || $coupon->straight_amount)
                <tr>
                    <td>Straight</td>
                    <td>{{$coupon->straight_amount ?? ''}}</td>
                </tr>
                <tr>
                    <td>Rumble</td>
                    <td>{{$coupon->rumble_amount ?? ''}}</td>
                </tr>
            @endif

            {{-- @forelse ($tokens as $token)
            <tr>
                <td>{{$token->name ?? ''}}</td>
                <td>{{$token->amount?? ''}}</td>
            </tr>
            @empty
            <tr>
                <td>No Data</td>
            </tr>
            @endforelse --}}

            <tr>
                <td>Total</td>
                <td>{{$total ?? 0}}</td>
            </tr>
        </table>
    </div>
</body>
</html>