<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>

@include('admin.header')
@include('admin.sidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h1>Messages</h1>
            <!-- Display messages here -->
            @if($messages->isEmpty())
                <p>No messages found.</p>
            @else
                <ul>
                    @foreach($messages as $message)
                        <li>
                            <strong>From: {{ $message->name }}</strong><br>
                            <strong>Email: {{ $message->email }}</strong><br>
                            <strong>Phone: {{ $message->phone }}</strong><br>
                            <strong>Message:</strong><br>
                            {{ $message->message }}
                        </li>
                        <hr>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@include('admin.footer')

</body>
</html>
