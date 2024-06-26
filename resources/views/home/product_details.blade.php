<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style type="text/css">
    .div_center {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    .detail-box {
      padding: 15px;
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
            <div class="box">
              <div class="div_center">
                <img width="400" src="/products/{{ $data->image }}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{ $data->title }}</h6>
                <h6>
                  Price
                  <span>
                    Rs{{ $data->price }}
                  </span>
                </h6>
              </div>
              <div class="detail-box">
                <h6>Category</h6>
                <span>{{ $data->category }}</span>
                <h6>Available Quantity</h6>
                <span>{{ $data->quantity }}</span>
              </div>
              <div class="detail-box">
                <p>{{ $data->description }}</p>
              </div>


              <div class="detail-box">
              <a class="btn btn-primary" href="{{ route('add_cart', $data->id) }}">Add To cart</a>
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
