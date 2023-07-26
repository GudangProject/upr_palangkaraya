<div class="col-md-4 col-lg-4 col-sm-12">
    <h3>
        {{ $title }}
    </h3>
    <div class="small-border sm-left"></div>
    <div class="widget widget-post">
        <ul>
            
            @forelse ($data as $row)
                <li><span class="date">{{ \Carbon\Carbon::parse($row->created_at)->format('d M') }}</span><a href="/post/{{ $row->slug }}">{{ $row->title }}</a></li>
            @empty
                <li><strong>Konten belum tersedia</strong></li>
            @endforelse

        </ul>
    </div>
</div>
