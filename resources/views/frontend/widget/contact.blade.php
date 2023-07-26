<div class="col-md-4 col-lg-4 col-sm-12">
    <h3>
        Kontak
    </h3>
    <div class="small-border sm-left"></div>
    <div class="padding40 box-rounded mb30" data-bgcolor="#F2F6FE">
        @foreach ($customerCare as $row)
        @isset($row->getUser->name)
            <h3>{{ $row->getUser->name }}</h3>
            <address class="s1">
                <span><i class="id-color fa fa-phone fa-lg"></i>{{ $row->getUser->phone  }}</span>
                <span><i class="id-color fa fa-whatsapp fa-lg"></i><a href="https://wa.me/{{ $row->getUser->phone }}">Whatsapp</a></span>
            </address>
        @endisset
        @endforeach
    </div>
</div>

