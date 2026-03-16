<!DOCTYPE html>
<html>

<head>

<title>eBarangay Dashboard</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body class="bg-light">


<div class="container mt-3">

<h4 class="text-center mb-3">
Welcome {{ session('resident_name') }}
</h4>


<!-- Announcements -->

<div class="card mb-3">

<div class="card-header bg-primary text-white">
Announcements
</div>

<div class="card-body">

@forelse($announcements as $ann)

<div class="mb-3">

<h6>{{ $ann['title'] }}</h6>

<p class="mb-1">
{{ $ann['content'] }}
</p>

<small class="text-muted">
{{ $ann['created_at'] }}
</small>

<hr>

</div>

@empty

<p>No announcements yet.</p>

@endforelse

</div>

</div>


<!-- Buttons -->

<div class="d-grid gap-3">

<a href="/submit-complaint" class="btn btn-success btn-lg">
Submit Complaint
</a>

<a href="/tickets" class="btn btn-warning btn-lg">
View My Tickets
</a>

<a href="/logout" class="btn btn-danger">
Logout
</a>

</div>


</div>

</body>

</html>