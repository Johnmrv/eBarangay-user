<!DOCTYPE html>
<html>

<head>

<title>My Tickets</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-3">

<h4 class="text-center mb-3">My Tickets</h4>

@forelse($tickets as $ticket)

<div class="card mb-3">

<div class="card-body">

<h6>{{ $ticket['title'] }}</h6>

<p class="mb-1">
{{ $ticket['category'] }}
</p>

<span class="badge bg-warning">

{{ $ticket['status'] }}

</span>

<br><br>

<a href="/ticket/{{ $ticket['$id'] }}" class="btn btn-primary btn-sm">
Open Ticket
</a>

</div>

</div>

@empty

<p class="text-center">No tickets submitted.</p>

@endforelse


<a href="/dashboard" class="btn btn-secondary w-100 mt-3">
Back to Dashboard
</a>

</div>

</body>

</html>