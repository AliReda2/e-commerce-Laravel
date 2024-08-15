<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

    <style>
        .div_deg {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 60px;
        }

        table {
            border: 2px solid skyblue;
            text-align: center;
        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
        }

        td {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
            padding: 10px;

        }

        input[type='search'] {
            width: 500px;
            height: 60px;
            margin-left: 50px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h3>All Orders</h3>
                    <br>
                    <br>
                    <div class="div_deg">
                        <table>
                            <tr>
                                <th>Customer name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>payment status</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Print</th>
                            </tr>

                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->rec_address }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->product->title }}</td>
                                    <td>{{ $data->product->price }}</td>
                                    <td><img width="150" src="/products/{{ $data->product->image }}" alt="">
                                    </td>
                                    <td>{{ $data->payment_status }}</td>
                                    <td>
                                        @if ($data->status == 'in progress')
                                            <span style="color: red">{{ $data->status }}</span>
                                        @elseif ($data->status == 'On the way')
                                            <span style="color: yellow">{{ $data->status }}</span>
                                        @else
                                            <span style="color: green">{{ $data->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('on_the_way', $data->id) }}"
                                            onclick="confirm(event)">On the
                                            way</a>
                                        <a class="btn btn-success" href="{{ url('delivered', $data->id) }}"
                                            onclick="confirm(event)">Delivered</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary" href="{{ url('print_pdf', $data->id) }}">Print
                                            PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</body>

</html>
