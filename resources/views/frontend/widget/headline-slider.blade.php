<section class="mb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners[0]['header'] as $item)
                        <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="5000">
                            <a href="{{ $item->url }}">
                                <img src="{{ $item->image }}" class="d-block w-100 rounded" alt="...">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 d-none d-md-block hidden_mobile">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners[0]['header_right_top'] as $item)
                        <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="5000">
                            <a href="{{ $item->url }}">
                                <img src="{{ $item->image }}" class="d-block w-100 rounded" alt="...">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
                <div id="carouselExampleControls2" class="carousel slide mt-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners[0]['header_right_bottom'] as $item)
                        <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="5000">
                            <a href="{{ $item->url }}">
                                <img src="{{ $item->image }}" class="d-block w-100 rounded" alt="...">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
