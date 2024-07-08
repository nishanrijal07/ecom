<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
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
            margin-top: -50px;
        }
        label {
            display: inline-block;
            width: 150px;
        }
        .div_gap {
            padding: 20px;
        }
    </style>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>
    <div class="div_deg">
        <div class="order_deg">
            <form action="{{ route('confirm_order') }}" method="POST">
                @csrf
                <div class="div_gap">
                    <label>Receiver Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="div_gap">
                    <label>Receiver Address</label>
                    <textarea name="address">{{ Auth::user()->address }}</textarea>
                </div>
                <div class="div_gap">
                    <label>Receiver Phone no</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                </div>
                <div class="div_gap">
                    <input class="btn btn-success" type="submit" value="Cash On Delivery">
                    <a class="btn btn-success" href="javascript:void(0);" id="khalti-payment-button" style="background-color: purple;">Pay With Khalti</a>
                </div>
            </form>
        </div>
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>
            <?php $totalAmount = 0; ?>
            @foreach($cart as $item)
            <tr>
                <td>{{$item->product->title}}</td>
                <td>{{$item->product->price}}</td>
                <td>
                    <img width="150" src="/products/{{$item->product->image}}">
                </td>
                <td>
                    <a class="btn btn-danger" href="{{route('delete_cart',$item->id)}}">Remove</a>
                </td>
            </tr>
            <?php $totalAmount += $item->product->price; ?>
            @endforeach
        </table>
    </div>
    <div class="cart_value">
        <h3>Total Value of Cart is : Rs{{$totalAmount}}</h3>
    </div>
    @include('home.footer')
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "{{ config('app.khalti_public_key') }}",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess(payload) {
                    // hit merchant api for initiating verification
                    console.log(payload);
                    // Redirect to callback URL or update payment status
                    window.location.href = "{{ route('khalti.callback') }}?pidx=" + payload.pidx;
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("khalti-payment-button");
        btn.onclick = function() {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            var amountInPaisa = {{$totalAmount}} * 100; // Amount in paisa
            checkout.show({ amount: amountInPaisa });
        }
    </script>
</body>

</html>
