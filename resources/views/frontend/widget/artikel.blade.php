<section id="section-intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2>{{ $title }}</h2>
                    <div class="small-border bg-color-2"></div>
                </div>
            </div>
            @foreach ($data as $row)
                @if ($loop->index <= $limit)
                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <a href="/post/{{ $row->slug }}" class="de-card">
                        <div class="de-image">
                            <img src="{{ asset('storage/pictures').'/post/4_3/mid/'.$row->image }}" class="img-fluid" alt="">
                        </div>
                        <div class="text">
                            <h4>{{ $row->title }}</h4>
                            <p>{!! \Illuminate\Support\Str::words($row->content, 10) !!}</p>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
