<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Details</title>
</head>
<body>

    <style>
        .user-info h2 {
            color: red;
        }

        table {
            border-collapse: collapse;
            font-size: 14px;
            width: 100%
        }

        th{
            border: 1px solid gray;
            padding: 20px;
            text-align: center
        }

        td {
            border: 1px solid gray;
            padding: 20px 10px;
            text-align: center;
        }

        .user-container{
            display: flex;
            justify-content: space-between;
        }
    </style>

    
<div>

    <div class="invoice-details">
        <p style="text-align: center">#Invoice No: {{$invoice->id}}</p>
        <hr>
   </div>
    
    <div class="user-container">
       <div class="user-info">
            <h2>Seller Info:</h2>
            <p>Name: {{$invoice->user->name}}</p>
            <p>Email: {{$invoice->user->email}}</p>
       </div>
    </div>

    <div class="invoice-details">
        <table w-full table-auto>

            <thead>
                <tr class="single-invoice-row">
                  <th>Name</th>
                  <th>Price</th> 
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>
            </thead>


            @foreach ($invoice->items as $item )
            <tr>
                <td class="border px-2 py-2 text-left">{{$item->name}}</td>
                <td>${{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>${{number_format($item->price * $item->quantity)}}</td>
            </tr>
            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td>Sub Total:  
                    
                </td>
                <td>${{number_format($invoice->amount()['total'], 2)}}</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>Paid:</td>
                <td>${{number_format($invoice->amount()['paid'], 2)}}</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>Due:</td>
                <td> ${{number_format($invoice->amount()['due'], 2)}}</td>
            </tr>

        </table>
    </div>

    <div class="payment-details">
        <p>Last Transaction:</p>
        @foreach ($invoice->payments as $payment )
        <div class="flex gap-4 mb-4">
            <p> {{date('F,j,Y g:i:a', strtotime($payment->created_at))}} : <span class="font-bold">${{$payment->amount}}</span> | transaction id: <span class="font-bold text-gray-700"> {{$payment->transaction_id}}</span> </p>
        </div>
        @endforeach
    </div>


</div>
    
</body>
</html>