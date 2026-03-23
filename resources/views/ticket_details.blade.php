<!DOCTYPE html>
<html>

<head>

<title>Ticket Details</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-3 mb-4">

<!-- Ticket Info -->

<div class="card p-3 mb-3 shadow-sm">

<h5 class="mb-1">{{ $ticket['title'] }}</h5>

<p class="mb-2">{{ $ticket['description'] }}</p>

<span class="badge bg-warning">
{{ $ticket['status'] }}
</span>

</div>


<!-- Evidence Section -->

<div class="card p-3 mb-3 shadow-sm">

<h6 class="mb-3">📷 Evidence</h6>

@forelse($evidence as $img)

<img 
src="https://sgp.cloud.appwrite.io/v1/storage/buckets/{{ env('APPWRITE_BUCKET_ID') }}/files/{{ $img['image_id'] }}/view?project={{ env('APPWRITE_PROJECT_ID') }}&mode=admin"
class="img-fluid rounded mb-3"
style="max-height:250px; object-fit:cover; cursor:pointer;"
onclick="openImage(this.src)">

@empty

<p class="text-muted">No evidence uploaded</p>

@endforelse

</div>


<!-- Conversation Section -->

<div class="card p-3 mb-3 shadow-sm">

<h6 class="mb-3">💬 Conversation</h6>

<div id="messageBox" style="max-height:300px; overflow-y:auto;">

@forelse($messages as $msg)

<div class="mb-2">

@if($msg['sender_role'] == 'resident')

<div class="text-end">

<span class="badge bg-primary">You</span>

<div class="bg-primary text-white p-2 rounded mt-1 d-inline-block">
{{ $msg['message'] }}
</div>

</div>

@else

<div>

<span class="badge bg-success">Admin</span>

<div class="bg-light p-2 rounded mt-1 d-inline-block border">
{{ $msg['message'] }}
</div>

</div>

@endif

</div>

@empty

<p class="text-muted">No messages yet</p>

@endforelse

</div>

</div>


<!-- Message Form -->

<div class="card p-3 shadow-sm">

<form id="messageForm">

@csrf

<input type="hidden" id="complaint_id" value="{{ $ticket['$id'] }}">

<textarea 
id="messageInput"
class="form-control mb-2" 
placeholder="Type your message..." 
required></textarea>

<button class="btn btn-primary w-100">
Send Message
</button>

</form>

</div>


<!-- Back Button -->

<a href="/tickets" class="btn btn-secondary w-100 mt-3">
← Back to Tickets
</a>

</div>


<!-- Image Preview Modal -->

<div id="imageModal" style="
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.9);
justify-content:center;
align-items:center;
z-index:9999;
">

<img id="modalImg" style="max-width:90%; max-height:90%; border-radius:10px;">

</div>


<!-- Script -->

<script>

let complaintId = "{{ $ticket['$id'] }}";


function openImage(src){
    document.getElementById('imageModal').style.display = 'flex';
    document.getElementById('modalImg').src = src;
}

document.getElementById('imageModal').onclick = function(){
    this.style.display = 'none';
}


/* LOAD MESSAGES */

function loadMessages(){

fetch("/messages/" + complaintId)
.then(res => res.json())
.then(data => {

let box = document.getElementById("messageBox");

box.innerHTML = "";

if(data.length === 0){
box.innerHTML = "<p class='text-muted'>No messages yet</p>";
return;
}

data.forEach(msg => {

let div = document.createElement("div");
div.classList.add("mb-2");

if(msg.sender_role === "resident"){

div.innerHTML = `
<div class="text-end">
<span class="badge bg-primary">You</span>
<div class="bg-primary text-white p-2 rounded mt-1 d-inline-block">
${msg.message}
</div>
</div>
`;

}else{

div.innerHTML = `
<div>
<span class="badge bg-success">Admin</span>
<div class="bg-light p-2 rounded mt-1 d-inline-block border">
${msg.message}
</div>
</div>
`;

}

box.appendChild(div);

});

box.scrollTop = box.scrollHeight;

});

}


/* SEND MESSAGE (AJAX) */

document.getElementById("messageForm").addEventListener("submit", function(e){

e.preventDefault();

let message = document.getElementById("messageInput").value;

fetch("/send-message", {
method: "POST",
headers: {
"Content-Type": "application/json",
"X-CSRF-TOKEN": "{{ csrf_token() }}"
},
body: JSON.stringify({
complaint_id: complaintId,
message: message
})
})
.then(() => {

document.getElementById("messageInput").value = "";

loadMessages();

});

});


/* AUTO REFRESH */

setInterval(loadMessages, 3000);


/* INITIAL LOAD */

loadMessages();

</script>

</body>
</html>