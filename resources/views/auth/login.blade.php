<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eBarangay Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #f8fafc, #e2e8f0);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 30px 25px;
            width: 100%;
            max-width: 380px;

            box-shadow:
                0 10px 30px rgba(0,0,0,0.08),
                inset 0 1px 0 rgba(255,255,255,0.6);
        }

        .logo {
            text-align: center;
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 14px;
            padding: 12px;
            border: 1px solid rgba(0,0,0,0.08);
            background: rgba(255,255,255,0.7);
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        }

        .btn-login {
            border-radius: 14px;
            padding: 12px;
            background: linear-gradient(180deg, #3b82f6, #2563eb);
            border: none;
            font-weight: 500;
        }

        .btn-login:hover {
            opacity: 0.95;
        }

        .link {
            color: #2563eb;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .link:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 12px;
            font-size: 0.85rem;
        }

    </style>
</head>

<body>

<div class="glass-card">

    <div class="logo">🏛️ eBarangay</div>
    <div class="subtitle">Resident Login</div>

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>

        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <button class="btn btn-login w-100 text-white">Login</button>
    </form>

    <p class="text-center mt-4">
        <a href="/register" class="link">Create Account</a>
    </p>

</div>

</body>
</html>