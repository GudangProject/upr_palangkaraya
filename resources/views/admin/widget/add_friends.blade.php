<div class="card">
    <div class="card-body">
        <h5>Kontak Member</h5>
        @foreach ($users->shuffle() as $user)
            <div class="d-flex justify-content-start align-items-center mt-2">
                <div class="avatar mr-75">
                    <img src="{{asset('storage/images/users').'/'.$user->profile_photo_path}}" alt="avatar" height="40" width="40" />
                </div>
                <div class="profile-user-info">
                    <h6 class="mb-0">{{ $user->name }}</h6>
                    <small class="text-muted">6 Mutual Friends</small>
                </div>
                <a href="https://wa.me/{{ $user->phone }}" target="_blank" class="btn btn-success btn-icon btn-sm ml-auto">
                    <i data-feather="message-circle"></i>
                </a>
            </div>

            @if ($loop->depth == 8)
                @break
            @endif
        @endforeach
    </div>
</div>
