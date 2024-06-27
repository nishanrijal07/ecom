<!DOCTYPE html>
<html>
<head>
    @include('home.css')
</head>
<body>
    <div class="hero_area">
        @include('home.header')

        <section class="contact_section ">
            <div class="container px-0">
                <div class="heading_container ">
                    <h2 class="">Contact Us</h2>
                </div>
            </div>
            <div class="container container-bg">
                <div class="row">
                    <div class="col-lg-7 col-md-6 px-0">
                        <div class="map_container">
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113018.20144965994!2d84.33887265!3d27.722880550000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fb6f10ab0081%3A0x11b6475201e5a810!2sGaindakot!5e0!3m2!1sen!2snp!4v1717818715053!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 px-0">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.submit') }}" method="post">
                            @csrf
                            <div>
                                <input type="text" name="name" placeholder="Name" required />
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Email" required />
                            </div>
                            <div>
                                <input type="text" name="phone" placeholder="Phone" required />
                            </div>
                            <div>
                                <textarea name="message" class="message-box" placeholder="Message" required></textarea>
                            </div>
                            <div class="d-flex">
                                <button type="submit">SEND</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('home.footer')
    <!-- footer section -->

    <!-- JavaScript files -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>

    <script>// Optional: Add smooth scrolling for anchor links (requires jQuery)
$(document).ready(function() {
  $('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if (target.length) {
      event.preventDefault();
      $('html, body').stop().animate({
        scrollTop: target.offset().top
      }, 800);
    }
  });
});
</script>
</body>
</html>
