<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
</head>
<body>
    <p>Hello {{ $data['name'] }}</p><br>
    <p>Your verification code is: {{ $data['verification_code'] }}</p>
</body>
</html>