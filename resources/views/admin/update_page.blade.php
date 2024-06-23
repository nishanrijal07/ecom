<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        label {
            display: inline-block;
            width: 200px;
            padding: 20px;
            font-size: 18px !important;
            color: white !important;
        }

        h2 {
            color: white;
        }

        input[type='text'], input[type='number'] {
            width: 300px;
            height: 60px;
        }

        textarea {
            width: 450px;
            height: 100px;
        }
    </style>
</head>
<body>

@include('admin.header')

@include('admin.sidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2>Update Product</h2>
            <div class="div_deg">
                <form action="{{ route('edit_product', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" required>
                    </div>

                    <div>
                        <label>Description</label>
                        <textarea name="description" required>{{ $data->description }}</textarea>
                    </div>
                    <div>
                        <label>Price</label>
                        <input type="text" name="price" value="{{ $data->price }}" required>
                    </div>

                    <div>
                        <label>Quantity</label>
                        <input type="number" name="qty" value="{{ $data->quantity }}" required>
                    </div>

                    <div>
                        <label>Category</label>
                        <select name="category" required>
                            <option value="{{ $data->category }}">{{ $data->category }}</option>
                            @foreach($category as $cat)
                                <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Current Image</label>
                        <img width="150" src="/products/{{ $data->image }}">
                    </div>

                    <div>
                        <label>New Image</label>
                        <input type="file" name="image">
                    </div>

                    <div>
                        <input class="btn btn-success" type="submit" value="Update Product">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
