<section id="de-carousel" class="no-top no-bottom carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-mdb-target="#de-carousel" data-mdb-slide-to="0" class="active"></li>
      <li data-mdb-target="#de-carousel" data-mdb-slide-to="1"></li>
      <li data-mdb-target="#de-carousel" data-mdb-slide-to="2"></li>
    </ol>

    <!-- Inner -->
    <div class="carousel-inner">
        @foreach ($data as $item)
            @if ($loop->index < $limit)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}}" data-bgimage="url('{{ $item->imageFull }}')">
                    <div class="mask">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="container text-white text-center">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <h2 class="mb-3 wow fadeInUp">{{ $item->title }}</h2>
                                        <p class="lead wow fadeInUp" data-wow-delay=".3s">{!! Illuminate\Support\Str::words($item->content, 30) !!}</p></p>
                                        <div class="spacer-10"></div>
                                        <a href="/post/{{ $item->slug }}" class="btn-main wow fadeInUp" data-wow-delay=".6s">Baca Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <!-- Inner -->

    <!-- Controls -->
    <a class="carousel-control-prev" href="#de-carousel" role="button" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#de-carousel" role="button" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</section>
