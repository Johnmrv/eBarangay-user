<hr>

<h6>Conversation</h6>

<div class="card p-3 mb-3">

@forelse($messages as $msg)

<div class="mb-2">

@if($msg['sender_role'] == 'resident')

<div class="text-end">

<span class="badge bg-primary">You</span>

<p class="mb-1">
{{ $msg['message'] }}
</p>

</div>

@else

<div>

<span class="badge bg-success">Admin</span>

<p class="mb-1">
{{ $msg['message'] }}
</p>

</div>

@endif

</div>

@empty

<p>No messages yet</p>

@endforelse

</div>

<form method="POST" action="/send-message">

@csrf

<input type="hidden" name="complaint_id" value="{{ $ticket['$id'] }}">

<textarea 
name="message" 
class="form-control mb-2" 
placeholder="Type your message..." 
required></textarea>

<button class="btn btn-primary w-100">
Send Message
</button>

</form>