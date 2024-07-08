<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        body {
            background-color: #343a40; /* Dark background for contrast */
            color: white;
            font-family: Arial, sans-serif;
        }
        .page-content {
            padding: 0px;
        }
        .page-header {
            margin-bottom: 30px;
        }
        h1 {
            color: skyblue;
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        input[type='text'] {
            width: 400px;
            height: 50px;
            padding: 0 10px;
            box-sizing: border-box;
            border: 2px solid yellowgreen;
            border-radius: 4px;
            font-size: 16px;
            color: black;
        }
        .btn-primary {
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 4px;
            background-color: yellowgreen;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #5a9d5a;
        }
        .table_deg {
            margin: auto;
            margin-top: 50px;
            width: 80%;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px;
            border: 1px solid yellowgreen;
            text-align: center;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        th {
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }
        td {
            color: white;
        }
        td:hover {
            background-color: yellowgreen;
            color: white;
        }
        .btn-success, .btn-danger {
            padding: 8px 16px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }
        .btn-success {
            background-color: green;
        }
        .btn-danger {
            background-color: red;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Add Category</h1>
                <div class="div_deg">
                    <form action="{{ route('add.category') }}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="category_name" required>
                            <input class="btn btn-primary" type="submit" value="Add Category">
                        </div>
                    </form>
                </div>
                <div>
                    <table class="table_deg">
                        <tr>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($data as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('edit.category', $category->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('delete.category', $category->id) }}" method="POST" onsubmit="confirmation(event, this);">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.js')

    <script type="text/javascript">
        function confirmation(event, form) {
            event.preventDefault();
            swal({
                title: "Are You Sure to Delete This?",
                text: "This deletion will be permanent.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        }
    </script>
</body>
</html>
