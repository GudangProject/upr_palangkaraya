<x-frontend-master>

    @include('frontend.widget.headline-slider', ['banners' => $banners, 'limit' => 4])

    @include('frontend.sections.second-line', [
            'agenda' => $agenda,
            'prosidingInfo' => $prosidingInfo,
            'cutomerCare' => $customerCare
        ])

    @include('frontend.widget.seminar', ['data' => $events, 'title' => 'SEMINAR', 'limit' => 6])
    @include('frontend.widget.artikel', ['data' => $news, 'title' => 'BERITA', 'limit' => 6])

</x-frontend-master>
