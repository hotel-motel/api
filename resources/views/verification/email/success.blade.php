<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Email Verification - Hotel Motel</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
<div class="text-secondary px-4 py-5 text-center">
    <div class="py-5">
        <h1 class="display-5 fw-bold text-white">Email Verified</h1>
        <div class="col-lg-6 mx-auto">
            <p class="fs-5 mb-4">
                Your email({{ $email }}) successfully verified. Now you can login to your account.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a type="button" class="btn btn-outline-light btn-lg px-4" href="http://127.0.0.1:3000/auth/login">
                    Login
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
