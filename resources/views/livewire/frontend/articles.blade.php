<div>
    <div class="row">
        @foreach ($data as $row)
            <div class="col-lg-4 col-md-6 mb30">
                <div class="bloglist item">
                    <div class="post-content">
                        <div class="post-image">
                            <img alt="" src="{{ $row->imageFull }}" class="lazy">
                        </div>
                        <div class="post-text">
                            <span class="p-tagline">{{ $row->getCategory->name }}</span>
                            <span class="p-date">{{ \Carbon\Carbon::parse($row->created_at)->isoFormat('dddd, d MMMM Y') }}</span>
                            <h4><a href="/post/{{ $row->slug }}">{{ $row->title }}<span></span></a></h4>
                            <p>{!! Illuminate\Support\Str::words($row->content, 20) !!}</p>
                            <a class="btn-main" href="/post/{{ $row->slug }}">Baca Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="spacer-single"></div>

        {{ $data->onEachSide(5)->links()}}

    </div>
</div>
