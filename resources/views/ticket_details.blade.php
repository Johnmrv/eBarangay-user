<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ticket Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #f8fafc, #e2e8f0);
            padding-bottom: 90px;
        }

        .glass-card {
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.05);
            margin-bottom: 15px;
        }

        .header {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .subtext {
            font-size: 0.8rem;
            color: #64748b;
        }

        .image-preview {
            width: 100%;
            border-radius: 16px;
            margin-top: 10px;
            object-fit: cover;
        }

        .chat-container {
            max-height: 300px;
            overflow-y: auto;
        }

        .chat-bubble {
            padding: 10px 14px;
            border-radius: 16px;
            font-size: 0.9rem;
            max-width: 75%;
            display: inline-block;
        }

        .chat-you {
            background: #3b82f6;
            color: white;
            border-bottom-right-radius: 4px;
        }

        .chat-admin {
            background: #e5e7eb;
            color: #111;
            border-bottom-left-radius: 4px;
        }

        .chat-label {
            font-size: 0.7rem;
            margin-bottom: 2px;
        }

        .input-area {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(20px);
            padding: 10px;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.05);
        }

        .message-input {
            border-radius: 14px;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 10px;
        }

        .send-btn {
            border-radius: 12px;
        }

    </style>
</head>

<body>

<div class="container mt-3">

    <!-- Ticket Info -->
    <div class="glass-card">
        <div class="header">{{ $ticket['title'] }}</div>
        <div class="subtext">{{ $ticket['category'] }}</div>

        <p class="mt-2 mb-1">{{ $ticket['description'] }}</p>

        <!-- Image Preview -->
        @if(!empty($ticket['image']))
            <img src="{{ asset('storage/' . $ticket['image']) }}" class="image-preview">
        @endif
    </div>

    <!-- Conversation -->
    <div class="glass-card">
        <div class="header mb-2">💬 Conversation</div>

        <div class="chat-container">

            @forelse($messages as $msg)

                @if($msg['sender_role'] == 'resident')
                    <div class="text-end mb-2">
                        <div class="chat-label text-primary">You</div>
                        <div class="chat-bubble chat-you">
                            {{ $msg['message'] }}
                        </div>
                    </div>
                @else
                    <div class="mb-2">
                        <div class="chat-label text-success">Admin</div>
                        <div class="chat-bubble chat-admin">
                            {{ $msg['message'] }}
                        </div>
                    </div>
                @endif

            @empty
                <p class="text-muted">No messages yet</p>
            @endforelse

        </div>

    </div>

</div>

<!-- Message Input -->
<form method="POST" action="/send-message" class="input-area">
    @csrf

    <input type="hidden" name="complaint_id" value="{{ $ticket['$id'] }}">

    <div class="d-flex gap-2">
        <textarea 
            name="message" 
            class="form-control message-input"
            rows="1"
            placeholder="Type your message..."
            required></textarea>

        <button class="btn btn-primary send-btn">
            Send
        </button>
    </div>
</form>

</body>

</html>