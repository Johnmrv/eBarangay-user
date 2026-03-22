<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Tickets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(180deg, #f8fafc, #e2e8f0);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            color: #111827;
        }

        /* Light Glass Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            transition: 0.25s ease;
        }

        .glass-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        /* Text */
        .text-soft {
            color: #6b7280;
        }

        /* Status Badges */
        .badge-pending {
            background: #facc15;
            color: #000;
            border-radius: 10px;
            padding: 6px 10px;
        }

        .badge-processing {
            background: #3b82f6;
            color: #fff;
            border-radius: 10px;
            padding: 6px 10px;
        }

        .badge-resolved {
            background: #22c55e;
            color: #fff;
            border-radius: 10px;
            padding: 6px 10px;
        }

        /* Buttons */
        .btn-primary-glass {
            background: linear-gradient(180deg, #3b82f6, #2563eb);
            border: none;
            border-radius: 14px;
            color: #fff;
        }

        .btn-primary-glass:hover {
            opacity: 0.9;
        }

        .btn-secondary-glass {
            background: #e5e7eb;
            border: none;
            border-radius: 14px;
            color: #111;
        }

        .btn-secondary-glass:hover {
            background: #d1d5db;
        }

    </style>
</head>

<body>

<div class="container mt-4 pb-5" style="max-width: 600px;">

    <h4 class="text-center mb-4 fw-semibold">🎫 My Tickets</h4>

    @forelse($tickets as $ticket)

        <div class="glass-card p-4 mb-3">

            <h5 class="fw-semibold mb-1">{{ $ticket['title'] }}</h5>

            <p class="text-soft small mb-3">
                {{ $ticket['category'] }}
            </p>

            <div class="d-flex justify-content-between align-items-center">

                <!-- Status -->
                @php
                    $status = strtolower($ticket['status']);
                @endphp

                <span class="
                    @if($status == 'pending') badge-pending
                    @elseif($status == 'processing') badge-processing
                    @elseif($status == 'resolved') badge-resolved
                    @endif
                ">
                    {{ ucfirst($ticket['status']) }}
                </span>

                <!-- Button -->
                <a href="/ticket/{{ $ticket['$id'] }}" class="btn btn-glass-primary btn-sm px-4 py-2">
                    Open
                </a>

            </div>

        </div>

    @empty

        <div class="glass-card p-5 text-center">
            <p class="mb-0 text-soft">No tickets submitted.</p>
        </div>

    @endforelse

    <a href="/dashboard" class="btn btn-secondary-glass w-100 mt-4 py-2">
        Back to Dashboard
    </a>

</div>

</body>
</html>