<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Section</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        /* Global Styles */
        body {
            font-family: "Poppins", sans-serif;
            color: #101010;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .layout_padding {
            padding: 45px 0;
        }

        /* Shop Section Styles */
        .shop_section {
            padding: 45px 0;
        }

        .shop_section .heading_container {
            margin-bottom: 40px;
            text-align: center;
        }

        .shop_section .heading_container h2 {
            font-size: 2.5rem;
            text-transform: uppercase;
            font-weight: 700;
            color: #333;
        }

        .shop_section .box {
            background-color: #eeeeee;
            position: relative;
            padding: 20px;
            margin-top: 25px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .shop_section .box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .shop_section .box a {
            color: #000000;
        }

        .shop_section .img-box {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            height: 245px;
            overflow: hidden;
            border-radius: 8px;
            background-color: #fff; /* Add a white background to make the image stand out */
        }

        .shop_section .img-box img {
            max-width: 100%;
            max-height: 100%;
            transition: transform 0.3s ease;
        }

        .shop_section .img-box:hover img {
            transform: scale(1.1);
        }

        .shop_section .detail-box {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .shop_section .detail-box h6 {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin: 10px 0;
        }

        .shop_section .detail-box h6 span {
            color: #db4f66;
            font-weight: 700;
        }

        .shop_section .btn-box {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .shop_section .btn-box a {
            display: inline-block;
            padding: 10px 40px;
            background-color: #f16179;
            color: #ffffff;
            border: 1px solid #f16179;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .shop_section .btn-box a:hover {
            background-color: transparent;
            color: #f16179;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .btn-success {
            background-color: #28a745;
            border: 1px solid #28a745;
        }

        .btn-primary {
            background-color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-success:hover, .btn-primary:hover {
            opacity: 0.8;
        }

        @media (max-width: 767px) {
            .shop_section .box {
                padding: 15px;
            }

            .shop_section .heading_container h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Products</h2>
            </div>
            <div class="row">
                @foreach($product as $products)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <div class="img-box">
                                <img src="products/{{$products->image}}" alt="{{$products->title}}" class="img-fluid">
                            </div>
                            <div class="detail-box">
                                <h6>{{$products->title}}</h6>
                                <h6>
                                    Price
                                    <span>Rs{{$products->price}}</span>
                                </h6>
                            </div>
                            <div class="d-flex justify-content-between" style="padding: 10px;">
                                <a class="btn btn-success" href="{{ route('product_details', $products->id) }}">Details</a>
                                <a class="btn btn-primary" href="{{ route('add_cart', $products->id) }}">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</body>
</html>
