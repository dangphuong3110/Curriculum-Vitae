<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Code</title>
</head>
<body>
    <p>Hello {{ $data['name'] }}</p><br>
    <p>Your reset password code is: {{ $data['reset_password_code'] }}</p>
</body>
</html>