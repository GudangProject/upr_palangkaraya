@extends('admin.users.profile.master')
@section('profile-page')
<section id="profile-info">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body profile-suggestion">
                    <h5 class="mb-2">Friend List</h5>
                    @foreach ($data['friends_list'] as $friend)
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            <div class="avatar mr-1">
                                <img src="{{ asset('assets') }}/images/avatars/8-small.png" alt="avatar img" height="40" width="40" />
                            </div>
                            <div class="profile-user-info">
                                <h6 class="mb-0">{{ $friend->getName->name }}
                                {{-- <small class="text-muted">Company</small> --}}
                            </div>
                            <div class="profile-star ml-auto">
                                <a href="{{ route('chats.index') }}" class="btn btn-icon rounded-circle btn-primary waves-effect waves-float waves-light"><i data-feather="message-square" class="font-medium-3"></i></a>
                                <a href="{{ route('profile.friends.delete', $friend->id) }}" class="btn btn-icon rounded-circle btn-danger waves-effect waves-float waves-light"><i data-feather="trash-2" class="font-medium-3"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-3">
                        {{ $data['friends_list']->onEachSide(3)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- reload button -->
    <div class="row">
        <div class="col-12 text-center">
            <button type="button" class="btn btn-sm btn-primary block-element border-0 mb-1">Load More</button>
        </div>
    </div>
    <!--/ reload button -->
</section>
@endsection

