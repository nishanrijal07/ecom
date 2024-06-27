<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style type="text/css">
    /* Center div horizontally and vertically */
    .div_center {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    /* Padding for detail boxes */
    .detail-box {
      padding: 15px;
    }

    /* Style for product details section */
    .product-details {
      margin-top: 50px; /* Adjust as needed */
      background-color: #f8f9fa; /* Light gray background */
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }

    .product-details img {
      max-width: 100%; /* Ensure image fits within its container */
      height: auto; /* Maintain aspect ratio */
      border-radius: 8px; /* Rounded corners for image */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light shadow for image */
    }

    .product-details h6 {
      font-size: 18px; /* Adjust font size */
      margin-bottom: 8px; /* Bottom margin for headers */
    }

    .product-details p {
      line-height: 1.6; /* Line height for paragraphs */
    }

    .product-details .btn {
      padding: 10px 20px; /* Padding for buttons */
      font-size: 16px; /* Button font size */
    }
  </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')

    <!-- Product details start -->
    <section class="shop_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>Product Details</h2>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="product-details">
              <div class="row">
                <div class="col-md-6">
                  <div class="div_center">
                    <img src="/products/{{ $data->image }}" alt="{{ $data->title }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <h6>Product: {{ $data->title }}</h6>
                    <h6>
                      Price:
                      <span>Rs{{ $data->price }}</span>
                    </h6>
                  </div>
                  <div class="detail-box">
                    <h6>Category:
                    <span>{{ $data->category }}</span></h6>
                  </div>
                  <div class="detail-box">
                    <h6>Available Quantity:
                    <span>{{ $data->quantity }}</span></h6>
                  </div>
                  <div class="detail-box">
                    <h6> Description: {{ $data->description }}</h6>
                  </div>
                  <div class="detail-box">
                    <a class="btn btn-success" href="{{ route('add_cart', $data->id) }}">Add To Cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Product details end -->

    @include('home.footer')
  </div>

  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
