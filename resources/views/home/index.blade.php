<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hamro Electronics</title>
  <!-- Include CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Your custom styles -->
  <!-- Include JavaScript -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
  <!-- Include additional CSS or JavaScript files specific to your components -->
  @include('home.css') <!-- Include additional CSS if necessary -->
</head>

<body>
  <div class="hero_area">
    <!-- Include header section -->
    @include('home.header')
    
    <!-- Include slider section -->
    @include('home.slider')
  </div>
  <!-- End hero area -->

  <!-- Shop section -->
  @include('home.product')
  <!-- End shop section -->

  <!-- Info section or any other content -->
  <section class="info_section">
    <!-- Include footer section -->
    @include('home.footer')
    <!-- End footer section -->
  </section>
  <!-- End info section -->

</body>

</html>
