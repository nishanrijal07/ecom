<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Electronics</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS for header -->
    <style>
        /* Custom navbar styles */
        .header_section {
            background-color: #ffffff; /* Background color */
            padding: 10px 0; /* Padding for the header */
            border-bottom: 1px solid #eeeeee; /* Bottom border */
        }

        .custom_nav-container {
            justify-content: space-between; /* Align items horizontally */
        }

        .navbar-brand {
            font-size: 1.5rem; /* Adjust font size */
            color: #333333; /* Brand text color */
            display: flex;
            align-items: center; /* Center items vertically */
        }

        .navbar-brand img {
            height: 40px; /* Adjust height of the logo */
            opacity: 0.8; /* Make the logo slightly transparent */
            transition: opacity 0.3s; /* Smooth transition on hover */
        }

        .navbar-brand img:hover {
            opacity: 1; /* Remove transparency on hover */
        }

        .navbar-nav {
            margin: 0 auto; /* Center align navbar items */
            display: flex;
            align-items: center; /* Center items vertically */
        }

        .navbar-nav .nav-item {
            margin-right: 15px; /* Space between nav items */
        }

        .navbar-nav .nav-link {
            color: #333333; /* Nav link color */
            font-weight: 500; /* Nav link font weight */
            transition: color 0.3s; /* Smooth transition on color change */
        }

        .navbar-nav .nav-link:hover {
            color: #007bff; /* Hover color */
            text-decoration: none; /* Remove default underline */
        }

        .user_option {
            display: flex; /* Display user options in a row */
            align-items: center; /* Center items vertically */
        }

        .user_option a {
            margin-right: 15px; /* Space between user options */
            color: #333333; /* User option color */
            transition: color 0.3s; /* Smooth transition on color change */
        }

        .user_option a:hover {
            color: #007bff; /* Hover color */
            text-decoration: none; /* Remove default underline */
        }

        /* Custom button styles */
        .btn-danger {
            background-color: #dc3545; /* Default background color */
            border: none; /* Remove border */
            color: #fff; /* Text color */
            padding: 10px 20px; /* Padding */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transition on hover */
        }

        .btn-danger:hover {
            background-color: #c82333; /* Darker background color on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
    </style>
</head>

<body>
    <!-- header section starts -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/loogo.png') }}" alt="Logo">
                <!-- Adjust the alt text accordingly -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('why') }}">Why Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
                <div class="user_option">
                    @if (Route::has('login'))
                    @auth

                    <a href="{{ route('myorders') }}">My Orders</a>

                    <a href="{{ route('mycart') }}">
                        <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                        [{{ $count }}]
                    </a>
                    <form style="padding: 15px" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Logout">
                    </form>
                    @else
                    <a href="{{ url('/login') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Login</span>
                    </a>
                    <a href="{{ url('/register') }}">
                        <i class="fa fa-vcard" aria-hidden="true"></i>
                        <span>Register</span>
                    </a>
                    @endauth
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <!-- end header section -->

    <!-- Your page content goes here -->

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
