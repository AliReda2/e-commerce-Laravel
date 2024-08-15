<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th{
            border: 2px solid skyblue;
            background-color: black;
            color: white;
            font-size: 19px;
            font-weight: bold;
            text-align: center;
        }
        td{
            border: 1px solid skyblue;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <div class="div_deg">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Image</th>
                </tr>
                @foreach ($order as $order)
                    <tr>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->product->price}}</td>
                        <td>{{$order->status}}</td>
                        <td><img width="300" height="200" src="/products/{{$order->product->image}}" alt=""></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('home.footer')

</body>

</html>
