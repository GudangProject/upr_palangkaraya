<div class="col-md-4 col-lg-4 col-sm-12">
    <h3>
        {{ $title }}
    </h2>
    <div class="small-border sm-left"></div>
    @foreach ($data as $row)
        <div class="sm-icon mb30">
            <i class="bg-color fa fa-calendar-check-o"></i>
            <div class="si-inner">
                <a href="{{ $row->url }}" class=" text-dark">
                    <strong>{{ \Illuminate\Support\Str::words($row->title, 15) }}</strong>
                </a>
                <span class="p-title invert">{{ $row->dateFormat }}</span>
            </div>
        </div>
    @endforeach
</div>
