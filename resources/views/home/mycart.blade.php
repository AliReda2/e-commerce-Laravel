<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }

        td {
            border: 1px solid skyblue;
        }

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .order_deg {
            padding-right: 100px;
            margin-top: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        .div_gap {
            padding: 20px
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- end hero area -->


    <div class="div_deg">
        <table>
            <tr>
                <th>product title</th>
                <th>price</th>
                <th>image</th>
                <th>remove</th>
            </tr>

            <?php
            
            $value = 0;
            
            ?>
            @foreach ($cart as $cart)
                <tr>
                    <td>{{ $cart->product->title }}</td>
                    <td>{{ $cart->product->price }}</td>
                    <td>
                        <img width="150" height="150" src="/products/{{ $cart->product->image }}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ url('delete_cart', $cart->id) }}">remove</a>
                    </td>
                </tr>
                <?php
                $value = $value + $cart->product->price;
                ?>
            @endforeach

        </table>
    </div>
    <div class="cart_value">
        <h3>total value= {{ $value }}$</h3>
    </div>

    <div class="order_deg">
        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf
            <div class="div_gap">
                <label>Reciever Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="div_gap">
                <label>Reciever Address</label>
                <textarea name="address" id="" cols="30" rows="2">{{ Auth::user()->address }}</textarea>
            </div>
            <div class="div_gap">
                <label>Reciever phone</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="cash on delivery">
                <a class="btn btn-success" href="{{ url('stripe',$value) }}">Pay Using Card</a>
            </div>
        </form>
    </div>


    @include('home.footer')

</body>

</html>
