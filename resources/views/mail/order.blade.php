<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>

<body>
    <p>Hi {{ $sale->customer->name }}</p>
    <p>Your order has been successfully placed</p>
    <br />
    <table style="width: 600px; text-align:right">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sale->saleProducts as $item)
                <tr>
                    <td style="text-align: center;">
                        <img src="{{ $item->thumb }}" width="100" alt=""
                            style="max-width: 100%; height: auto;">
                    </td>
                    <td style="font-weight: bold;">{{ $item->product->name }}</td>
                    <td style="text-align: center;">{{ $item->qty }}</td>
                    <td style="text-align: right;">${{ $item->price }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold;">Free Shipping</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold;">Total: ${{ $sale->total_amount }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
