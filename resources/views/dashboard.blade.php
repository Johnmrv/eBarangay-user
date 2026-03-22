<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>eBarangay Dashboard</title>
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
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        .welcome {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .subtext {
            font-size: 0.85rem;
            color: #64748b;
        }

        .glass-card {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.05);
            margin-bottom: 15px;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .announcement-item {
            padding: 10px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .announcement-item:last-child {
            border-bottom: none;
        }

        .announcement-title {
            font-size: 0.95rem;
            font-weight: 500;
        }

        .announcement-content {
            font-size: 0.85rem;
            color: #475569;
        }

        .announcement-date {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .action-btn {
            border-radius: 16px;
            padding: 15px;
            font-weight: 500;
            font-size: 0.95rem;
            border: none;
        }

        .btn-complaint {
            background: linear-gradient(180deg, #22c55e, #16a34a);
            color: #fff;
        }

        .btn-tickets {
            background: linear-gradient(180deg, #facc15, #eab308);
            color: #000;
        }

        .btn-logout {
            background: #ef4444;
            color: #fff;
            border-radius: 12px;
            padding: 10px;
        }

    </style>
</head>

<body>

<div class="container mt-3">

    <!-- Header -->
    <div class="header">
        <div class="welcome">
            👋 Welcome, {{ session('resident_name') }}
        </div>
        <div class="subtext">
            Manage your requests and stay updated
        </div>
    </div>

    <!-- Announcements -->
    <div class="glass-card">
        <div class="section-title">📢 Announcements</div>

        @forelse($announcements as $ann)
            <div class="announcement-item">
                <div class="announcement-title">{{ $ann['title'] }}</div>
                <div class="announcement-content">{{ $ann['content'] }}</div>
                <div class="announcement-date">{{ $ann['created_at'] }}</div>
            </div>
        @empty
            <p class="text-muted">No announcements yet.</p>
        @endforelse
    </div>

    <!-- Actions -->
    <div class="d-grid gap-3">

        <a href="/submit-complaint" class="action-btn btn-complaint text-center">
            📝 Submit Complaint
        </a>

        <a href="/tickets" class="action-btn btn-tickets text-center">
            🎫 View My Tickets
        </a>

        <a href="/logout" class="btn btn-logout w-100">
            Logout
        </a>

    </div>

</div>

</body>

</html>