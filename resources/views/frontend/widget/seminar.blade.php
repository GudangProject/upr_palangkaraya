<section id="section-studio-type">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2>{{ $title }}</h2>
                    <div class="small-border bg-color-2"></div>
                </div>
            </div>

            @foreach ($data as $event)
                @if ($loop->index < $limit)
                    <div class="col-md-4">
                        <div class="de-image-text">
                            <a href="/seminar/{{ $event->slug }}" class="d-text">
                                <h3><span class="id-color">0{{ $loop->index + 1 }}</span> {{ $event->judul }}</h3>
                                <p>{!! Illuminate\Support\Str::words($event->keterangan, 7) !!}</p>
                            </a>
                            <img src="{{ asset('storage/pictures').'/event/4_3/mid/'.$event->image }}" class="img-fluid" alt="">
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>
