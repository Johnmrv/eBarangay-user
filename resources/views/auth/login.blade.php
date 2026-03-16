<!DOCTYPE html>
<html>
<head>

<title>Resident Login</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-4 col-12 mt-5">

<div class="card p-4 shadow">

<h4 class="text-center mb-4">eBarangay Login</h4>

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<form method="POST" action="/login">

@csrf

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-primary w-100">Login</button>

</form>

<p class="text-center mt-3">

<a href="/register">Create Account</a>

</p>

</div>

</div>

</div>

</div>

</body>

</html>