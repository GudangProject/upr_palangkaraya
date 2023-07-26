<div>
    <div class="row mt-4">
        <div class="col-6">
            <h5 class="border-bottom pb-3">Comments</h5>
        </div>
        @if (!isset(auth()->user()->id))
        <div class="col-6 d-flex justify-content-end">
            <a href="/login" class="btn btn-primary btn-sm mb-3 me-2"><i class="uil uil-sign-in-alt"></i> Sign In</a>
            <a href="/register" class="btn btn-dark btn-sm mb-3"><i class="uil uil-user-plus"></i> Sign Up</a>
        </div>
        @endif
    </div>
    @if (isset(auth()->user()->id))
        <form wire:submit.prevent="saveComment" class="contact-form mt-2">
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="position-relative mb-3">
                        <textarea wire:model="comment" id="comments" rows="4" class="form-control" placeholder="Enter your message" required></textarea>
                        @error('comment') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-end">
                    <button name="submit" type="submit" id="submit" class="btn btn-primary btn-hover">Send<i class="uil uil-message ms-1"></i></button>
                </div>
            </div>
        </form>
    @else
        <h6 class="alert alert-danger">Please <a href="/login">Sign In</a> to send your comment</h6>
    @endif
    @forelse ($comments as $comment)
        <div class="mt-5">
            <div class="d-sm-flex align-items-top">
                <div class="flex-shrink-0">
                    <img class="rounded-circle avatar-md img-thumbnail" src="{{ $comment->created_by != null ? asset('storage/images/users').'/'.$comment->getUser->profile_photo_path : asset('storage/images/users/default.png') }}" alt="img" />
                </div>
                <div class="flex-grow-1 ms-sm-3">
                    <small class="float-end fs-12 text-muted"><i class="uil uil-clock"></i> {{ $comment->created_at->diffForHumans() }}</small>
                    <a href="javascript:(0)" class="primary-link"><h6 class="fs-16 mt-sm-0 mt-3 mb-0">{{ $comment->created_by == null ? 'Anonymous' : $comment->getUser->name }}</h6></a>
                    <p class="text-muted fs-14 mb-0">{{ $comment->date }}</p>
                    <div class="badge bg-light">
                        @if (isset(auth()->user()->id))
                            @if ($comment->created_by == auth()->user()->id)
                                <button wire:click="deleteComment({{ $comment->id }})" class="btn btn-danger btn-sm">delete</button>
                            @endif
                        @endif
                        {{-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#reply-modal{{ $comment->id }}"><i
                                class="mdi mdi-reply"></i> Reply</button> --}}
                    </div>
                    <p class="text-muted mb-0">{{ $comment->text }}</p>
                    @foreach (\RobertSeghedi\News\Models\Comment::where('reply_id', $comment->id)->get() as $reply)
                        <div class="d-sm-flex align-items-top mt-5">
                            <div class="flex-shrink-0">
                                <img class="rounded-circle avatar-md img-thumbnail" src="{{ asset('storage/images/users').'/'.$reply->getUser->profile_photo_path }}" alt="img" />
                            </div>
                            <div class="flex-grow-1 ms-sm-3">
                                <small class="float-end fs-12 text-muted"><i class="uil uil-clock"></i> 2 hrs Ago</small>
                                <a href="javascript:(0)" class="primary-link"><h6 class="fs-16 mt-sm-0 mt-3 mb-0">{{ $reply->created_by !== null ? $reply->getUser->name : 'Anonymous' }}</h6></a>
                                {{-- <p class="text-muted fs-14 mb-0">{{ $reply->created_at->diffForHumans() }}</p> --}}
                                <p class="text-muted mb-0">{{ $reply->text }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @empty

    @endforelse
    <div class="mt-4 d-flex justify-content-center">
        {{ $comments->links() }}
    </div>

</div>
