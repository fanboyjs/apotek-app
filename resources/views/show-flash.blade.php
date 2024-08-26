@if(session('status'))
    <div>{{ session('status') }}</div>
@else
    <div>No flash message found.</div>
@endif