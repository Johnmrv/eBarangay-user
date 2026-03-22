<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eBarangay Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #f8fafc, #e2e8f0);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 25px 20px;
            width: 100%;
            max-width: 400px;

            box-shadow:
                0 10px 30px rgba(0,0,0,0.08),
                inset 0 1px 0 rgba(255,255,255,0.7);
        }

        .logo {
            text-align: center;
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 14px;
            padding: 12px;
            border: 1px solid rgba(0,0,0,0.08);
            background: rgba(255,255,255,0.8);
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        }

        .btn-register {
            border-radius: 14px;
            padding: 12px;
            background: linear-gradient(180deg, #22c55e, #16a34a);
            border: none;
            font-weight: 500;
        }

        .btn-register:hover {
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

        .input-group-custom {
            margin-bottom: 12px;
        }

        .section-label {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-bottom: 5px;
            margin-left: 5px;
        }

    </style>
</head>

<body>

<div class="glass-card">

    <div class="logo">🏛️ eBarangay</div>
    <div class="subtitle">Create Resident Account</div>

    <form method="POST" action="/register">
        @csrf

        <!-- Personal Info -->
        <div class="section-label">PERSONAL INFORMATION</div>

        <div class="input-group-custom">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
        </div>

        <div class="input-group-custom">
            <input type="text" name="address" class="form-control" placeholder="Address" required>
        </div>

        <div class="input-group-custom">
            <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" required>
        </div>

        <!-- Account Info -->
        <div class="section-label mt-2">ACCOUNT DETAILS</div>

        <div class="input-group-custom">
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>

        <div class="input-group-custom">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button class="btn btn-register w-100 text-white mt-2">Register</button>

    </form>

    <p class="text-center mt-4">
        <a href="/login" class="link">Back to Login</a>
    </p>

</div>

</body>
</html>