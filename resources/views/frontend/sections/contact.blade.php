<x-frontend-master>
    <section id="subheader" class="text-light" data-bgimage="url({{ asset('frontend')}}/images/background/subheader.jpg) top">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 text-center">
                        <h1>Kontak</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <section aria-label="section">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-sm-30">
                    <h3>Lokasi</h3>
                    <div class="de-map-wrapper">
                        @php
                            $config = \App\Models\Admin\Configuration::orderBy('created_at')->first();
                        @endphp
                        <iframe src="{{ $config->address_map }}"  allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h3>Narahubung</h3>
                    @include('frontend.widget.contact', ['title' => 'Kontak', 'limit' => 3])

                </div>

            </div>
        </div>

    </section>
</x-frontend-master>
