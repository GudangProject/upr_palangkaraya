<div>
    @forelse ($comments as $comment)
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar mr-75">
                        <img src="{{ asset('storage/images/users').'/'.$comment->getUser->profile_photo_path }}" width="38" height="38" alt="Avatar" />
                    </div>
                    <div class="media-body">
                        <h6 class="font-weight-bolder mb-25">{{ $comment->created_by !== null ? $comment->getUser->name : 'Anonymous' }}</h6>
                        <p class="card-text">{{ $comment->created_at->diffForHumans() }}</p>
                        <p class="card-text">
                            {{ $comment->text }}
                        </p>
                        <a href="javascript:void(0);">
                            <div class="d-inline-flex align-items-center">
                                <i data-feather="corner-up-left" class="font-medium-3 mr-50"></i>
                                <a href="#" data-toggle="modal" data-target="#defaultSize"><span>Reply</span></a>
                            </div>
                            <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel18">Replay Comment</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea wire:model.defer='replyContent' id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click='saveReplay({{ $comment->id }})'>Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @foreach (\RobertSeghedi\News\Models\Comment::where('reply_id', $comment->id)->get() as $reply)
                            <div class="card mt-1">
                                <div class="card-body bg-light-primary rounded">
                                    <div class="media">
                                        <div class="avatar mr-75">
                                            <img src="{{ asset('storage/images/users').'/'.$reply->getUser->profile_photo_path }}" width="38" height="38" alt="Avatar" />
                                        </div>
                                        <div class="media-body">
                                            <h6 class="font-weight-bolder mb-25">{{ $reply->created_by !== null ? $reply->getUser->name : 'Anonymous' }}</h6>
                                            {{-- <p class="card-text">{{ $reply->created_at->diffForHumans() }}</p> --}}
                                            <p class="card-text">
                                                {{ $reply->text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @empty
    <div class="card">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                    <h5>No Comment</h5>
                </div>
            </div>
        </div>
    </div>
    @endforelse
</div>
