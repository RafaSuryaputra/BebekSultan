<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebek Ayayo</title>
</head>
<body>
    <h1>Contact Us Email</h1>

    <p><strong>Name:</strong> {{ "$name" }}</p>
    <p><strong>Email:</strong> {{ "$email" }}</p>
    <p><strong>Phone:</strong> {{ "$phone" }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>

    <hr>

    <p><strong>Message:</strong></p>
    <p>{{ $messages }}</p>

    <hr>

    <p>This email was sent from {{ $name }} form on your website.</p>
</body>
</html>
