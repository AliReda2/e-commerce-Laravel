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

        .table_deg {
            border: 2px solid greenyellow;
        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td {
            border: 1px solid skyblue;
            text-align: center;

        }
        input[type='search']{
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
                    <h1>Products</h1>

                    <form action="{{url('product_search')}}" method="GET">
                        <input type="search" name="search">
                        <input type="submit" class="btn btn-secondary" value="search">
                    </form>
                    <div class="div_deg">

                        <table class="table_deg">
                            <tr>
                                <th>
                                    product title
                                </th>

                                <th>
                                    description
                                </th>

                                <th>
                                    category
                                </th>

                                <th>
                                    price
                                </th>

                                <th>
                                    quantity
                                </th>

                                <th>
                                    image
                                </th>

                                <th>
                                    edit
                                </th>

                                <th>
                                    delete
                                </th>
                            </tr>

                            @foreach ($product as $products)
                                <tr>
                                    <td>
                                        {{ $products->title }}
                                    </td>

                                    <td>
                                        {!! Str::limit($products->description, 50) !!}
                                    </td>

                                    <td>
                                        {{ $products->category }}
                                    </td>

                                    <td>
                                        {{ $products->price }}

                                    </td>

                                    <td>
                                        {{ $products->quantity }}
                                    </td>

                                    <td>
                                        <img height="120" width="120" src="products/{{ $products->image }}"
                                            alt="">
                                    </td>

                                    <td>
                                        <a class="btn btn-success"
                                            href="{{ url('update_product', $products->slug) }}">edit</a>
                                    </td>

                                    <td><a class="btn btn-danger" onclick="confirm(event)"
                                            href="{{ url('delete_product', $products->id) }}">delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>


                    </div>
                    <div class="div_deg">
                        {{ $product->onEachSide(1)->links() }}

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
