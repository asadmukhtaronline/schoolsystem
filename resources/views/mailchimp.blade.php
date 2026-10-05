<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscribe to Newsletter</title>
</head>
<body>
    <div>
        <form action="{{ route('subscribe') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control col-md-4 col-xs-12" name="subscriber_email" id="exampleInputEmail" placeholder="Enter your email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p>{{ session('error') }}</p>
        @endif
    </div>
</body>
</html>
