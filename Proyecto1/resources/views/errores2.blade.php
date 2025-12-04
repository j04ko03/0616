@if (session('success'))
    <div class="alert-alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert-alert alert-error">
        {{ session('error') }}
    </div>
@endif