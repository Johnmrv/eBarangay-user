<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-4 col-12 mt-4">

<div class="card p-4 shadow">

<h4 class="text-center mb-3">Resident Register</h4>

<form method="POST" action="/register">

@csrf

<input type="text" name="full_name" class="form-control mb-2" placeholder="Full Name" required>

<input type="text" name="address" class="form-control mb-2" placeholder="Address" required>

<input type="text" name="contact_number" class="form-control mb-2" placeholder="Contact Number" required>

<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-success w-100">Register</button>

</form>

<p class="text-center mt-3">

<a href="/login">Back to Login</a>

</p>

</div>

</div>

</div>

</div>

</body>

</html>