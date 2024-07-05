<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
        table {
            border: 2px solid skyblue;
            text-align: center;
        }
        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: white;
        }
        td {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
        }
        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px; /* Adjusts space between buttons */
        }
        h3{
            color:white;
        }
    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            <h3>All Orders</h3>
                <br>
                <div class="table_center">
                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Phone No</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Change Status</th>
                        </tr>
                        @foreach($data as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->rec_address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product->title }}</td>
                            <td>{{ $order->product->price }}</td>
                            <td>
                            <img height="120" width="120" src="{{ asset('products/' . $order->product->image) }}">
                            </td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                @if($order->status == 'in progress')
                                <span style="color: red;">{{ $order->status }}</span>
                                @elseif($order->status == 'On The Way')
                                <span style="color: yellow;">{{ $order->status }}</span>
                                @else
                                <span style="color: green;">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('on.the.way', $order->id) }}">On The Way</a>
                                    <a class="btn btn-success" href="{{ route('delivered', $order->id) }}">Delivered</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>

</body>
</html>
