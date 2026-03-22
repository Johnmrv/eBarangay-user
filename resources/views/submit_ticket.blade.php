<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Submit Complaint</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #f8fafc, #e2e8f0);
            padding-bottom: 80px;
        }

        .header {
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 18px;
            margin-bottom: 15px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        }

        .title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .subtitle {
            font-size: 0.85rem;
            color: #64748b;
        }

        .glass-card {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.05);
        }

        .section-label {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-bottom: 6px;
            margin-left: 3px;
        }

        .form-control, .form-select {
            border-radius: 14px;
            padding: 12px;
            border: 1px solid rgba(0,0,0,0.08);
            background: rgba(255,255,255,0.9);
            font-size: 0.95rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        }

        textarea.form-control {
            resize: none;
        }

        .file-upload {
            border: 2px dashed rgba(0,0,0,0.1);
            border-radius: 16px;
            padding: 15px;
            text-align: center;
            background: rgba(255,255,255,0.6);
        }

        .file-upload input {
            border: none;
            background: transparent;
        }

        .submit-btn {
            border-radius: 16px;
            padding: 14px;
            background: linear-gradient(180deg, #22c55e, #16a34a);
            border: none;
            font-weight: 500;
        }

        .back-btn {
            border-radius: 14px;
            padding: 12px;
        }

    </style>
</head>

<body>

<div class="container mt-3">

    <!-- Header -->
    <div class="header">
        <div class="title">📝 Submit Complaint</div>
        <div class="subtitle">Report an issue to your barangay</div>
    </div>

    <!-- Form -->
    <div class="glass-card">

        <form method="POST" action="/submit-complaint" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <div class="section-label">TITLE</div>
                <input type="text" name="title" class="form-control" placeholder="Enter complaint title" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <div class="section-label">DESCRIPTION</div>
                <textarea name="description" class="form-control" rows="4" placeholder="Describe the issue in detail..." required></textarea>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <div class="section-label">CATEGORY</div>
                <select name="category" class="form-select">
                    @foreach($categories as $cat)
                        <option value="{{ $cat['name'] }}">
                            {{ $cat['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- File Upload -->
            <div class="mb-3">
                <div class="section-label">ATTACH PHOTO (OPTIONAL)</div>
                <div class="file-upload">
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            <!-- Submit -->
            <button class="btn submit-btn w-100 text-white">
                Submit Complaint
            </button>

        </form>

    </div>

    <!-- Back -->
    <a href="/dashboard" class="btn btn-secondary back-btn w-100 mt-3">
        Back to Dashboard
    </a>

</div>

</body>

</html>