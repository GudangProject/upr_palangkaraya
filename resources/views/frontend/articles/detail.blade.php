<x-frontend-master>
    <section id="subheader" class="text-light" data-bgimage="url({{ asset('frontend/images') }}/background/subheader.jpg) top">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 text-center">
                        <h1>{{ $data->title }}</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

    <section aria-label="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-read">

                    <img alt="" src="{{ $data->imageFull }}" class="img-fullwidth rounded">

                    <div class="post-text">
                        <span class="post-date">{{ $data->dateFormat }}</span>
                        <span class="post-like">{{ $data->counter ?? 0 }} pembaca</span><br>
                        {!! $data->content !!}

                    </div>

                </div>

                <div class="spacer-single"></div>

            </div>

            <div id="sidebar" class="col-md-4">
                <div class="widget widget-post">
                    <h4>Populer</h4>
                    <div class="small-border"></div>
                    <ul>
                        @forelse ($popular as $row)
                            <li><span class="date">{{ \Carbon\Carbon::parse($row->created_at)->format('d M') }}</span><a href="/post/{{ $row->slug }}">{{ $row->title }}</a></li>
                        @empty
                            <li><span class="date">22 Jun</span><a href="#">Experts Web Design Tips</a></li>
                        @endforelse

                    </ul>
                </div>

                <div class="widget widget-post">

                <h4>Agenda</h4>
                <div class="small-border"></div>
                    <div class="de-box mb25">
                        @foreach ($agendas as $agenda)
                            <div class="sm-icon mb30">
                                <i class="bg-color fa fa-calendar-check-o"></i>
                                <div class="si-inner">
                                    <h6>{{ $agenda->title }}</h5>
                                    {{ $agenda->dateFormat }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="widget widget_tags">
                    <h4>Tags</h4>
                    <div class="small-border"></div>
                    <ul>
                        @foreach ($tags as $tag)
                            <li><a href="/tag/{{ $tag->slug }}">{{ $tag->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </section>
</x-frontend-master>
