<!DOCTYPE html>
<html>
<head>
    @include('admin.css') <!-- Include necessary CSS files -->
    <style type="text/css">
        body {
            background-color: #f8f9fa; /* Light gray background */
            color: #212529; /* Dark text color */
            font-family: Arial, sans-serif;
        }
        .container-fluid {
            padding: 20px;
        }
        .page-header {
            margin-bottom: 30px;
        }
        h1 {
            color: #007bff; /* Blue header color */
        }
        .dev_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px 0; /* Top and bottom margin adjusted */
        }
        input[type='text'] {
            width: 400px;
            height: 50px;
            padding: 0 10px; /* Padding added to input */
            box-sizing: border-box; /* Ensure padding is included in width */
            border: 1px solid #ced4da; /* Gray border */
            border-radius: 4px;
            font-size: 16px; /* Adjust font size for better visibility */
        }
        .btn {
            padding: 8px 16px;
            margin-left: 10px; /* Added margin for spacing */
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

@include('admin.header') <!-- Assuming this includes the header -->
@include('admin.sidebar') <!-- Assuming this includes the sidebar -->

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="dev_deg">
                <h1>Update Category</h1>
                <form action="{{ route('update_category', $data->id) }}" method="post">
                    @csrf
                    <input type="text" name="category" value="{{ $data->category_name }}" required>
                    <input class="btn btn-primary" type="submit" value="Update Category">
                </form>
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
