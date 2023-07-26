<div>
    <div class="row">
        @foreach ($data as $item)
            <div class="col-md-4 col-12">
                <div class="card">
                    <a href="{{ route('prosiding.seminar-detail', $item->slug) }}">
                        <img class="card-img-top img-fluid" src="{{ $item->image ? asset('storage/pictures').'/event/4_3/mid/'.$item->image : asset('assets').'/images/slider/03.jpg' }}" alt="Blog Post pic" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('prosiding.seminar-detail', $item->slug) }}" class="blog-title-truncate text-body-heading">{{ $item->judul }}</a>
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
                            <a href="#">
                                @if ($item->type == 1)
                                    <span class="badge badge-light-success">nasional</span>
                                @elseif($item->type == 2)
                                    <span class="badge badge-light-danger">internasional</span>
                                @else
                                    <span class="badge badge-light-dark">lainnya</span>
                                @endif
                            </a>
                        </div>
                        <p class="card-text blog-content-truncate">
                            {!! \Illuminate\Support\Str::words($item->keterangan, 20, '...') !!}
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('prosiding.seminar-detail', $item->slug) }}" class="font-weight-bold">Baca Detail</a>
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
