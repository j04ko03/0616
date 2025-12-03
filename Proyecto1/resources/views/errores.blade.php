@if (session('success'))
    <span class="badge text-bg-success">{{ session('success') }}</span>
@elseif(session('error'))
    <span class="badge text-bg-error">{{ session('error') }}</span>
@endif