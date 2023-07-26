<div>
    <div class="row">
        @foreach ($data as $item)
            <div class="col-md-4 col-12">
                <div class="card">
                    <a href="{{ route('prosiding.info-detail', $item->slug) }}">
                        <img class="card-img-top img-fluid" src="{{ $item->image ? asset(config('app.POST_BIG')).'/'.$item->image : asset('assets').'/images/slider/03.jpg' }}" alt="Blog Post pic" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('prosiding.info-detail', $item->slug) }}" class="blog-title-truncate text-body-heading">{{ $item->title }}</a>
                        </h4>
                        <div class="media">
                            <div class="avatar mr-50">
                                <img src="{{ asset('storage/images/users').'/'.$item->getUser->profile_photo_path }}" alt="Avatar" width="24" height="24" />
                            </div>
                            <div class="media-body">
                                <small class="text-muted mr-25">oleh</small>
                                <small><a href="javascript:void(0);" class="text-body">{{ $item->getUser->name }}</a></small>
                                <span class="text-muted ml-50 mr-25">|</span>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y') }}</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                            @php
                                $tags = explode(',', $item->tags);
                                $row = \App\Models\Tag::whereIn('id', $tags)->get();
                                // dd($tags);
                            @endphp
                            @foreach ($row as $tag)
                                <a href="/tag/{{ $tag->slug }}">
                                    <div class="badge badge-pill badge-light-primary mr-50">{{ $tag->title }}</div>
                                </a>
                            @endforeach
                        </div>
                        <p class="card-text blog-content-truncate">
                            {!! \Illuminate\Support\Str::words($item->content, 20, '...') !!}
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <a href="page-blog-detail.html#blogComment">
                                <div class="d-flex align-items-center">
                                    <i data-feather="message-square" class="font-medium-1 text-body mr-50"></i>
                                    <span class="text-body font-weight-bold">76 Comments</span>
                                </div>
                            </a> --}}
                            <a href="{{ route('prosiding.info-detail', $item->slug) }}" class="font-weight-bold">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-12 d-flex justify-content-center">
            {{ $data->links() }}
        </div>
    </div>
</div>
