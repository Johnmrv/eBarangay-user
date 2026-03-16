<!DOCTYPE html>
<html>

<head>

<title>Submit Complaint</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-3">

<h4 class="text-center mb-3">Submit Complaint</h4>


<form method="POST" action="/submit-complaint" enctype="multipart/form-data">

@csrf


<label class="mb-1">Title</label>

<input type="text" name="title" class="form-control mb-3" required>


<label class="mb-1">Description</label>

<textarea name="description" class="form-control mb-3" rows="4" required></textarea>


<label class="mb-1">Category</label>

<select name="category" class="form-control mb-3">

@foreach($categories as $cat)

<option value="{{ $cat['name'] }}">
{{ $cat['name'] }}
</option>

@endforeach

</select>


<label class="mb-1">Attach Photo (optional)</label>

<input type="file" name="image" class="form-control mb-3">


<button class="btn btn-success w-100">
Submit Complaint
</button>

</form>


<a href="/dashboard" class="btn btn-secondary w-100 mt-3">
Back
</a>

</div>

</body>

</html>