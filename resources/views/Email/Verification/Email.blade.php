<!DOCTYPE html>
<html>
<head>
    <title>Activate Account - Hotel Motel</title>
</head>
<body>
Hello, Your token is :
{{$token}}
For activation click on :
<a href="http://127.0.0.1:3000/email/verify/{{ $token }}">
    http://127.0.0.1:3000/email/verify/{{ $token }}
</a>
</body>
</html>
