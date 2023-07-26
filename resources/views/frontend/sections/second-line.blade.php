<section id="section-fun-facts" class="pb60">
    <div class="container">
        <div class="row">

            @include('frontend.widget.info-prosiding', ['data' => $prosidingInfo, 'title' => 'INFO PROSIDING'])
            @include('frontend.widget.agenda', ['data' => $agenda, 'title' => 'AGENDA', 'limit' => 3])
            @include('frontend.widget.contact', ['cutomerCare' => $customerCare, 'title' => 'KONTAK', 'limit' => 3])

        </div>
    </div>
</section>
