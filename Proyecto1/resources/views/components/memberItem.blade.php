<link rel="stylesheet" href="{{ url('/css/memberItem.css') }}">

<div class="member">
    <div class="pfp">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
            alt="Profile picture">
    </div>
    <div>
        <span>
            <p>{{ $nombre }}</p>
            <button class="button-member" style="display:{{ $style }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path
                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                </svg>
            </button>
        </span>
        <p>{{ $rol }}</p>
        <p>{{ $email }}</p>
    </div>
</div>
